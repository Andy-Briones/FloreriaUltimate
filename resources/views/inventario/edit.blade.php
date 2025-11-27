<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>

    @include('forms', ['Modo' => 'Encabezado'])

    <style>
        /* 🌸 Tema Floral para Inventario */
        body {
            background-color: #38122A;
            font-family: 'Poppins', sans-serif;
        }

        .container-form {
            max-width: 800px;
            margin: 40px auto;
            background: white;
            border-radius: 16px;
            box-shadow: 0 6px 18px rgba(201, 79, 124, 0.1);
            padding: 35px 45px;
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
            margin-bottom: 15px;
        }

        .alert-danger {
            background-color: #fdecea;
            color: #c62828;
            border-left: 4px solid #ef5350;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 15px;
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
            margin-bottom: 18px;
            transition: 0.2s;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #c94f7c;
            outline: none;
            box-shadow: 0 0 6px rgba(201, 79, 124, 0.3);
        }

        /* Botones */
        .btn {
            border-radius: 10px;
            padding: 10px 24px;
            font-weight: 500;
            border: none;
            transition: 0.2s;
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

        .text-center {
            margin-top: 25px;
        }
    </style>
</head>

<body>

<div class="container-form">

    <h2>✏️ Editar Producto</h2>

    <form action="{{ route('inventario.update', $inventario->id) }}" 
          method="POST" 
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        @include('forms', ['Modo' => 'editarInv'])

        <div class="text-center">
            <button type="submit" class="btn btn-primary me-2">💾 Guardar</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">⬅️ Volver</a>
        </div>
    </form>
</div>

@include('forms', ['Modo' => 'Accesibilidad'])

</body>
</html>
