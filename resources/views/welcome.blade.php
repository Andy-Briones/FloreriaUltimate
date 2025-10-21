<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Florería</title>
    {{--  @include('forms', ['Modo' => 'Encabezado'])  --}}
</head>
<body>
    <div><h3>FLORERÍA ALESSA</h3></div>
    
    

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
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Body */
body {
    background-color: #fff8f0; /* color suave tipo florería */
    color: #333;
}

/* Encabezado */
div > h3 {
    text-align: center;
    font-size: 2.5rem;
    font-weight: bold;
    color: #d6336c; /* color floral */
    margin: 20px 0;
    text-transform: uppercase;
}

/* Carousel */
.carousel-inner {
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
    max-width: 800px;
    margin: 20px auto;
}

.carousel-item img {
    object-fit: cover;
    height: 400px; /* tamaño fijo para carrusel */
}

/* Captions */
.carousel-caption h5 {
    font-size: 1.5rem;
    font-weight: 600;
    color: #fff;
    text-shadow: 2px 2px 5px rgba(0,0,0,0.5);
}

.carousel-caption p {
    font-size: 1rem;
    color: #f8f9fa;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
}

/* Botones de navegación del carousel */
.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: rgba(214, 51, 108, 0.7);
    border-radius: 50%;
    padding: 10px;
}

/* Botones (si los activas) */
.btn {
    display: inline-block;
    margin: 10px;
    padding: 12px 25px;
    background-color: #d6336c;
    color: #fff;
    text-decoration: none;
    border-radius: 8px;
    transition: all 0.3s ease;
    font-weight: 600;
}

.btn:hover {
    background-color: #a12d55;
    transform: translateY(-2px);
}
    </style>
</body>
</html>