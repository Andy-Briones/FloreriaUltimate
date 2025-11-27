<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto #{{ $inventario->id }} - Aridetalles</title>

    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,400&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Tu navbar -->
    @include('forms', ['Modo' => 'Encabezado'])

    <style>
        :root {
            --primary: #38122A;
            --accent: #c94f7c;
            --dark: #2d0f22;
            --gray: #555;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--light);
            color: var(--primary);
            line-height: 1.6;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        h2 {
            font-family: 'Inria Serif', serif;
            font-size: 2.4rem;
            text-align: center;
            color: var(--primary);
            margin-bottom: 2rem;
            position: relative;
        }

        h2::after {
            content: '';
            display: block;
            width: 80px;
            height: 4px;
            background: var(--accent);
            margin: 1rem auto;
            border-radius: 2px;
        }

        .product-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(56, 18, 42, 0.1);
            margin-bottom: 3rem;
        }

        .card-header {
            background: linear-gradient(135deg, #561c41, var(--primary));
            color: white;
            padding: 1.5rem;
            text-align: center;
            font-family: 'Inria Serif', serif;
            font-size: 1.6rem;
            font-weight: 700;
        }

        .card-body {
            padding: 2rem;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .info-item {
            background: #f8f8f8;
            padding: 1.2rem;
            border-radius: 15px;
            border-left: 5px solid var(--accent);
        }

        .info-item strong {
            color: var(--primary);
            font-family: 'Inria Serif', serif;
            font-size: 1.1rem;
            display: block;
            margin-bottom: 0.5rem;
        }

        .info-item span {
            font-size: 1.3rem;
            font-weight: 600;
            color: var(--accent);
        }

        /* Tabla de insumos */
        .table-container {
            overflow-x: auto;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            font-size: 0.95rem;
        }

        thead {
            background: var(--primary);
            color: white;
            font-family: 'Inria Serif', serif;
        }

        thead th {
            padding: 1rem;
            text-align: center;
        }

        tbody tr {
            transition: background 0.3s;
        }

        tbody tr:hover {
            background: #f0e6f0;
        }

        tbody td {
            padding: 1rem;
            text-align: center;
            border-bottom: 1px solid #eee;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        .empty-row {
            padding: 3rem !important;
            font-style: italic;
            color: var(--gray);
            font-size: 1.1rem;
        }

        /* Botón volver */
        .btn-back {
            display: block;
            width: fit-content;
            margin: 3rem auto 2rem;
            background: var(--primary);
            color: white;
            padding: 0.9rem 2rem;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            font-family: 'Inria Serif', serif;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(56, 18, 42, 0.2);
        }

        .btn-back:hover {
            background: var(--accent);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(201, 79, 124, 0.3);
        }

        /* Responsive */
        @media (max-width: 768px) {
            h2 { font-size: 2rem; }
            .info-grid { grid-template-columns: 1fr; }
            .card-header { font-size: 1.4rem; }
        }
    </style>
</head>
<body>

<div class="container">

    <h2>Detalle del Producto #{{ $inventario->id }}</h2>

    <!-- CARD PRINCIPAL -->
    <div class="product-card">
        <div class="card-header">
            Información del Arreglo Floral
        </div>
        <div class="card-body">

            <div class="info-grid">
                <div class="info-item">
                    <strong>Descripción</strong>
                    <p style="margin:0; font-size:1.1rem; color:#444;">
                        {{ $inventario->descripcion ?: 'Sin descripción' }}
                    </p>
                </div>
                <div class="info-item">
                    <strong>Cantidad total usada</strong>
                    <span>{{ $inventario->cantidad_usada }}</span> unidades
                </div>
                <div class="info-item">
                    <strong>Costo total</strong>
                    <span>S/. {{ number_format($inventario->costo_total, 2) }}
                </div>
            </div>
        </div>
    </div>

    <!-- TABLA DE INSUMOS -->
    <h4 style="font-family:'Inria Serif'; color:var(--primary); margin:2rem 0 1rem;">
        Insumos utilizados
    </h4>

    <div class="table-container">
        <table>
            <thead>
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
                        <td><strong>{{ $insumo->nombre }}</strong></td>
                        <td>{{ $insumo->pivot->cantidad_usada }}</td>
                        <td>S/. {{ number_format($insumo->costo_unitario, 2) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="empty-row">
                            No hay insumos registrados en este producto.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- BOTÓN VOLVER -->
    <a href="{{ route('inventario.index') }}" class="btn-back">
        ← Volver al inventario
    </a>

</div>

</body>
</html>