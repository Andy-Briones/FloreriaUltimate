<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario de Producción - Aridetalles</title>

    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Estilos (mismo que página principal) -->
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

        /* ===== CARD ===== */
        .inventory-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            margin-top: 1.5rem;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .card-title {
            font-size: 1.8rem;
            color: #38122A;
            font-weight: 700;
            margin: 0;
        }

        /* ===== BOTONES ===== */
        .btn-custom {
            padding: 0.6rem 1.2rem;
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

        .btn-success-custom {
            background: #7acb77;
            color: #2e5930;
        }

        .btn-success-custom:hover {
            background: #58b368;
            color: white;
            transform: translateY(-1px);
        }

        .btn-info-custom {
            background: #a7d8ff;
            color: #1f4f68;
        }

        .btn-info-custom:hover {
            background: #6bc3ff;
            color: white;
        }

        .btn-danger-custom {
            background: #f26a6a;
            color: white;
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
            border-bottom: 1px solid #eee;
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

        /* ===== ALERTAS ===== */
        .alert-custom {
            padding: 1rem;
            border-radius: 12px;
            text-align: center;
            font-size: 0.95rem;
            margin-bottom: 1.5rem;
            font-family: 'Inter', sans-serif;
        }

        .alert-success-custom {
            background: #d9fdd3;
            border: 1px solid #b2e8a7;
            color: #2e7d32;
        }

        .alert-warning-custom {
            background: #fff7e6;
            border: 1px solid #ffe1a3;
            color: #8b6b00;
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
            .card-header {
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
<a href="https://wa.me/51999369837?text=Hola%2C%20quisiera%20hacer%20un%20pedido%20AriDetalles" class="wsp-float" target="_blank" title="Contáctanos por WhatsApp">
    <img src="https://img.icons8.com/ios-filled/50/ffffff/whatsapp.png" alt="WhatsApp" width="30" height="30">
  </a>

<!-- CONTENIDO -->
<div class="container">
    <div class="inventory-card">
        <div class="card-header">
            <h2 class="card-title">Inventario de Producción</h2>
            <a href="{{ route('inventario.create') }}" class="btn-custom btn-success-custom">
                Nuevo Producto
            </a>
        </div>

        @if(session('success'))
            <div class="alert-custom alert-success-custom">
                {{ session('success') }}
            </div>
        @endif

        @if($inventarios->count())
            <div class="table-responsive">
                <table class="table-custom">
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
                                <td class="price">S/ {{ number_format($inventario->costo_total, 2) }}</td>
                                <td>{{ $inventario->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('inventario.detalle', $inventario->id) }}" class="btn-custom btn-info-custom btn-sm">
                                        Ver Detalle
                                    </a>
                                    <form action="{{ route('inventario.destroy', $inventario->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-custom btn-danger-custom btn-sm"
                                            onclick="return confirm('¿Seguro que deseas eliminar este inventario?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert-custom alert-warning-custom">
                No hay inventarios registrados aún.
            </div>
        @endif
    </div>

    <footer>
        <p>Florería "AriDetalles" — Amor y frescura en cada detalle</p>
    </footer>
</div>
@include('forms', ['Modo' => 'Accesibilidad'])

<script>
    // Menu mobile
    document.querySelector('.menu-toggle')?.addEventListener('click', () => {
        document.querySelector('.nav')?.classList.toggle('active');
    });
</script>

</body>
</html>