<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos - Aridetalles</title>

    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Estilos -->
    <style>
        /* ===== RESET & BASE ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inria Serif', serif;
            background-color: #F9F5EC;
            color: #38122A;
            line-height: 1.6;
            font-weight: 400;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        /* ===== HEADER ===== */
        .header {
            background: #38122A;
            color: white;
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            margin-bottom: 2rem;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.4rem;
            font-weight: 700;
        }

        .flower-icon {
            width: 24px;
            height: 24px;
        }

        .menu-toggle {
            display: none;
            background: white;
            color: #38122A;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            font-family: 'Inter', sans-serif;
        }

        /* ===== CATÁLOGO HEADER ===== */
        .catalog-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .catalog-title {
            font-size: 1.8rem;
            color: #38122A;
            font-weight: 700;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .catalog-title svg {
            width: 28px;
            height: 28px;
            fill: #FF69B4;
        }

        /* ===== BUSCADOR ===== */
        .search-form {
            background: white;
            border-radius: 16px;
            padding: 1rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            margin-bottom: 1.5rem;
            display: flex;
            flex-wrap: wrap;
            gap: 0.8rem;
            align-items: center;
        }

        .search-input-group {
            flex: 1;
            min-width: 250px;
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 0.8rem 1rem 0.8rem 2.8rem;
            border: 1.5px solid #ddd;
            border-radius: 12px;
            font-family: 'Inter', sans-serif;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: #FF69B4;
            box-shadow: 0 0 8px rgba(255, 105, 180, 0.2);
        }

        .search-icon {
            position: absolute;
            left: 0.9rem;
            top: 50%;
            transform: translateY(-50%);
            width: 20px;
            height: 20px;
            fill: #777;
        }

        .btn-custom {
            padding: 0.7rem 1.3rem;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
            border: none;
            cursor: pointer;
        }

        .btn-primary-custom {
            background: #ff0080ff;
            color: black;
        }

        .btn-primary-custom:hover {
            background: #ff4d9a;
            transform: translateY(-1px);
        }

        .btn-secondary-custom {
            background: #f8d7e3;
            color: #38122A;
            border: 1.5px solid #38122A;
        }

        .btn-secondary-custom:hover {
            background: #38122A;
            color: white;
        }

        /* ===== GRID PRODUCTOS ===== */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 1.8rem;
            margin: 1.5rem 0;
        }

        .product-card {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 25px rgba(255, 105, 180, 0.15);
        }

        .product-img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-bottom: 2px solid #ffe4ec;
        }

        .product-img-placeholder {
            width: 100%;
            height: 180px;
            background: linear-gradient(135deg, #ffe4ec, #f8d7e3);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #38122A;
            font-size: 0.9rem;
            font-family: 'Inter', sans-serif;
            border-bottom: 2px solid #ffe4ec;
        }

        .product-body {
            padding: 1.2rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .product-name {
            font-size: 1.2rem;
            font-weight: 700;
            color: #38122A;
            margin-bottom: 0.6rem;
            font-family: 'Inria Serif', serif;
        }

        .product-info {
            font-family: 'Inter', sans-serif;
            font-size: 0.9rem;
            color: #555;
            margin-bottom: 0.4rem;
            display: flex;
            justify-content: space-between;
        }

        .product-info strong {
            color: #38122A;
        }

        .product-description {
            font-family: 'Inter', sans-serif;
            font-size: 0.85rem;
            color: #666;
            margin-top: 0.5rem;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-badge {
            align-self: flex-start;
            padding: 0.3rem 0.7rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            margin-top: 0.8rem;
            background: #d4edda;
            color: #155724;
        }

        /* ===== ALERTAS ===== */
        .alert-custom {
            padding: 1rem 1.5rem;
            border-radius: 14px;
            text-align: center;
            font-size: 0.95rem;
            margin: 1rem 0;
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }

        .alert-success-custom {
            background: #d9fdd3;
            border: 1.5px solid #b2e8a7;
            color: #2e7d32;
        }

        .alert-warning-custom {
            background: #fff7e6;
            border: 1.5px solid #ffe1a3;
            color: #8b6b00;
        }

        /* ===== PAGINACIÓN ===== */
        .pagination-custom {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin: 2.5rem 0;
            flex-wrap: wrap;
        }

        .pagination-custom a,
        .pagination-custom span {
            padding: 0.6rem 1rem;
            background: white;
            color: #38122A;
            border: 1.5px solid #ddd;
            border-radius: 12px;
            text-decoration: none;
            font-size: 0.9rem;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
        }

        .pagination-custom a:hover {
            background: #38122A;
            color: white;
            border-color: #38122A;
            transform: translateY(-1px);
        }

        .pagination-custom .current {
            background: #38122A;
            color: white;
            border-color: #38122A;
            font-weight: 600;
        }

        /* ===== FOOTER ===== */
        footer {
            text-align: center;
            padding: 2.5rem 0;
            color: #000000ff;
            font-size: 0.9rem;
            margin-top: 4rem;
            font-family: 'Inter', sans-serif;
            border-top: 1px solid #eee;
            background: #fdf9fb;
        }

        footer p {
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        footer svg {
            width: 20px;
            height: 20px;
            fill: #FF69B4;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .catalog-header {
                flex-direction: column;
                text-align: center;
            }

            .search-form {
                flex-direction: column;
            }

            .search-input-group {
                width: 100%;
            }

            .btn-custom {
                width: 100%;
            }

            .products-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .product-img,
            .product-img-placeholder {
                height: 160px;
            }

            .menu-toggle {
                display: block;
            }

            .nav {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background: #38122A;
                padding: 1rem;
            }

            .nav.active {
                display: flex;
            }
        }

        @media (min-width: 769px) and (max-width: 992px) {
            .products-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        /*boton what*/
    .wsp-float {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background-color: #25d366;
      color: white;
      border-radius: 50%;
      padding: 15px;
      z-index: 1000;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
      transition: transform 0.3s;
    }

    .wsp-float:hover {
      transform: scale(1.1);
      text-decoration: none;
    }

    .wsp-icon {
      font-size: 24px;
    }
  </style>
    </style>

    @auth
    @if (Auth::user()->role === 'admin')
        @include('forms', ['Modo' => 'Encabezado'])
    @elseif (Auth::user()->role === 'cliente')
        @include('forms', ['Modo' => 'EncabezadoClie'])
    @endif
    @else
        @include('forms', ['Modo' => 'EncabezadoClie'])
    @endauth
</head>

<body>
@include('forms', ['Modo' => 'Accesibilidad'])
<a href="https://wa.me/51999369837?text=Hola%2C%20quisiera%20hacer%20un%20pedido%20AriDetalles" class="wsp-float" target="_blank" title="Contáctanos por WhatsApp">
    <img src="https://img.icons8.com/ios-filled/50/ffffff/whatsapp.png" alt="WhatsApp" width="30" height="30">
  </a>

<!-- CONTENIDO -->
<div class="container">
    <div class="catalog-header">
        <h2 class="catalog-title">
            <svg viewBox="0 0 24 24" fill="currentColor">
                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14h-4v-2h4v2zm0-4h-4V9h4v4z"/>
            </svg>
            Catálogo de Productos
        </h2>
    </div>

    <!-- BUSCADOR -->
    <form action="{{ url('products') }}" method="GET" class="search-form">
        <div class="search-input-group">
            <svg class="search-icon" viewBox="0 0 24 24" fill="currentColor">
                <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
            </svg>
            <input type="text" name="search" class="search-input" placeholder="Buscar por nombre u Ocasión..." value="{{ request('search') }}">
        </div>
        <!-- NUEVO CHECKBOX -->
        <label style="display:flex; align-items:center; gap:8px; white-space:nowrap; font-family:'Inter',sans-serif; font-size:0.9rem; cursor:pointer;">
            <input type="checkbox" name="only_description" value="1" 
                {{ request('only_description') ? 'checked' : '' }}>
            <span>Solo descripción</span>
        </label>
        <button type="submit" class="btn-custom btn-primary-custom">Buscar</button>
        <a href="{{ url('products') }}" class="btn-custom btn-secondary-custom">Limpiar</a>
    </form>

    <!-- MENSAJES -->
    @if(session('success'))
        <div class="alert-custom alert-success-custom">
            {{ session('success') }}
        </div>
    @endif

    <!-- CATÁLOGO -->
    @if($products->count())
        <div class="products-grid">
            @foreach ($products as $product)
                <div class="product-card">
                    @if($product->image_path)
                        <img src="{{ asset('imgs/' . $product->image_path) }}" alt="{{ $product->name }}" class="product-img">
                    @else
                        <div class="product-img-placeholder">
                            Sin imagen
                        </div>
                    @endif

                    <div class="product-body">
                        <h3 class="product-name">{{ $product->name }}</h3>
                        <div class="product-info">
                            <span><strong>Precio:</strong> S/ {{ number_format($product->price, 2) }}</span>
                        </div>
                        <div class="product-info">
                            <span><strong>Stock:</strong> {{ $product->stock }}</span>
                        </div>
                        <div class="product-info">
                            <span><strong>Costo:</strong> S/ {{ number_format($product->costo_produccion, 2) }}</span>
                        </div>
                        <p class="product-description">
                            {{ $product->description ?: 'Sin descripción disponible.' }}
                        </p>
                        <span class="product-badge">
                            {{ ucfirst($product->estado) }}
                        </span>
                        {{-- BOTÓN WHATSAPP DINÁMICO --}}
                        @php
                            $imagenUrl = asset('imgs/' . $product->image_path);
                            $mensaje = "Hola, me interesa el producto {$product->name} (S/ {$product->price}) de AriDetalles.";
                        @endphp

                        <a href="https://wa.me/51983095879?text={{ urlencode($mensaje) }}"
                        class="btn-custom btn-success-custom"
                        target="_blank">
                            Consultar por WhatsApp
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- PAGINACIÓN -->
        <div class="pagination-custom">
            {{ $products->appends(['search' => request('search')])->links() }}
        </div>
    @else
        <div class="alert-custom alert-warning-custom">
            @if(request('search'))
                No se encontraron productos que coincidan con "<strong>{{ request('search') }}</strong>".
            @else
                No hay productos registrados aún.
            @endif
        </div>
    @endif
</div>

<footer>
    <p>
        <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/>
        </svg>
        Florería "AriDetalles" — Amor y frescura en cada detalle
        <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/>
        </svg>
    </p>
</footer>

<script>
    // Menu mobile
    document.querySelector('.menu-toggle')?.addEventListener('click', () => {
        document.querySelector('.nav')?.classList.toggle('active');
    });
</script>

</body>
</html>