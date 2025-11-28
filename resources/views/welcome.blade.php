<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Aridetalles - Florería Natural</title>
  <!-- Fuentes: Inria Serif (principal) + Inter (secundaria) -->
  <link
    href="https://fonts.googleapis.com/css2?family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap"
    rel="stylesheet">
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
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 1rem;
    }

    /* ===== TIPOGRAFÍA ===== */
    h1,
    h3,
    .brand,
    .promo-title,
    .price,
    .promo-text {
      font-family: 'Inria Serif', serif;
      font-weight: 700;
    }

    h1 {
      font-size: 3.2rem;
    }

    h3 {
      font-size: 1.6rem;
      margin-bottom: 0.5rem;
    }

    .price {
      font-size: 1.1rem;
    }

    .promo-text {
      font-size: 0.95rem;
    }

    /* Inputs y botones pequeños usan Inter */
    input,
    textarea,
    button,
    .quantity span {
      font-family: 'Inter', sans-serif;
    }

    /* ===== HEADER ===== */
    .header {
      background: #38122A;
      color: white;
      padding: 1rem 0;
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .nav-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-size: 1.4rem;
    }

    .flower-icon {
      width: 24px;
      height: 24px;
    }

    .nav {
      display: flex;
      gap: 2rem;
    }

    .nav a {
      color: white;
      text-decoration: none;
      font-weight: 500;
      font-size: 0.95rem;
    }

    .nav a:hover {
      color: #FF69B4;
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

    /* ===== HERO ===== */
    .hero {
      padding: 2rem 0;
      background: #38122A;
    }

    .hero-content {
      display: grid;
      grid-template-columns: 1fr 1fr;
      grid-template-rows: auto auto;
      gap: 3rem;
      background: #F9F5EC;
      border-radius: 20px;
      align-items: start;
    }

    /* FULL: arriba, ocupa todo el ancho */
    .hero-full {
      grid-column: 1 / -1;
      position: relative;
      width: 100%;
      height: 40vh;
      overflow: hidden;
      border-radius: 20px;
    }

    .hero-bg {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: 1;
    }

    .hero-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: linear-gradient(to right, rgba(56, 18, 42, 0.6) 35%, rgba(56, 18, 42, 0.2) 100%);
      display: flex;
      align-items: center;
      z-index: 2;
    }

    .hero-logo-center {
      margin-left: 80px;
      color: #fff;
      display: flex;
      flex-direction: column;
      align-items: flex-start;
    }

    .hero-logo-center .flower-big {
      width: 80px;
      height: 80px;
      margin-bottom: 15px;
      stroke: #fff;
    }

    .hero-title {
      font-size: 3.8rem;
      font-weight: 700;
      letter-spacing: 3px;
      color: #ffffffff;
      text-shadow: 0 4px 12px rgba(0, 0, 0, 0.6);
    }

    /* LEFT y RIGHT: debajo, en columnas */
    .hero-left {
      grid-column: 1;
      display: flex;
      flex-direction: column;
      gap: 2rem;
    }

    .hero-right {
      grid-column: 2;
    }

    /* ===== CARRUSEL PRODUCTOS ===== */
    .carousel {
      position: relative;
      overflow: hidden;
      border-radius: 20px;
    }

    .carousel-track-container {
      overflow: hidden;
    }

    .carousel-track {
      display: flex;
      transition: transform 0.5s ease;
    }

    .product {
      min-width: 33.333%;
      padding: 0 0.5rem;
      text-align: center;
    }

    .product img {
      width: 100%;
      height: 180px;
      object-fit: cover;
      border-radius: 15px;
    }

    .price {
      margin: 0.8rem 0 0.5rem;
      font-weight: 700;
      color: #38122A;
    }

    .quantity {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 0.5rem;
      font-size: 0.9rem;
    }

    .quantity button {
      width: 24px;
      height: 24px;
      border: 1px solid #38122A;
      background: white;
      color: #38122A;
      border-radius: 50%;
      font-weight: bold;
      cursor: pointer;
    }

    .carousel-btn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background: rgba(56, 18, 42, 0.7);
      color: white;
      border: none;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      font-size: 1.2rem;
      cursor: pointer;
      z-index: 10;
    }

    .prev {
      left: 10px;
    }

    .next {
      right: 10px;
    }

    .carousel-dots {
      display: flex;
      justify-content: center;
      gap: 0.5rem;
      margin-top: 1rem;
    }

    .dot {
      width: 10px;
      height: 10px;
      background: #ccc;
      border-radius: 50%;
      cursor: pointer;
    }

    .dot.active {
      background: #38122A;
    }

    /* ===== FORMULARIO ===== */
    .custom-form {
      background: white;
      padding: 1.5rem;
      border-radius: 20px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .custom-form p {
      font-size: 0.9rem;
      margin-bottom: 1rem;
      color: #555;
      font-family: 'Inria Serif', serif;
    }

    .custom-form input,
    .custom-form textarea {
      width: 100%;
      padding: 0.8rem;
      margin-bottom: 0.8rem;
      border: 1px solid #ddd;
      border-radius: 10px;
      font-family: 'Inter', sans-serif;
      font-size: 0.9rem;
    }

    .custom-form button {
      background: #38122A;
      color: white;
      border: none;
      padding: 0.8rem 1.5rem;
      border-radius: 25px;
      font-weight: 600;
      cursor: pointer;
      float: right;
      font-family: 'Inter', sans-serif;
    }

    .custom-form button:hover {
      background: #2a0d1e;
    }

    /* ===== PROMO ===== */
    .promo-banner {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      margin: 40px auto;
      width: fit-content;
    }

    .promo-title {
      font-size: 1.8rem;
      font-weight: bold;
      margin-bottom: 20px;
      color: #333;
      letter-spacing: 1px;
    }

    .promo-title span {
      color: #c02454ff;
    }

    .promo-title .arrow {
      font-size: 1rem;
      margin-left: 8px;
      color: #cc2454ff;
    }

    .promo-card img {
      width: 300px;
      height: auto;
      border-radius: 10px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
      transition: transform 0.3s ease;
    }

    .promo-card img:hover {
      transform: scale(1.05);
    }

    /* ===== FOOTER ===== */
    .footer {
      background-color: #38122A;
      color: #F9F5EC;
    }

    .footer-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 40px;
      align-items: flex-start;
    }

    .footer-left {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .footer-brand {
      display: flex;
      align-items: center;
    }

    .footer-brand .flower-icon {
      width: 28px;
      height: 28px;
      color: #ffb6c1;
      margin-right: 10px;
    }

    .footer-brand .brand {
      font-size: 1.3rem;
      font-weight: bold;
      letter-spacing: 1px;
    }

    .footer-info h4 {
      font-size: 1.1rem;
      margin-bottom: 8px;
      color: #ffb6c1;
    }

    .footer-info p {
      line-height: 1.6;
      color: #dcdcdc;
      text-align: justify;
    }

    .footer-map iframe {
      width: 100%;
      height: 200px;
      border-radius: 8px;
      border: none;
      box-shadow: 0 0 30px rgba(238, 228, 230, 0.2);
      margin-bottom: 20px;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
      .hero-content {
        grid-template-columns: 1fr;
        grid-template-rows: auto auto auto;
      }

      .hero-full,
      .hero-left,
      .hero-right {
        grid-column: 1 / -1;
      }

      .hero-full {
        height: 70vh;
      }

      .promo-title {
        font-size: 1.4rem;
      }

      .promo-card img {
        width: 80%;
      }

      .footer-grid {
        grid-template-columns: 1fr;
        text-align: center;
      }

      .footer-left {
        align-items: center;
      }

      .footer-info p {
        text-align: center;
      }

      .footer-map iframe {
        height: 220px;
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
          @include('forms', ['Modo' => 'EncabezadoClie'])
        @endif
      @else
        {{-- Navbar PÚBLICO (sin login) --}}
        @include('forms', ['Modo' => 'EncabezadoClie'])
      @endauth
    </div>
  </header>

  <!-- HERO -->
  <section class="hero">
    <div class="container hero-content">
      <div class="hero-full"> <img src="{{ asset('imgs/fondo.jpg') }}" alt="Mujer con ramo" class="hero-bg">
        <div class="hero-overlay">
          <div class="hero-logo-center"> <svg class="flower-big" viewBox="0 0 24 24" fill="none" stroke="#38122A"
              stroke-width="1.5">
              <img src="{{ asset('/imgs/logo-Photoroom.png') }}" alt="Logo" width="200px" height="100px">
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
                <img src="{{ asset('imgs/ramo rosas.jpg') }}" alt="Ramo 1">
                <div class="price">$/. 180.00</div>
              </div>
              <div class="product">
                <img src="{{ asset('imgs/ramorosasrojas.jpg') }}" alt="producto">
                <div class="price">$/. 80.00</div>
              </div>
              <div class="product">
                <img src="{{ asset('imgs/ramosentado.jpg') }}" alt="flores">
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
          <form id="form-personalizado" action="https://formspree.io/f/mblvynjy" method="POST" enctype="multipart/form-data">
            <label>
              Ingresa correo:
              <input type="email" name="email" placeholder="ejemplo@gmail.com">
            </label>
            <label>
              Ingresa Télefono:
              <input type="number" name="telefono" placeholder="123456789"/>
            </label>
            <label>
              Ingresa la Ocasión:
              <textarea name="ocacion"></textarea>
            </label>
            <label>
              Ingresa el mensaje:
              <textarea name="message"></textarea>
            </label>
            <button type="submit">Enviar</button>
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
  <a href="https://wa.me/51999369837?text=Hola%2C%20quisiera%20hacer%20un%20pedido%20AriDetalles" class="wsp-float" target="_blank" title="Contáctanos por WhatsApp">
    <img src="https://img.icons8.com/ios-filled/50/ffffff/whatsapp.png" alt="WhatsApp" width="30" height="30">
  </a>

  @include('forms', ['Modo' => 'Accesibilidad'])

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
  <script>
document.getElementById("form-personalizado").addEventListener("submit", async function(e) {
    e.preventDefault(); // Evita el envío normal

    const form = e.target;

    // Enviar datos a Formspree
    const res = await fetch(form.action, {
        method: "POST",
        body: new FormData(form),
        headers: { "Accept": "application/json" }
    });

    if (res.ok) {
        form.reset(); // 💥 LIMPIA TODOS LOS CAMPOS

        // Mostrar mensaje de éxito
        document.getElementById("success-msg").style.display = "block";

        // Ocultar mensaje después de 3s
        setTimeout(() => {
            document.getElementById("success-msg").style.display = "none";
        }, 3000);
    }
});
</script>
</body>

</html>