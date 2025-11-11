<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('forms', ['Modo' => 'Encabezado'])
</head>
<body>
    <form action="{{ route('inventario.update', $inventario->id) }}" method="POST" enctype="multipart/form-data" class="p-4 bg-white shadow rounded">
    @csrf
    @method('PUT')
    @include('forms', ['Modo' => 'editarInv'])

    <div class="text-center mt-4">
        <button type="submit" class="btn btn-primary me-2">💾 Guardar</button>
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">⬅️ Cancelar</a>
    </div>
</form>
@include('forms', ['Modo' => 'Accesibilidad'])
</body>
</html>