<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Insumo - Aridetalles</title>

    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- ESTILO EXACTO AL DE CREAR INSUMO -->
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inria Serif', serif;
            background-color: #F9F5EC;
            color: #38122A;
            line-height: 1.6;
            min-height: 100vh;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .form-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            padding: 2.5rem;
            animation: fadeIn 0.6s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .form-title {
            font-size: 1.9rem;
            color: #38122A;
            text-align: center;
            margin-bottom: 2rem;
            font-weight: 700;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.3rem;
            margin-bottom: 1.5rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            font-family: 'Inter', sans-serif;
            font-weight: 600;
            color: #38122A;
            margin-bottom: 0.5rem;
            font-size: 0.98rem;
        }

        input, select, textarea {
            font-family: 'Inter', sans-serif;
            padding: 0.85rem 1.1rem;
            border: 1.6px solid #ddd;
            border-radius: 14px;
            font-size: 0.98rem;
            background: #fdfbfc;
            transition: all 0.3s ease;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #FF69B4;
            box-shadow: 0 0 10px rgba(255, 105, 180, 0.25);
        }

        textarea {
            resize: vertical;
            min-height: 110px;
        }

        /* BOTONES IGUALES */
        .btn-custom {
            padding: 0.8rem 2rem;
            border-radius: 30px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            border: none;
        }

        .btn-primary-custom {
            background: #FF69B4;
            color: white;
        }

        .btn-primary-custom:hover {
            background: #ff4d9a;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(255, 105, 180, 0.3);
        }

        .btn-secondary-custom {
            background: #f8d7e3;
            color: #38122A;
            border: 1.8px solid #38122A;
        }

        .btn-secondary-custom:hover {
            background: #38122A;
            color: white;
            transform: translateY(-2px);
        }

        .btn-group {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-top: 2.5rem 0 1rem;
            flex-wrap: wrap;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-grid { grid-template-columns: 1fr; }
            .btn-group { flex-direction: column; align-items: center; }
            .btn-custom { width: 100%; max-width: 300px; }
            .form-card { padding: 2rem 1.5rem; }
        }
    </style>

    @include('forms', ['Modo' => 'Encabezado'])
</head>
<body>

<div class="container">
    <div class="form-card">
        <h2 class="form-title">Editar Insumo</h2>

        <form action="{{ route('insumos.update', $insumo->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-grid">
                @include('forms', ['Modo' => 'editarI'])
            </div>

            <div class="btn-group">
                <button type="submit" class="btn-custom btn-primary-custom">
                    Guardar Cambios
                </button>
                <a href="{{ url()->previous() }}" class="btn-custom btn-secondary-custom">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>

@include('forms', ['Modo' => 'Accesibilidad'])
</body>
</html>