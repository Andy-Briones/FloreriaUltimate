<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Florería Alessa</title>

    {{-- Encabezado general --}}
    {{--  @include('forms', ['Modo' => 'Encabezado'])  --}}

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

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      /* ===== RESET GENERAL ===== */
      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
      }

      /* ===== BODY ===== */
      body {
        background-color: #ba72c3ff;
        color: #333;
        overflow-x: hidden;
      }

      /* ===== TÍTULO PRINCIPAL ===== */
      h3 {
        text-align: center;
        font-size: 2.2rem;
        color: #c94f7c;
        margin: 1.5rem 0;
        letter-spacing: 2px;
        text-shadow: 1px 1px 2px rgba(201, 79, 124, 0.2);
        font-weight: 700;
      }

      /* ===== CARRUSEL ===== */
      .carousel {
        width: 90%;
        max-width: 1100px;
        margin: 0 auto 3rem auto;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
      }

      /* Imagen del carrusel */
      .carousel-item img {
        height: 500px;
        object-fit: cover;
        filter: brightness(85%);
      }

      /* ===== CAPTIONS ===== */
      .carousel-caption {
        background: rgba(0, 0, 0, 0.45);
        border-radius: 15px;
        padding: 1.2rem 2rem;
        backdrop-filter: blur(5px);
      }

      .carousel-caption h5 {
        font-size: 1.8rem;
        font-weight: 600;
        color: #fff;
      }

      .carousel-caption p {
        font-size: 1rem;
        color: #f0e6e6;
      }

      /* ===== BOTONES DEL CARRUSEL ===== */
      .carousel-control-prev-icon,
      .carousel-control-next-icon {
        filter: invert(1) drop-shadow(0 0 4px #fff);
      }

      /* ===== RESPONSIVE ===== */
      @media (max-width: 768px) {
        h3 {
          font-size: 1.7rem;
        }

        .carousel-item img {
          height: 350px;
        }

        .carousel-caption h5 {
          font-size: 1.4rem;
        }

        .carousel-caption p {
          font-size: 0.9rem;
        }
      }
    </style>
</head>

<body>
    <div><h3>🌸 .AriDetalles. 🌸</h3></div>

    {{-- Carrusel de imágenes --}}
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>

      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{ asset('imgs/floreria.jpg') }}" class="d-block w-100" alt="Flores Alessa">
          <div class="carousel-caption d-none d-md-block">
            <h5>Ramos de Amor</h5>
            <p>Flores frescas para cada momento especial 💐</p>
          </div>
        </div>

        <div class="carousel-item">
          <img src="{{ asset('imgs/flor2.png') }}" class="d-block w-100" alt="Decoraciones Alessa">
          <div class="carousel-caption d-none d-md-block">
            <h5>Decoraciones Elegantes</h5>
            <p>Hacemos tus eventos inolvidables 🌸</p>
          </div>
        </div>

        <div class="carousel-item">
          <img src="{{ asset('imgs/flor3.png') }}" class="d-block w-100" alt="Ramos Alessa">
          <div class="carousel-caption d-none d-md-block">
            <h5>Diseños Personalizados</h5>
            <p>El detalle perfecto para cada ocasión 💕</p>
          </div>
        </div>
      </div>

      {{-- Controles de navegación --}}
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
      </button>

      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
      </button>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


