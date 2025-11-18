<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <div class="container mt-4">
    <h2 class="mb-4 text-success">🌸 Crear Producto</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        @include('forms', ['Modo' => 'crearP'])
        
        <div class="mt-4 text-end">
            <button type="submit" class="btn btn-success">💾 Guardar Producto</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">↩️ Volver</a>
        </div>
    </form>
</div>
@include('forms', ['Modo' => 'Accesibilidad'])
</body>
</html>
