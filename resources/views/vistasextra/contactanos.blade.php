<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Aridetalles</title>

    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Estilos (mismo que página principal + mejoras para contacto) -->
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
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
            flex: 1;
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

        /* ===== CONTACTO CARD ===== */
        .contact-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
            padding: 2.5rem;
            margin-top: 1.5rem;
            animation: fadeIn 0.5s ease;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .contact-title {
            font-size: 2rem;
            color: #38122A;
            text-align: center;
            margin-bottom: 0.5rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .contact-title svg {
            width: 32px;
            height: 32px;
            fill: #FF69B4;
        }

        .contact-subtitle {
            text-align: center;
            color: #000000ff;
            font-size: 1rem;
            margin-bottom: 2rem;
            font-family: 'Inter', sans-serif;
        }

        /* ===== FORMULARIO ===== */
        .contact-form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
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
            margin-bottom: 0.4rem;
            font-size: 0.95rem;
        }

        input, select, textarea {
            font-family: 'Inter', sans-serif;
            padding: 0.9rem 1rem;
            border: 1.5px solid #ddd;
            border-radius: 12px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: #fdfbfc;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #FF69B4;
            box-shadow: 0 0 8px rgba(255, 105, 180, 0.2);
        }

        textarea {
            resize: vertical;
            min-height: 120px;
        }

        /* ===== BOTONES ===== */
        .btn-custom {
            padding: 0.8rem 1.8rem;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            font-size: 0.95rem;
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
            transform: translateY(-1px);
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: 'Inter', sans-serif;
            font-size: 0.9rem;
            color: #000000ff;
            margin-top: 1rem;
        }

        /* ===== INFO BOX ===== */
        .info-box {
            background: #fdf2f8;
            border: 1.5px solid #ffe4ec;
            border-radius: 16px;
            padding: 1.5rem;
            margin-top: 1.5rem;
        }

        .info-title {
            font-size: 1.3rem;
            color: #38122A;
            margin-bottom: 1rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .info-title svg {
            width: 22px;
            height: 22px;
            fill: #FF69B4;
        }

        .info-list {
            list-style: none;
            padding: 0;
            margin: 0;
            font-family: 'Inter', sans-serif;
            color: #555;
            font-size: 0.95rem;
        }

        .info-list li {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 0.6rem;
        }

        .info-list svg {
            width: 18px;
            height: 18px;
            fill: #38122A;
        }

        /* ===== ALERTAS ===== */
        .alert-custom {
            padding: 1rem 1.5rem;
            border-radius: 12px;
            text-align: center;
            font-size: 0.95rem;
            margin: 1rem 0;
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }

        .alert-success-custom {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error-custom {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* ===== FOOTER ===== */
        footer {
            text-align: center;
            padding: 2rem 0;
            color: #000000ff;
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
            .contact-form {
                grid-template-columns: 1fr;
            }

            .form-footer {
                flex-direction: column;
                gap: 0.5rem;
                text-align: center;
            }

            .btn-custom {
                width: 100%;
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
<a href="https://wa.me/51999369837?text=Hola%2C%20quisiera%20hacer%20un%20pedido%20AriDetalles" class="wsp-float" target="_blank" title="Contáctanos por WhatsApp">
    <img src="https://img.icons8.com/ios-filled/50/ffffff/whatsapp.png" alt="WhatsApp" width="30" height="30">
  </a>
<!-- CONTENIDO -->
<div class="container">
    <div class="contact-card">
        <h1 class="contact-title">
            <svg viewBox="0 0 24 24" fill="currentColor">
                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9566 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
            </svg>
            Contáctanos
        </h1>
        <p class="contact-subtitle">
            ¿Tienes una idea o necesitas ayuda? Escríbenos y te responderemos pronto.
        </p>

        <form id="contactForm">
            <div id="formAlert"></div>

            <div class="contact-form">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input id="name" name="name" placeholder="Tu nombre" required>
                </div>

                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input id="email" name="email" type="email" placeholder="ejemplo@correo.com" required>
                </div>

                <div class="form-group full">
                    <label for="reason">Motivo</label>
                    <select id="reason" name="reason" required>
                        <option value="">Selecciona...</option>
                        <option value="consulta">Consulta</option>
                        <option value="soporte">Soporte</option>
                        <option value="cotizacion">Cotización</option>
                    </select>
                </div>

                <div class="form-group full">
                    <label for="message">Mensaje</label>
                    <textarea id="message" name="message" placeholder="Cuéntanos con detalle" required></textarea>
                </div>
            </div>

            <div class="form-footer">
                <small>Responderemos dentro de 48 horas hábiles.</small>
                <button type="submit" class="btn-custom btn-primary-custom">Enviar</button>
            </div>
        </form>

        <!-- INFO BOX -->
        <div class="info-box">
            <h3 class="info-title">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                </svg>
                Información de Contacto
            </h3>
            <ul class="info-list">
                <li>
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/>
                    </svg>
                    Dirección: Av. Central 123, Lima, Perú
                </li>
                <li>
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                    </svg>
                    Teléfono: +51 987 654 321
                </li>
                <li>
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14h-4v-2h4v2zm0-4h-4V9h4v4z"/>
                    </svg>
                    Horario: Lun-Vie 9:00 - 18:00
                </li>
            </ul>
            <p style="margin-top: 1rem; font-size: 0.9rem; color: #555; font-family: 'Inter', sans-serif;">
                También puedes enviarnos un mensaje por WhatsApp o escribirnos en nuestras redes sociales.
            </p>
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
</div>

<script>
    // Validación y envío del formulario
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const alert = document.getElementById('formAlert');
        alert.className = 'alert-custom';

        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const reason = document.getElementById('reason').value;
        const message = document.getElementById('message').value.trim();

        if (!name || !email || !reason || !message) {
            alert.classList.add('alert-error-custom');
            alert.textContent = 'Por favor completa todos los campos.';
            return;
        }

        // Simular envío
        alert.classList.add('alert-success-custom');
        alert.textContent = '¡Mensaje enviado! Gracias — pronto nos comunicaremos contigo.';
        this.reset();

        // Opcional: Enviar con AJAX a tu ruta
        // fetch('/contacto', { method: 'POST', body: new FormData(this) })
    });

    // Menu mobile
    document.querySelector('.menu-toggle')?.addEventListener('click', () => {
        document.querySelector('.nav')?.classList.toggle('active');
    });
</script>

</body>
</html>