{{--  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">  --}}

    {{-- Tu CSS personalizado --}}
    {{--  <link href="{{ asset('css/app.css') }}" rel="stylesheet">  --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <div>
        @include('forms', ['Modo' => 'Encabezado'])
    </div>
</head>
<body>
<div class="container mt-4">
    <div class="card shadow border-0">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">📋 Lista de Productos</h4>
            <a href="{{ route('products.create') }}" class="btn btn-light">➕ Nuevo Producto</a>
            <a href="{{url('/')}}" class="btn btn-light">Regresar</a>
        </div>
        <div class="card-body">
            @if(session('mensaje'))
                <div class="alert alert-success">{{ session('mensaje') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>imagen</th>
                            <th>Categoría</th>
                            <th>Proveedor</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>💲{{ number_format($product->price, 2) }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->image_path }}</td>
                                <td>{{ $product->category->name ?? 'N/A' }}</td>
                                <td>{{ $product->supplier->name ?? 'N/A' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">
                                        ✏️ Editar
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('¿Seguro que deseas eliminar este producto?')">
                                            🗑️ Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">No hay productos registrados</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Paginación --}}
            <div class="mt-3">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>