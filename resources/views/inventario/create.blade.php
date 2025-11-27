<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* 🎀 Estilo floral para el formulario de Inventario */
        body {
            background-color: #38122A;
            font-family: 'Poppins', sans-serif;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 40px auto;
            background: white;
            border-radius: 16px;
            box-shadow: 0 6px 18px rgba(201, 79, 124, 0.1);
            padding: 30px 40px;
            border: 1px solid #f2b1c2;
        }

        h2 {
            text-align: center;
            color: #c94f7c;
            font-weight: 700;
            margin-bottom: 25px;
        }

        .alert-success {
            background-color: #eafaf1;
            color: #2e7d32;
            border-left: 4px solid #66bb6a;
            padding: 10px 15px;
            border-radius: 8px;
        }

        .alert-danger {
            background-color: #fdecea;
            color: #c62828;
            border-left: 4px solid #ef5350;
            padding: 10px 15px;
            border-radius: 8px;
        }

        form {
            margin-top: 15px;
        }

        label {
            color: #c94f7c;
            font-weight: 600;
            margin-bottom: 6px;
            display: block;
        }

        input[type="text"],
        input[type="number"],
        select,
        textarea {
            width: 100%;
            border-radius: 12px;
            border: 1px solid #f2b1c2;
            padding: 10px;
            box-shadow: 0 2px 5px rgba(201,79,124,0.05);
            margin-bottom: 15px;
            transition: all 0.2s ease-in-out;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #c94f7c;
            outline: none;
            box-shadow: 0 0 6px rgba(201, 79, 124, 0.3);
        }

        .text-end {
            text-align: right;
        }

        .btn {
            border-radius: 8px;
            padding: 8px 18px;
            font-weight: 500;
            border: none;
            transition: all 0.2s ease-in-out;
        }

        .btn-primary {
            background-color: #e58ba3;
            color: white;
        }

        .btn-primary:hover {
            background-color: #c94f7c;
        }

        .btn-secondary {
            background-color: #f2b1c2;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #e58ba3;
        }
    </style>
    <div>
        @include('forms', ['Modo' => 'Encabezado'])
    </div>
</head>
<body>
    <div class="container mt-4">
    <h2 class="mb-4 text-primary">📦 Crear Producto</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('inventario.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('forms', ['Modo' => 'crearInv'])
        
        <div class="mt-4 text-end">
            <button type="submit" class="btn btn-primary">💾 Guardar Inventario</button>
            <a href="{{ route('inventario.index') }}" class="btn btn-secondary">↩️ Volver</a>
        </div>
    </form>
</div>
@include('forms', ['Modo' => 'Accesibilidad'])
</body>
</html>
