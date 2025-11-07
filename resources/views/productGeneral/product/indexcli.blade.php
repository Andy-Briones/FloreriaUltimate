<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .product-card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        .product-card:hover {
            transform: translateY(-5px);
        }
        .product-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
    </style>
    @auth
    @if (Auth::user()->role === 'admin')
        {{-- Navbar ADMIN --}}
        @include('forms', ['Modo' => 'Encabezado'])

    @elseif (Auth::user()->role === 'cliente')
        {{-- Navbar CLIENTE --}}
        @include('forms', ['Modo' => 'EncabezadoClie'])
    @endif
    @else
        {{-- Navbar PÚBLICO (sin login) --}}
        @include('forms', ['Modo' => 'EncabezadoClie'])
    @endauth
</head>

<body>
    

    <div class="container mt-4">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>🪴 Catálogo de Productos</h2>
        </div>

        <!-- Buscador -->
        <form action="{{ route('products.index') }}" method="GET" class="mb-4">
            <div class="row g-2 align-items-center">
                <div class="col-md-8">
                    <input type="text" name="search" class="form-control"
                           placeholder="🔍 Buscar por nombre o descripción..."
                           value="{{ request('search') }}">
                </div>
                <div class="col-md-2 d-grid">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
                <div class="col-md-2 d-grid">
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Limpiar</a>
                </div>
            </div>
        </form>

        <!-- Mensajes -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Catálogo -->
        @if($products->count())
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($products as $product)
                    <div class="col">
                        <div class="card product-card">
                            @if($product->image_path)
                                <img src="{{ asset('imgs/' . $product->image_path) }}" alt="{{ $product->name }}" class="product-img">
                            @else
                                <img src="https://via.placeholder.com/300x200?text=Sin+Imagen" class="product-img" alt="Sin imagen">
                            @endif

                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text mb-1"><strong>Precio:</strong> S/ {{ number_format($product->price, 2) }}</p>
                                <p class="card-text mb-1"><strong>Stock:</strong> {{ $product->stock }}</p>
                                <p class="card-text mb-1"><strong>Costo Producción:</strong> S/ {{ number_format($product->costo_produccion, 2) }}</p>
                                <p class="card-text"><strong>Descripción:</strong> {{ $product->description }}</p>
                                <span class="badge bg-success">{{ ucfirst($product->estado) }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-warning mt-4">
                @if(request('search'))
                    No se encontraron productos que coincidan con "<strong>{{ request('search') }}</strong>".
                @else
                    No hay productos registrados aún.
                @endif
            </div>
        @endif

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

