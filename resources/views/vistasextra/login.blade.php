<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Florería</title>
    @auth
    @if (Auth::user()->role === 'admin')
        {{-- Navbar ADMIN --}}
        @include('forms', ['Modo' => 'Encabezado'])

    @elseif (Auth::user()->role === 'cliente')
        {{-- Navbar CLIENTE --}}
        @include('forms', ['Modo' => 'EncabezadoClie'])
    @endif
    @else
        {{-- Navbar PÚBLICO (sin login) --}}
        @include('forms', ['Modo' => 'EncabezadoClie'])
    @endauth
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5" style="max-width: 400px;">
    <h2 class="text-center mb-4">Iniciar Sesión</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('login.post') }}" method="POST">
        {{ csrf_field() }}

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" name="email" id="email" class="form-control" required autofocus>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </div>
        <a href="{{ route('register') }}">No tienes cuenta?</a>
    </form>
</div>
</body>
</html>
