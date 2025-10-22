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
<style>
    /* Fondo general */
body {
    background: linear-gradient(135deg, #e6ffe6 0%, #ffffff 100%);
    font-family: "Poppins", sans-serif;
    color: #333;
}

/* Título principal */
h4 {
    font-weight: 600;
    letter-spacing: 0.5px;
}

/* Tarjeta principal */
.card {
    border-radius: 15px;
    overflow: hidden;
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-3px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

/* Encabezado de la tarjeta */
.card-header {
    background: linear-gradient(90deg, #198754, #25a86d);
    border: none;
    font-weight: 500;
    letter-spacing: 0.4px;
}

/* Botones del encabezado */
.card-header .btn {
    border-radius: 20px;
    transition: all 0.3s ease;
    font-weight: 500;
}

.card-header .btn:hover {
    background-color: #f8f9fa;
    color: #198754;
    transform: scale(1.05);
}

/* Tabla */
.table {
    margin-top: 10px;
    border-radius: 10px;
    overflow: hidden;
}

.table thead {
    background-color: #212529;
    color: #fff;
    font-weight: 500;
}

.table-hover tbody tr:hover {
    background-color: #d1f3d1;
    transition: 0.2s ease-in-out;
}

/* Celdas */
.table td, .table th {
    vertical-align: middle;
    text-align: center;
}

/* Imagen o texto en columna imagen */
.table td:nth-child(6) {
    font-style: italic;
    color: #666;
}

/* Botones de acción */
.btn-warning {
    background-color: #ffc107;
    border: none;
    color: #fff;
    font-weight: 500;
}

.btn-warning:hover {
    background-color: #e0a800;
    transform: scale(1.05);
}

.btn-danger {
    background-color: #dc3545;
    border: none;
    font-weight: 500;
}

.btn-danger:hover {
    background-color: #c82333;
    transform: scale(1.05);
}

/* Alertas */
.alert-success {
    background-color: #d4edda;
    color: #155724;
    border-left: 5px solid #198754;
    border-radius: 10px;
}

/* Paginación */
.pagination {
    justify-content: center;
    margin-top: 20px;
}

.page-link {
    color: #198754;
    border-radius: 10px;
}

.page-item.active .page-link {
    background-color: #198754;
    border-color: #198754;
}

/* Responsivo */
@media (max-width: 768px) {
    .card-header {
        flex-direction: column;
        gap: 10px;
        text-align: center;
    }
    .table thead {
        display: none;
    }
    .table tbody tr {
        display: block;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 10px;
        padding: 10px;
    }
    .table td {
        display: flex;
        justify-content: space-between;
        padding: 6px 0;
    }
    .table td::before {
        content: attr(data-label);
        font-weight: bold;
        color: #198754;
    }
}

</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>