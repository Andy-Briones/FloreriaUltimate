<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto - Florería</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* ===== Estilo General ===== */
        body {
            background-color: #fff8f0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #4b3c2a;
        }

        .container {
            max-width: 900px;
            margin-top: 50px;
            padding: 20px;
        }

        h2, h4 {
            color: #a05d4d;
            font-family: 'Cursive', sans-serif;
        }

        /* ===== Card ===== */
        .card {
            background-color: #fff3e6;
            border: 2px solid #f1c0a1;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .card-body p {
            font-size: 1.1rem;
        }

        /* ===== Tabla ===== */
        table {
            background-color: #fff8f0;
            border-radius: 10px;
            overflow: hidden;
        }

        thead.table-dark {
            background-color: #f1c0a1 !important;
            color: #4b3c2a !important;
        }

        tbody tr:nth-child(even) {
            background-color: #fff1e6;
        }

        tbody tr:hover {
            background-color: #fde4d9;
        }

        th, td {
            vertical-align: middle !important;
            text-align: center;
        }

        /* ===== Botón ===== */
        .btn-secondary {
            background-color: #a05d4d;
            border: none;
            color: #fff;
            padding: 10px 20px;
            border-radius: 50px;
            transition: 0.3s;
        }

        .btn-secondary:hover {
            background-color: #c07763;
        }
    </style>
    @include('forms', ['Modo' => 'Encabezado'])
</head>
<body>
@include('forms', ['Modo' => 'Accesibilidad'])
    <div class="container">
        <h2 class="mb-4 text-center">🌸 Detalle del Producto #{{ $inventario->id }}</h2>

        <div class="card mb-4">
            <div class="card-body">
                <p><strong>Descripción:</strong> {{ $inventario->descripcion }}</p>
                <p><strong>Cantidad total usada:</strong> {{ $inventario->cantidad_usada }}</p>
                <p><strong>Costo total:</strong> S/. {{ number_format($inventario->costo_total, 2) }}</p>
            </div>
        </div>

        <h4>🌼 Insumos utilizados:</h4>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre del Insumo</th>
                    <th>Cantidad usada</th>
                    <th>Costo unitario</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($inventario->insumos as $insumo)
                    <tr>
                        <td>{{ $insumo->id }}</td>
                        <td>{{ $insumo->nombre }}</td>
                        <td>{{ $insumo->pivot->cantidad_usada }}</td>
                        <td>S/. {{ number_format($insumo->costo_unitario, 2) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No hay insumos registrados en este inventario.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-3 text-center">
            <a href="{{ route('inventario.index') }}" class="btn btn-secondary">← Volver</a>
        </div>
    </div>
</body>
</html>
