<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Aridetalles - Florería Natural</title>
  @vite(['resources/css/welcome.css', 'resources/js/app.js'])
  <!-- Fuentes: Inria Serif (principal) + Inter (secundaria) -->
  <link
    href="https://fonts.googleapis.com/css2?family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap"
    rel="stylesheet">
</head>

<body>

  <!-- HEADER -->
  <header class="header">
    <div class="container nav-container">
      <div class="logo">
      </div>
      @auth
        @if (Auth::user()->role === 'admin')
          {{-- Navbar ADMIN --}}
          @include('forms', ['Modo' => 'Encabezado'])

        @elseif (Auth::user()->role === 'cliente')
          {{-- Navbar CLIENTE --}}
          @include('forms', ['Modo' => 'Encabezado'])
        @endif
      @else
        {{-- Navbar PÚBLICO (sin login) --}}
        @include('forms', ['Modo' => 'Encabezado'])
      @endauth

      <button class="menu-toggle">Menú</button>
    </div>
  </header>

  <!-- HERO -->
  <section class="hero">
    <div class="container hero-content">
      <div class="hero-full"> <img src="{{ asset('imgs/fondo.jpg') }}" alt="Mujer con ramo" class="hero-bg">
        <div class="hero-overlay">
          <div class="hero-logo-center"> <svg class="flower-big" viewBox="0 0 24 24" fill="none" stroke="#38122A"
              stroke-width="1.5">
              <img src="{{ asset('/imgs/logo-Photoroom.png') }}" alt="Logo">
            </svg>
            <h1 class="hero-title">ARIDETALLES</h1>
          </div>
        </div>
      </div>
      <div class="hero-left">
        <!-- CARRUSEL DE PRODUCTOS -->
        <div class="carousel">
          <button class="carousel-btn prev">🢠</button>
          <div class="carousel-track-container">
            <div class="carousel-track">
              <div class="product">
                <img src="{{ asset('imgs/ramo rosas.jpg') }}">
                <div class="price">$/. 180.00</div>
              </div>
              <div class="product">
                <img src="{{ asset('imgs/ramorosasrojas.jpg') }}">
                <div class="price">$/. 80.00</div>
              </div>
              <div class="product">
                <img src="{{ asset('imgs/ramosentado.jpg') }}">
                <div class="price">$/. 65.00</div>
              </div>
            </div>
          </div>
          <button class="carousel-btn next">➭</button>
          <div class="carousel-dots">
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
          </div>
        </div>

        <!-- FORMULARIO PERSONALIZACIÓN -->
        <div class="custom-form">
          <h3>Arreglos Personalizados</h3>
          <p>Si buscas algo único, completa el formulario de personalización y nuestro equipo creará un arreglo según tu
            estilo.</p>
          <form>
            <input type="text" placeholder="Nombre" required />
            <input type="tel" placeholder="Teléfono" required />
            <input type="text" placeholder="Ocasión (cumpleaños, boda, etc)" required />
            <textarea placeholder="Descripción..." rows="3" required></textarea>
            <a class="btn" href="#">Solicitar Cotización</a>
          </form>
        </div>
      </div>

      <!-- IMAGEN HERO + PROMOCIÓN -->
      <div class="hero-right">
        {{-- <img src="{{ asset('imgs/floreria.jpg') }}" alt="Mujer con ramo" class="hero-image"> --}}
        <div class="promo-banner">
          <div class="promo-title">PROMOS DE <span>Flores</span> <span class="arrow">Up Arrow</span></div>
          <div class="promo-card">
            <img src="{{ asset('imgs/promo.jpg') }}" alt="Ramo con descuento">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="container footer-grid">

      <div class="footer-left">
        <div class="footer-brand">
          <svg class="flower-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <img src="{{ asset('/imgs/logo-Photoroom.png') }}" width="50px" height="50px" alt="Logo">
          </svg>
          <span class="brand">ARIDETALLES</span>
        </div>

        <div class="footer-info">
          <h4>INFORMACIÓN</h4>
          <p>Aridetalles nace de la pasión por la belleza natural. Elegimos flores frescas diariamente y cuidamos cada
            detalle para que tus regalos transmitan emociones memorables.</p>
        </div>
      </div>

      <div class="footer-map">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.42243817919737!2d-78.52107202395996!3d-7.153838090714266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91b25a57fd1c8a11%3A0x82686cd346b8aa0b!2sFloreria%20Alessa!5e0!3m2!1ses-419!2spe!4v1760476481888!5m2!1ses-419!2spe"
          width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>

    </div>
  </footer>


  <script>
    // Menu mobile
    document.querySelector('.menu-toggle').addEventListener('click', () => {
      document.querySelector('.nav').classList.toggle('active');
    });

    // Carrusel
    const track = document.querySelector('.carousel-track');
    const slides = document.querySelectorAll('.product');
    const dots = document.querySelectorAll('.dot');
    const prevBtn = document.querySelector('.prev');
    const nextBtn = document.querySelector('.next');
    let index = 0;

    function updateCarousel() {
      track.style.transform = `translateX(-${index * 33.333}%)`;
      dots.forEach((dot, i) => dot.classList.toggle('active', i === index));
    }

    nextBtn.addEventListener('click', () => {
      index = (index + 1) % slides.length;
      updateCarousel();
    });

    prevBtn.addEventListener('click', () => {
      index = (index - 1 + slides.length) % slides.length;
      updateCarousel();
    });

    dots.forEach((dot, i) => {
      dot.addEventListener('click', () => {
        index = i;
        updateCarousel();
      });
    });

    // Cantidad
    document.querySelectorAll('.quantity button').forEach(btn => {
      btn.addEventListener('click', (e) => {
        const span = e.target.parentElement.querySelector('span');
        let qty = parseInt(span.textContent);
        if (e.target.textContent === '+') qty++;
        else if (qty > 1) qty--;
        span.textContent = qty;
      });
    });
  </script>
</body>

</html>