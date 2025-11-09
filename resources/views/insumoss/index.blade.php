<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Insumos - Aridetalles</title>

    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Estilos personalizados (mismo estilo que tu página principal) -->
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
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        /* ===== TIPOGRAFÍA ===== */
        h1, h2, h3, h4, h5, .brand {
            font-family: 'Inria Serif', serif;
            font-weight: 700;
        }

        h4 {
            font-size: 1.6rem;
            margin-bottom: 0;
        }

        button, input, a.btn {
            font-family: 'Inter', sans-serif;
        }

        /* ===== HEADER (mismo que principal) ===== */
        .header {
            background: #38122A;
            color: white;
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .nav-container {
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

        .nav {
            display: flex;
            gap: 2rem;
        }

        .nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .nav a:hover {
            color: #FF69B4;
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

        /* ===== CARD PERSONALIZADA ===== */
        .custom-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            margin-top: 2rem;
        }

        .card-header-custom {
            background: linear-gradient(90deg, #38122A, #5a2d3d);
            color: white;
            padding: 1.2rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header-custom h4 {
            margin: 0;
            font-size: 1.6rem;
        }

        .btn-custom {
            padding: 0.6rem 1.2rem;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
        }

        .btn-primary-custom {
            background: #FF69B4;
            color: white;
            border: none;
        }

        .btn-primary-custom:hover {
            background: #ff4d9a;
        }

        .btn-secondary-custom {
            background: #f8d7e3;
            color: #38122A;
            border: 1px solid #38122A;
        }

        .btn-secondary-custom:hover {
            background: #38122A;
            color: white;
        }

        .btn-warning-custom {
            background: #ffda77;
            color: #38122A;
            border: none;
        }

        .btn-warning-custom:hover {
            background: #ffc447;
        }

        .btn-danger-custom {
            background: #f26a6a;
            color: white;
            border: none;
        }

        .btn-danger-custom:hover {
            background: #e74c3c;
        }

        /* ===== TABLA ===== */
        .table-custom {
            width: 100%;
            border-collapse: collapse;
            margin: 1.5rem 0;
            background: #ffffffee;
            border-radius: 15px;
            overflow: hidden;
        }

        .table-custom thead {
            background: #7d4a6d;
            color: white;
        }

        .table-custom th,
        .table-custom td {
            padding: 1rem;
            text-align: center;
            vertical-align: middle;
        }

        .table-custom tbody tr {
            transition: background 0.3s ease;
        }

        .table-custom tbody tr:hover {
            background: #fdf2f8;
        }

        .table-custom tbody tr:nth-child(even) {
            background: #faf5f7;
        }

        .table-custom .price {
            font-weight: 700;
            color: #38122A;
        }

        /* ===== ALERTA ===== */
        .alert-custom {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 0.8rem 1rem;
            border-radius: 12px;
            text-align: center;
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
        }

        /* ===== PAGINACIÓN ===== */
        .pagination-custom {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin: 1.5rem 0;
        }

        .pagination-custom a,
        .pagination-custom span {
            padding: 0.5rem 1rem;
            background: white;
            color: #38122A;
            border: 1px solid #ddd;
            border-radius: 12px;
            text-decoration: none;
            font-size: 0.9rem;
            font-family: 'Inter', sans-serif;
        }

        .pagination-custom a:hover {
            background: #38122A;
            color: white;
            border-color: #38122A;
        }

        .pagination-custom .current {
            background: #38122A;
            color: white;
            border-color: #38122A;
        }

        /* ===== FOOTER ===== */
        footer {
            text-align: center;
            padding: 2rem 0;
            color: #777;
            font-size: 0.9rem;
            margin-top: 3rem;
            font-family: 'Inter', sans-serif;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .card-header-custom {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .table-custom {
                font-size: 0.85rem;
            }

            .table-custom th,
            .table-custom td {
                padding: 0.6rem;
            }

            .btn-custom {
                font-size: 0.8rem;
                padding: 0.5rem 1rem;
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

<!-- HEADER -->
<header class="header">
    <div class="container nav-container">
        <button class="menu-toggle">Menú</button>
    </div>
</header>

<!-- CONTENIDO -->
<div class="container">
    <div class="custom-card">
        <div class="card-header-custom">
            <h4>Lista de Insumos</h4>
            <div>
                <a href="{{ route('insumos.create') }}" class="btn-custom btn-primary-custom">Nuevo Insumo</a>
                <a href="{{ url('/') }}" class="btn-custom btn-secondary-custom">Regresar</a>
            </div>
        </div>

        <div class="card-body p-4">
            @if(session('mensaje'))
                <div class="alert-custom">
                    {{ session('mensaje') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table-custom">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Tipo</th>
                            <th>Stock</th>
                            <th>Costo Unitario</th>
                            <th>Categoría</th>
                            <th>Proveedor</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($insumos as $insumo)
                            <tr>
                                <td>{{ $insumo->id }}</td>
                                <td><strong>{{ $insumo->nombre }}</strong></td>
                                <td>{{ $insumo->descripcion }}</td>
                                <td>{{ $insumo->tipo }}</td>
                                <td>{{ $insumo->stock }}</td>
                                <td class="price">$/. {{ number_format($insumo->costo_unitario, 2) }}</td>
                                <td>{{ $insumo->category->name ?? 'N/A' }}</td>
                                <td>{{ $insumo->supplier->name ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('insumos.edit', $insumo->id) }}" class="btn-custom btn-warning-custom btn-sm">
                                        Editar
                                    </a>
                                    <form action="{{ route('insumos.destroy', $insumo->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-custom btn-danger-custom btn-sm"
                                            onclick="return confirm('¿Seguro que deseas eliminar este insumo?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" style="color: #999; font-style: italic;">
                                    No hay insumos registrados
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="pagination-custom">
                {{ $insumos->links() }}
            </div>
        </div>
    </div>

    <footer>
        <p>Florería "AriDetalles" — Cuidando cada detalle de la naturaleza</p>
    </footer>
</div>

<script>
    // Menu mobile
    document.querySelector('.menu-toggle').addEventListener('click', () => {
        document.querySelector('.nav').classList.toggle('active');
    });
</script>
</body>
</html>