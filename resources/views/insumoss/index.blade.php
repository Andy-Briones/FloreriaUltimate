<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🌷 Lista de Insumos - Florería</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos personalizados -->
    <style>
        body {
            {{--  background: linear-gradient(to bottom right, #f9fff9, #fff0f5);  --}}
            background-color: #e89af2ff;
            font-family: 'Poppins', sans-serif;
        }

        .card {
            border-radius: 20px;
            background-color: #ffffffee;
        }

        .card-header {
            background: linear-gradient(90deg, #58b368, #a3de83);
            border-radius: 20px 20px 0 0;
            box-shadow: 0 2px 5px rgba(0,0,0,0.15);
        }

        .card-header h4 {
            font-weight: 600;
            font-family: 'Georgia', serif;
        }

        .btn-light {
            background-color: #ffe4ec;
            border: none;
            color: #5b705c;
            font-weight: 500;
            transition: 0.3s;
        }

        .btn-light:hover {
            background-color: #f7b7c1;
            color: white;
        }

        .btn-warning {
            background-color: #ffda77;
            border: none;
            transition: 0.3s;
        }

        .btn-warning:hover {
            background-color: #ffc447;
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
            background-color: #eafbea;
        }

        .alert-success {
            background-color: #d9fdd3;
            border: 1px solid #b2e8a7;
            color: #2e7d32;
        }

        .pagination {
            justify-content: center;
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
        @include('forms', ['Modo' => 'EncabezadoClie'])
    @endif
    @else
        {{-- Navbar PÚBLICO (sin login) --}}
        @include('forms', ['Modo' => 'EncabezadoClie'])
    @endauth
</head>

<body>
<div class="container mt-5">
    <div class="card shadow border-0">
        <div class="card-header text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">🌸 Lista de Insumos</h4>
            <div>
                <a href="{{ route('insumos.create') }}" class="btn btn-light me-2">➕ Nuevo Insumo</a>
                <a href="{{ url('/') }}" class="btn btn-light">🏠 Regresar</a>
            </div>
        </div>

        <div class="card-body">
            @if(session('mensaje'))
                <div class="alert alert-success text-center">{{ session('mensaje') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle text-center">
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
                                <td>💲{{ number_format($insumo->costo_unitario, 2) }}</td>
                                <td>{{ $insumo->category->name ?? 'N/A' }}</td>
                                <td>{{ $insumo->supplier->name ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('insumos.edit', $insumo->id) }}" class="btn btn-sm btn-warning">
                                        ✏️ Editar
                                    </a>
                                    <form action="{{ route('insumos.destroy', $insumo->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('¿Seguro que deseas eliminar este insumo? 🌹')">
                                            🗑️ Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-muted">🌼 No hay insumos registrados</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $insumos->links() }}
            </div>
        </div>
    </div>

    <footer>
        <p>🌷 Florería "AriDetalles" — Cuidando cada detalle de la naturaleza 🌿</p>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
