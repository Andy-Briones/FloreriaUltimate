<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Aridetalles</title>

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

        /* ===== LOGIN CARD ===== */
        .login-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
            padding: 2.5rem;
            width: 100%;
            max-width: 420px;
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

        .login-title {
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

        .login-title svg {
            width: 30px;
            height: 30px;
            fill: #FF69B4;
        }

        .login-subtitle {
            text-align: center;
            color: #000000ff;
            font-size: 0.95rem;
            margin-bottom: 2rem;
            font-family: 'Inter', sans-serif;
        }

        /* ===== FORMULARIO ===== */
        .form-group {
            margin-bottom: 1.3rem;
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

        .btn-primary-custom {
            background: #FF69B4;
            color: white;
        }

        .btn-primary-custom:hover {
            background: #ff4d9a;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(255, 105, 180, 0.3);
        }

        .register-link {
            text-align: center;
            margin-top: 1.5rem;
            font-family: 'Inter', sans-serif;
            font-size: 0.92rem;
            color: #000000ff;
        }

        .register-link a {
            color: #FF69B4;
            text-decoration: none;
            font-weight: 600;
        }

        .register-link a:hover {
            color: #ff4d9a;
            text-decoration: underline;
        }

        /* ===== ALERTAS ===== */
        .alert-custom {
            padding: 1rem 1.5rem;
            border-radius: 12px;
            text-align: center;
            font-size: 0.92rem;
            margin-bottom: 1.5rem;
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .alert-error-custom {
            background: #fde8e8;
            color: #9b1d1d;
            border: 1.5px solid #f5c6cb;
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
            .login-card {
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

<!-- CONTENIDO -->
<div class="container">
    <div class="login-card">
        <h1 class="login-title">
            <svg viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
            </svg>
            Iniciar Sesión
        </h1>
        <p class="login-subtitle">
            Accede a tu cuenta para gestionar pedidos y productos.
        </p>

        @if(session('error'))
            <div class="alert-custom alert-error-custom">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" name="email" id="email" required autofocus>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" required>
            </div>

            <button type="submit" class="btn-custom btn-primary-custom">
                Iniciar Sesión
            </button>
        </form>

        <div class="register-link">
            <a href="{{ route('register') }}">¿No tienes cuenta? Regístrate aquí</a>
        </div>
    </div>
</div>
<a href="https://wa.me/51999369837?text=Hola%2C%20quisiera%20hacer%20un%20pedido%20AriDetalles" class="wsp-float" target="_blank" title="Contáctanos por WhatsApp">
    <img src="https://img.icons8.com/ios-filled/50/ffffff/whatsapp.png" alt="WhatsApp" width="30" height="30">
  </a>

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