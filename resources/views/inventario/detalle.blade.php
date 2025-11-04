<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container mt-4">
    <h2 class="mb-4 text-center">🧾 Detalle del Inventario #{{ $inventario->id }}</h2>

    <div class="card mb-4">
        <div class="card-body">
            <p><strong>Descripción:</strong> {{ $inventario->descripcion }}</p>
            <p><strong>Cantidad total usada:</strong> {{ $inventario->cantidad_usada }}</p>
            <p><strong>Costo total:</strong> S/. {{ number_format($inventario->costo_total, 2) }}</p>
        </div>
    </div>

    <h4>🧩 Insumos utilizados:</h4>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre del Insumo</th>
                <th>Cantidad usada</th>
                <th>Costo unitario</th>
                <th>Costo total</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($inventario->insumos as $insumo)
                <tr>
                    <td>{{ $insumo->id }}</td>
                    <td>{{ $insumo->nombre }}</td>
                    <td>{{ $insumo->pivot->cantidad_usada }}</td>
                    <td>S/. {{ number_format($insumo->costo_unitario, 2) }}</td>
                    <td>S/. {{ number_format($insumo->pivot->costo_total, 2) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No hay insumos registrados en este inventario.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        <a href="{{ route('inventario.index') }}" class="btn btn-secondary">← Volver</a>
    </div>
</div>
</body>
</html>