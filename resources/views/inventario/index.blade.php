<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🌼 Inventario de Producción - Florería</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos Florería -->
    <style>
        body {
            {{--  background: linear-gradient(to bottom right, #f9fff9, #fff0f5);  --}}
            background-color: #d28cdbff;
            font-family: 'Poppins', sans-serif;
        }

        h2 {
            color: #3c6e47;
            font-weight: 600;
            font-family: 'Georgia', serif;
        }

        .container {
            background-color: #ffffffee;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            margin-top: 40px;
        }

        .btn-success {
            background: linear-gradient(90deg, #7acb77, #a5e8a0);
            border: none;
            color: #2e5930;
            font-weight: 500;
            transition: 0.3s;
        }

        .btn-success:hover {
            background: #58b368;
            color: white;
        }

        .btn-info {
            background-color: #a7d8ff;
            border: none;
            color: #1f4f68;
        }

        .btn-info:hover {
            background-color: #6bc3ff;
        }

        .btn-danger {
            background-color: #f26a6a;
            border: none;
            transition: 0.3s;
        }

        .btn-danger:hover {
            background-color: #e74c3c;
        }

        table {
            background-color: #ffffffdd;
            border-radius: 10px;
            overflow: hidden;
        }

        thead {
            background-color: #7dcfb6;
            color: white;
        }

        tbody tr:hover {
            background-color: #f0fdf0;
        }

        .alert-success {
            background-color: #d9fdd3;
            border: 1px solid #b2e8a7;
            color: #2e7d32;
        }

        .alert-warning {
            background-color: #fff7e6;
            border: 1px solid #ffe1a3;
            color: #8b6b00;
        }

        footer {
            text-align: center;
            margin-top: 30px;
            color: #5b705c;
            font-size: 0.9rem;
        }
    </style>

    @auth
    @if (Auth::user()->role === 'admin')
        {{-- Navbar ADMIN --}}
        @include('forms', ['Modo' => 'Encabezado'])

    @elseif (Auth::user()->role === 'cliente')
        {{-- Navbar CLIENTE --}}
        @include('forms', ['Modo' => 'Encabezado'])
    @endif
    @else
        {{-- Navbar PÚBLICO (sin login) --}}
        @include('forms', ['Modo' => 'Encabezado'])
    @endauth
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>🌿 Inventario de Producción</h2>
            <a href="{{ route('inventario.create') }}" class="btn btn-success">➕ Nuevo Producto</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        @if($inventarios->count())
            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Producto</th>
                            <th>Costo Total</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inventarios as $inventario)
                            <tr>
                                <td>{{ $inventario->id }}</td>
                                <td><strong>{{ $inventario->products->first()->name ?? 'Sin producto' }}</strong></td>
                                <td>S/ {{ number_format($inventario->costo_total, 2) }}</td>
                                <td>{{ $inventario->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('inventario.detalle', $inventario->id) }}" class="btn btn-info btn-sm">👁️ Ver Detalle</a>
                                    <form action="{{ route('inventario.destroy', $inventario->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Seguro que deseas eliminar este inventario? 🌸')">
                                            🗑️ Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-warning text-center">🌼 No hay inventarios registrados aún.</div>
        @endif

        <footer>
            <p>🌷 Florería "AriDetalles" — Amor y frescura en cada detalle 🌿</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
