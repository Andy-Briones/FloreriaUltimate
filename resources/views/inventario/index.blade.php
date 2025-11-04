<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <div>
        @include('forms', ['Modo' => 'Encabezado'])
    </div>
</head>
<body>
    <div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>📦 Inventario de Producción</h2>
        <a href="{{ route('inventario.create') }}" class="btn btn-success">+ Nuevo Inventario</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($inventarios->count())
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
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
                    <td>{{ $inventario->products->first()->name ?? 'Sin producto' }}</td>
                    <td>S/ {{ number_format($inventario->costo_total, 2) }}</td>
                    <td>{{ $inventario->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                        <a href="{{ route('inventario.show', $inventario->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <form action="{{ route('inventario.destroy', $inventario->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro de eliminar este inventario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <div class="alert alert-warning">No hay inventarios registrados aún.</div>
    @endif
</div>
</body>
</html>