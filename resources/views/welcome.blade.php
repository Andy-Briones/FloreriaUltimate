<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Florería</title>
    @include('forms', ['Modo' => 'Encabezado'])
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
  background-color: #fff8f7;
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

/* ===== BOTONES DE NAVEGACIÓN ===== */
a.btn {
  display: inline-block;
  background: linear-gradient(135deg, #ff7aa8, #c94f7c);
  color: white;
  padding: 12px 25px;
  border-radius: 30px;
  text-decoration: none;
  margin: 0.5rem;
  font-weight: 500;
  transition: all 0.3s ease;
  box-shadow: 0 4px 10px rgba(201, 79, 124, 0.3);
}

a.btn:hover {
  background: linear-gradient(135deg, #c94f7c, #a62c5f);
  transform: translateY(-3px);
}

/* ===== CONTENEDORES DE BOTONES ===== */
div > .btn {
  text-align: center;
  display: block;
}

div a.btn:first-child {
  margin-left: auto;
  margin-right: auto;
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

  a.btn {
    font-size: 0.9rem;
    padding: 10px 20px;
  }
}

    </style>
</head>
<body>
    <div><h3>FLORERÍA ALESA</h3></div>
    
    

    <div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      {{--  <img src="{{ asset('imgs/logo.png') }}" class="d-block w-100" width="150px" height="150px">  --}}
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Some representative placeholder content for the first slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="..." class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    {{--  <div>
        <a href="{{ url('/sells')}}" class="btn">Ventas</a>
        <a href="{{ url('/clients/create')}}" class="btn">Clientes</a>
    </div>

    <div>
        <a href="{{ url('/product_categories/create')}}" class="btn">Categoria</a>
        <a href="{{ url('/suppliers/create')}}" class="btn">Proveedores</a>
        <a href="{{ url('/orders/create')}}" class="btn">Pedidos</a>
    </div>  --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>