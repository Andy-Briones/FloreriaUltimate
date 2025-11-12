<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Aridetalles</title>

    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Estilos -->
    <style>
        /* ===== RESET & BASE ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inria Serif', serif;
            background: linear-gradient(135deg, #F9F5EC 0%, #fdf2f8 100%);
            color: #38122A;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 1rem;
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: flex-start;
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

        /* ===== REGISTRO CARD ===== */
        .register-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            width: 100%;
            max-width: 500px;
            animation: fadeInUp 0.6s ease;
            margin-top: 2rem;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .register-title {
            font-size: 1.9rem;
            color: #38122A;
            text-align: center;
            margin-bottom: 0.5rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .register-title svg {
            width: 30px;
            height: 30px;
            fill: #FF69B4;
        }

        .register-subtitle {
            text-align: center;
            color: #777;
            font-size: 0.95rem;
            margin-bottom: 2rem;
            font-family: 'Inter', sans-serif;
        }

        /* ===== FORMULARIO ===== */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.2rem;
        }

        .form-group {
            margin-bottom: 1.3rem;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            font-family: 'Inter', sans-serif;
            font-weight: 600;
            color: #38122A;
            margin-bottom: 0.5rem;
            display: block;
            font-size: 0.95rem;
        }

        input {
            font-family: 'Inter', sans-serif;
            width: 100%;
            padding: 0.9rem 1rem;
            border: 1.5px solid #ddd;
            border-radius: 12px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: #fdfbfc;
        }

        input:focus {
            outline: none;
            border-color: #FF69B4;
            box-shadow: 0 0 10px rgba(255, 105, 180, 0.2);
        }

        /* ===== BOTONES ===== */
        .btn-custom {
            padding: 0.9rem 1.8rem;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            display: block;
            font-size: 1rem;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            border: none;
            width: 100%;
            margin-top: 0.5rem;
        }

        .btn-success-custom {
            background: #7acb77;
            color: #2e5930;
        }

        .btn-success-custom:hover {
            background: #58b368;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(122, 203, 119, 0.3);
        }

        .btn-secondary-custom {
            background: #f8d7e3;
            color: #38122A;
            border: 1.5px solid #38122A;
            font-size: 0.9rem;
            padding: 0.7rem 1.5rem;
            margin-top: 1.5rem;
            text-align: center;
        }

        .btn-secondary-custom:hover {
            background: #38122A;
            color: white;
        }

        .login-link {
            text-align: center;
            margin-top: 1.5rem;
        }

        /* ===== ALERTAS ===== */
        .alert-custom {
            padding: 1rem 1.5rem;
            border-radius: 12px;
            text-align: left;
            font-size: 0.92rem;
            margin-bottom: 1.5rem;
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .alert-success-custom {
            background: #d9fdd3;
            border: 1.5px solid #b2e8a7;
            color: #2e7d32;
        }

        .alert-error-custom {
            background: #fde8e8;
            color: #9b1d1d;
            border: 1.5px solid #f5c6cb;
        }

        .alert-error-custom ul {
            margin: 0.5rem 0 0;
            padding-left: 1.2rem;
        }

        .alert-error-custom li {
            margin-bottom: 0.3rem;
        }

        /* ===== FOOTER ===== */
        footer {
            text-align: center;
            padding: 2rem 0;
            color: #777;
            font-size: 0.9rem;
            margin-top: 3rem;
            font-family: 'Inter', sans-serif;
            border-top: 1px solid #eee;
            background: #fdf9fb;
        }

        footer p {
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        footer svg {
            width: 20px;
            height: 20px;
            fill: #FF69B4;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .register-card {
                padding: 2rem;
                margin: 1rem;
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
@include('forms', ['Modo' => 'Accesibilidad'])
<!-- HEADER -->
<header class="header">
    <div class="nav-container">
        <button class="menu-toggle">Menú</button>
    </div>
</header>

<!-- CONTENIDO -->
<div class="container">
    <div class="register-card">
        <h1 class="register-title">
            <svg viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
            </svg>
            Crear Cuenta
        </h1>
        <p class="register-subtitle">
            Únete a nuestra comunidad y disfruta de ofertas exclusivas.
        </p>

        @if(session('success'))
            <div class="alert-custom alert-success-custom">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert-custom alert-error-custom">
                <strong>Por favor corrige los siguientes errores:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.post') }}" method="POST">
            @csrf

            <div class="form-grid">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{3,100}" title="Solo letras, mínimo 3 caracteres">
                </div>

                <div class="form-group">
                    <label for="surname">Apellido</label>
                    <input type="text" name="surname" id="surname" value="{{ old('surname') }}" required pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{3,100}" title="Solo letras, mínimo 3 caracteres">
                </div>

                <div class="form-group">
                    <label for="phone">Teléfono</label>
                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required pattern="[0-9]{9,15}" title="Debe tener entre 9 y 15 dígitos">
                </div>

                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required>
                </div>

                <div class="form-group full">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required>
                </div>

                <div class="form-group full">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" required minlength="8" title="Mínimo 8 caracteres">
                </div>

                <div class="form-group full">
                    <label for="password_confirmation">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required minlength="8" title="Debe coincidir con la contraseña anterior">
                </div>
            </div>

            <button type="submit" class="btn-custom btn-success-custom">
                Registrarse
            </button>
        </form>

        <div class="login-link">
            <a href="{{ route('login') }}" class="btn-custom btn-secondary-custom">
                Ya tienes cuenta? Inicia sesión
            </a>
        </div>
    </div>
</div>

<footer>
    <p>
        <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/>
        </svg>
        © Aridetalles 2025 — Amor y frescura en cada detalle
        <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/>
        </svg>
    </p>
</footer>

<script>
    // Menu mobile
    document.querySelector('.menu-toggle')?.addEventListener('click', () => {
        document.querySelector('.nav')?.classList.toggle('active');
    });
</script>

</body>
</html>