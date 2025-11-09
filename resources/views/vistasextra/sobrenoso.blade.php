<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros - Aridetalles</title>

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
            background-color: #F9F5EC;
            color: #38122A;
            line-height: 1.6;
            font-weight: 400;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .container {
            max-width: 1100px;
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

        /* ===== ABOUT CARD ===== */
        .about-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
            padding: 2.5rem;
            margin-top: 1.5rem;
            animation: fadeIn 0.6s ease;
            transition: transform 0.3s ease;
        }

        .about-card:hover {
            transform: translateY(-4px);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .about-header {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            margin-bottom: 1.8rem;
            flex-wrap: wrap;
        }

        .about-logo {
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, #fde68a, #fb7185);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(251, 113, 133, 0.3);
        }

        .about-logo svg {
            width: 50px;
            height: 50px;
            fill: white;
        }

        .about-title {
            font-size: 2rem;
            color: #38122A;
            font-weight: 700;
            margin: 0;
        }

        .about-lead {
            font-size: 1.05rem;
            color: #555;
            margin: 0.8rem 0;
            font-family: 'Inter', sans-serif;
        }

        .about-text {
            color: #777;
            font-size: 0.95rem;
            font-family: 'Inter', sans-serif;
            line-height: 1.7;
        }

        .divider {
            height: 1px;
            background: #eee;
            margin: 2rem 0;
            border: none;
        }

        /* ===== GRID DE VALORES ===== */
        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 1.8rem;
            margin-top: 1.5rem;
        }

        .value-card {
            background: #fdf9fb;
            border-radius: 16px;
            padding: 1.5rem;
            border: 1.5px solid #ffe4ec;
            transition: all 0.3s ease;
        }

        .value-card:hover {
            background: white;
            border-color: #FF69B4;
            transform: translateY(-3px);
            box-shadow: 0 6px 18px rgba(255, 105, 180, 0.1);
        }

        .value-title {
            font-size: 1.2rem;
            color: #38122A;
            font-weight: 700;
            margin-bottom: 0.6rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-family: 'Inria Serif', serif;
        }

        .value-title svg {
            width: 24px;
            height: 24px;
            fill: #FF69B4;
        }

        .value-text {
            color: #666;
            font-size: 0.92rem;
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
        }

        /* ===== MAPA ===== */
        .map-container {
            margin: 3rem 0;
            text-align: center;
        }

        .map-container iframe {
            width: 100%;
            max-width: 900px;
            height: 420px;
            border: 2px solid #ffe4ec;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06);
            display: block;
            margin: 0 auto;
        }

        /* ===== FOOTER ===== */
        footer {
            text-align: center;
            padding: 2.5rem 0;
            color: #777;
            font-size: 0.9rem;
            margin-top: 4rem;
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
            .about-header {
                flex-direction: column;
                text-align: center;
            }

            .about-logo {
                width: 80px;
                height: 80px;
            }

            .about-logo svg {
                width: 44px;
                height: 44px;
            }

            .values-grid {
                grid-template-columns: 1fr;
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

<!-- HEADER -->
<header class="header">
    <div class="nav-container">
        <div class="logo">
            <svg class="flower-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" />
            </svg>
            <span>ARIDETALLES</span>
        </div>
        <button class="menu-toggle">Menú</button>
    </div>
</header>

<!-- CONTENIDO -->
<div class="container">
    <div class="about-card">
        <div class="about-header">
            <div class="about-logo">
                <svg viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/>
                </svg>
            </div>
            <div>
                <h1 class="about-title">Sobre Nosotros</h1>
                <p class="about-lead">
                    Somos una florería apasionada por crear arreglos únicos que transmiten emociones, amor y frescura en cada detalle.
                </p>
                <p class="about-text">
                    Con más de 5 años de experiencia, seleccionamos las flores más frescas y trabajamos con dedicación para que cada ramo sea una obra de arte.
                </p>
            </div>
        </div>

        <div class="divider"></div>

        <div class="values-grid">
            <div class="value-card">
                <h3 class="value-title">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                    Nuestra Visión
                </h3>
                <p class="value-text">
                    Ser la florería preferida en Lima por nuestra calidad, creatividad y atención personalizada.
                </p>
            </div>

            <div class="value-card">
                <h3 class="value-title">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                    </svg>
                    Nuestros Valores
                </h3>
                <p class="value-text">
                    Calidad, frescura, puntualidad, creatividad y amor por lo que hacemos.
                </p>
            </div>

            <div class="value-card">
                <h3 class="value-title">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 17h-2v-2h2v2zm1.3-6.3l-.8-.8C13.1 11.4 13 11.1 13 10.8V8h-2v3.2l1 1 .8.8c.2.2.2.5 0 .7l-1.4 1.4c-.2.2-.5.2-.7 0l-.8-.8c-.2-.2-.2-.5 0-.7l.8-.8c.2-.2.5-.2.7 0l1.4 1.4c.2.2.2.5 0 .7z"/>
                    </svg>
                    Cómo Trabajamos
                </h3>
                <p class="value-text">
                    Con pedidos personalizados, entregas a domicilio y atención inmediata por WhatsApp.
                </p>
            </div>
        </div>
    </div>

    <!-- MAPA -->
    <div class="map-container">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.42243817919737!2d-78.52107202395996!3d-7.153838090714266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91b25a57fd1c8a11%3A0x82686cd346b8aa0b!2sFloreria%20Alessa!5e0!3m2!1ses-419!2spe!4v1760476481888!5m2!1ses-419!2spe" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
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