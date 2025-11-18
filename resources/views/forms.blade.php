{{-- Categoria --}}
@if($Modo == 'crearPRC' || $Modo == 'editarPRC')
<div class="card shadow mb-4 border-0">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">{{ $Modo == 'crearPRC' ? '➕ Agregar Categoria' : '✏️ Modificar Categoria' }}</h4>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label for="name" class="form-label">📌 Nombre de la Categoria</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ isset($categoria->name) ? $categoria->name : '' }}">
            </div>
            <div class="col-md-6">
                <label for="description" class="form-label">📝 Descripción</label>
                <input type="text" name="description" id="description" class="form-control"
                    value="{{ isset($categoria->description) ? $categoria->description : '' }}">
            </div>
        </div>
    </div>
</div>
@endif

{{-- Insumo --}}
@if($Modo == 'crearI' || $Modo == 'editarI')
<div class="card shadow mb-4 border-0">
    <div class="card-header bg-success text-white">
        <h4 class="mb-0">{{ $Modo == 'crearI' ? '🛒 Agregar Insumo' : '✏️ Modificar Insumo' }}</h4>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label for="nombre" class="form-label">📦 Nombre del Insumo</label>
                <input type="text" name="nombre" id="nombre" class="form-control"
                    value="{{ isset($insumo->nombre) ? $insumo->nombre : '' }}">
            </div>
            <div class="col-md-6">
                <label for="descripcion" class="form-label">📝 Descripción</label>
                <input type="text" name="descripcion" id="descripcion" class="form-control"
                    value="{{ isset($insumo->descripcion) ? $insumo->descripcion : '' }}">
            </div>
            <div class="col-md-6">
                <label for="tipo" class="form-label">Tipo </label>
                <input type="text" name="tipo" id="tipo" class="form-control"
                    value="{{ isset($insumo->tipo) ? $insumo->tipo : '' }}">
            </div>
            <div class="col-md-6">
                <label for="costo_unitario" class="form-label">💲 Precio Unitario</label>
                <input type="number" step="0.01" name="costo_unitario" id="costo_unitario" class="form-control"
                    value="{{ isset($insumo->costo_unitario) ? $insumo->costo_unitario : '' }}">
            </div>
            <div class="col-md-6">
                <label for="stock" class="form-label">📊 Stock</label>
                <input type="number" name="stock" id="stock" class="form-control"
                    value="{{ isset($insumo->stock) ? $insumo->stock : '' }}">
            </div>
            <div class="col-md-6">
            <label for="unidad" class="form-label">📝 Unidad</label>
                <input type="text" name="unidad" id="unidad" class="form-control"
                    value="{{ isset($insumo->unidad) ? $insumo->unidad : '' }}">
            </div>
            <div class="col-md-6">
            <label for="estado" class="form-label">📝 Estado</label>
                <input type="text" name="estado" id="estado" class="form-control"
                    value="{{ isset($insumo->estado) ? $insumo->estado : '' }}">
            </div>
            <div class="col-md-6">
                <label for="als_category_id" class="form-label">📂 Categoria</label>
                <select name="als_category_id" id="als_category_id" class="form-select">
                    @foreach($categorys as $category)
                        <option value="{{ $category->id }}" {{ isset($insumo->als_category_id) && $insumo->als_category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="als_supplier_id" class="form-label">🚚 Proveedor</label>
                <select name="als_supplier_id" id="als_supplier_id" class="form-select">
                    @foreach($suppliers as $supplier) suppliers supplier
                        <option value="{{ $supplier->id }}" {{ isset($insumo->als_supplier_id) && $insumo->als_supplier_id == $supplier->id ? 'selected' : '' }}>
                            {{ $supplier->name }}
                        </option>
                    @endforeach
                </select>
            </div> 
        </div>
    </div>
</div>
@endif

{{-- Proveedor --}}
@if($Modo == 'crearSP' || $Modo == 'editarSP')
<div class="card shadow mb-4 border-0">
    <div class="card-header bg-warning text-dark">
        <h4 class="mb-0">{{ $Modo == 'crearSP' ? '➕ Agregar Proveedor' : '✏️ Modificar Proveedor' }}</h4>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label for="name" class="form-label">👤 Nombre del Proveedor</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ isset($supplier->name) ? $supplier->name : '' }}">
            </div>
            <div class="col-md-6">
                <label for="contact_email" class="form-label">🏢 Correo de contacto</label>
                <input type="text" name="contact_email" id="contact_email" class="form-control"
                    value="{{ isset($supplier->contact_email) ? $supplier->contact_email : '' }}">
            </div>
            <div class="col-md-6">
                <label for="phone_number" class="form-label">🏢 Telefono</label>
                <input type="text" name="phone_number" id="phone_number" class="form-control"
                    value="{{ isset($supplier->phone_number) ? $supplier->phone_number : '' }}">
            </div>
            <div class="col-md-6">
                <label for="address" class="form-label">📍 Dirección</label>
                <input type="text" name="address" id="address" class="form-control"
                    value="{{ isset($supplier->address) ? $supplier->address : '' }}">
            </div>
        </div>
    </div>
</div>
@endif

{{-- Ventas --}}
@if($Modo == 'crearV' || $Modo == 'editarV')
<div class="card shadow mb-4 border-0">
    <div class="card-header bg-danger text-white">
        <h4 class="mb-0">{{ $Modo == 'crearV' ? '💵 Agregar Venta' : '✏️ Modificar Venta' }}</h4>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label for="cantidad" class="form-label">🔢 Cantidad</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control"
                    value="{{ isset($venta->cantidad) ? $venta->cantidad : '' }}">
            </div>

            <div class="col-md-6">
                <label for="fecha_venta" class="form-label">📅 Fecha de Venta</label>
                <input type="date" name="fecha_venta" id="fecha_venta" class="form-control"
                    value="{{ isset($venta->fecha_venta) ? $venta->fecha_venta : '' }}">
            </div>

            <div class="col-md-6">
                <label for="total" class="form-label">💲 Total</label>
                <input type="number" step="0.01" name="total" id="total" class="form-control"
                    value="{{ isset($venta->total) ? $venta->total : '' }}" readonly>
            </div>

            <div class="col-md-6">
                <label for="product_id" class="form-label">📦 Producto</label>
                <select name="product_id" id="product_id" class="form-select">
                    @foreach($produc as $producto)
                        <option value="{{ $producto->id }}" 
                            data-price="{{ $producto->price }}"
                            {{ isset($venta->product_id) && $venta->product_id == $producto->id ? 'selected' : '' }}>
                            {{ $producto->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>

{{-- Script para calcular total --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const selectProduct = document.getElementById("product_id");
        const cantidadInput = document.getElementById("cantidad");
        const totalInput = document.getElementById("total");

        function calcularTotal() {
            let selectedOption = selectProduct.options[selectProduct.selectedIndex];
            let price = parseFloat(selectedOption.getAttribute("data-price")) || 0;
            let cantidad = parseInt(cantidadInput.value) || 0;
            let total = price * cantidad;
            totalInput.value = total.toFixed(2);
        }

        // Cuando cambie producto o cantidad recalcular
        selectProduct.addEventListener("change", calcularTotal);
        cantidadInput.addEventListener("input", calcularTotal);

        // Calcular al cargar si ya hay datos
        calcularTotal();
    });
</script>
@endif


{{-- Cliente --}}
@if($Modo == 'crearCli' || $Modo == 'editarCli')
<div class="card shadow mb-4 border-0">
    <div class="card-header bg-info text-white">
        <h4 class="mb-0">{{ $Modo == 'crearCli' ? '👤 Agregar Cliente' : '✏️ Modificar Cliente' }}</h4>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label for="name" class="form-label">📝 Nombre</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ isset($client->name) ? $client->name : '' }}">
            </div>
            <div class="col-md-6">
                <label for="fSurname" class="form-label">📝 Apellido Paterno</label>
                <input type="text" name="fSurname" id="fSurname" class="form-control"
                    value="{{ isset($client->fSurname) ? $client->fSurname : '' }}">
            </div>
            <div class="col-md-6">
                <label for="sSurname" class="form-label">📝 Apellido Materno</label>
                <input type="text" name="sSurname" id="sSurname" class="form-control"
                    value="{{ isset($client->sSurname) ? $client->sSurname : '' }}">
            </div>
            <div class="col-md-6">
                <label for="dni" class="form-label">🆔 DNI</label>
                <input type="text" name="dni" id="dni" class="form-control"
                    value="{{ isset($client->dni) ? $client->dni : '' }}">
            </div>
            <div class="col-md-6">
                <label for="telefono" class="form-label">📞 Teléfono</label>
                <input type="text" name="telefono" id="telefono" class="form-control"
                    value="{{ isset($client->telefono) ? $client->telefono : '' }}">
            </div>
            <div class="col-md-6">
                <label for="correo" class="form-label">📧 Correo</label>
                <input type="email" name="correo" id="correo" class="form-control"
                    value="{{ isset($client->correo) ? $client->correo : '' }}">
            </div>
            <div class="col-md-6">
                <label for="fecha_nacimiento" class="form-label">🎂 Fecha de Nacimiento</label>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control"
                    value="{{ isset($client->fecha_nacimiento) ? $client->fecha_nacimiento : '' }}"
                    max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
            </div>
            <div class="col-md-6">
                <label for="genero" class="form-label">⚧ Género</label>
                <select name="genero" id="genero" class="form-select">
                    <option value="1" {{ isset($client->genero) && $client->genero == 1 ? 'selected' : '' }}>Masculino</option>
                    <option value="0" {{ isset($client->genero) && $client->genero == 0 ? 'selected' : '' }}>Femenino</option>
                    <option value="2" {{ isset($client->genero) && $client->genero == 2 ? 'selected' : '' }}>Otro</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="direccion" class="form-label">📍 Dirección</label>
                <input type="text" name="direccion" id="direccion" class="form-control"
                    value="{{ isset($client->direccion) ? $client->direccion : '' }}">
            </div>
        </div>
    </div>
</div>
@endif

{{-- Usuario --}}
@if($Modo == 'crearUser' || $Modo == 'editarUser')
<div class="card shadow mb-4 border-0">
    <div class="card-header bg-dark text-white">
        <h4 class="mb-0">{{ $Modo == 'crearUser' ? '👤 Agregar Usuario' : '✏️ Modificar Usuario' }}</h4>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label for="name" class="form-label">📝 Nombre</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ isset($user->name) ? $user->name : '' }}">
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">📧 Correo</label>
                <input type="email" name="email" id="email" class="form-control"
                    value="{{ isset($user->email) ? $user->email : '' }}">
            </div>
            <div class="col-md-6">
                <label for="password" class="form-label">🔑 Contraseña</label>
                <input type="password" name="password" id="password" class="form-control"
                    value="{{ isset($user->password) ? $user->password : '' }}">
            </div>
            <div class="col-md-6">
                <label for="client_id" class="form-label">👥 Cliente</label>
                <select name="client_id" id="client_id" class="form-select">
                    @foreach($cli as $clien)
                        <option value="{{ $clien->id }}" {{ isset($user->clien_id) && $user->clien_id == $clien->id ? 'selected' : '' }}>
                            {{ $clien->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
@endif

{{-- Pedido --}}
@if($Modo == 'crearPedido' || $Modo == 'editarPedido')
<div class="card shadow mb-4 border-0">
    <div class="card-header bg-secondary text-white">
        <h4 class="mb-0">{{ $Modo == 'crearPedido' ? '📦 Agregar Pedido' : '✏️ Modificar Pedido' }}</h4>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label for="user_id" class="form-label">👤 Usuario</label>
                <select name="user_id" id="user_id" class="form-select">
                    @foreach($usuario as $usu)
                        <option value="{{ $usu->id }}" {{ isset($order->usu_id) && $order->usu_id == $usu->id ? 'selected' : '' }}>
                            {{ $usu->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="product_id" class="form-label">📦 Producto</label>
                <select name="product_id" id="product_id" class="form-select">
                    @foreach($productos as $prod)
                        <option value="{{ $prod->id }}" {{ isset($order->prod_id) && $order->prod_id == $prod->id ? 'selected' : '' }}>
                            {{ $prod->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
@endif


{{--  NavbarAdministrador  --}}
@if ($Modo == 'Encabezado')
<nav class="navbar">
  <div class="container-fluid nav-container">

    {{-- LOGO --}}
    <a href="/" class="navbar-brand">
      <svg class="flower-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/>
      </svg>
      ARIDETALLES
    </a>

    {{-- BOTÓN HAMBURGUESA (MÓVIL) --}}
    <button class="navbar-toggler" type="button">
      <span class="toggler-icon"></span>
    </button>

    {{-- MENÚ --}}
    <div class="navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('insumos*') ? 'active' : '' }}" href="{{ url('/insumos') }}">Insumos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('inventario*') ? 'active' : '' }}" href="{{ url('/inventario') }}">Crear Producto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('products*') ? 'active' : '' }}" href="{{ url('/products') }}">Catálogo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('contacto*') ? 'active' : '' }}" href="{{ route('contactanos') }}">Contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('nosotros*') ? 'active' : '' }}" href="{{ url('/nosotros') }}">Sobre Nosotros</a>
        </li>

        @auth
          <li class="nav-item">
            <span class="nav-link user-greeting">Hola, {{ Auth::user()->name }}</span>
          </li>
          <li class="nav-item">
            <a class="nav-link logout-btn" href="{{ route('logout') }}">Cerrar sesión</a>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link login-btn" href="{{ route('login') }}">Iniciar sesión</a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>

<style>
  /* ===== NAVBAR ESTILO FIGMA ===== */
  .navbar {
    background: linear-gradient(135deg, #561c41, #38122A);
    box-shadow: 0 4px 15px rgba(201, 79, 124, 0.25);
    border-bottom: 2px solid #38122A;
    padding: 0.8rem 0;
    position: sticky;
    top: 0;
    z-index: 1000;
    font-family: 'Inria Serif', serif;
  }

  .nav-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  /* LOGO */
  .navbar-brand {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #c94f7c;
    font-size: 1.8rem;
    font-weight: 700;
    text-decoration: none;
    transition: color 0.3s ease;
    margin-right: 100px;
  }

  .navbar-brand:hover {
    color: #a6315b;
  }

  .flower-icon {
    width: 28px;
    height: 28px;
    stroke: #c94f7c;
  }

  /* TOGGLER */
  .navbar-toggler {
    display: none;
    background: none;
    border: none;
    color: white;
    font-size: 1.5rem;
    cursor: pointer;
  }

  .toggler-icon {
    display: block;
    width: 25px;
    height: 3px;
    background: white;
    position: relative;
    border-radius: 2px;
  }

  .toggler-icon::before,
  .toggler-icon::after {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: white;
    border-radius: 2px;
    transition: 0.3s;
  }

  .toggler-icon::before { top: -8px; }
  .toggler-icon::after { bottom: -8px; }

  /* COLLAPSE */
  .navbar-collapse {
    display: flex;
    justify-content: flex-end;
  }

  .navbar-nav {
    display: flex;
    gap: 1.8rem;
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .nav-link {
    color: #F9F5EC;
    text-decoration: none;
    font-weight: 500;
    font-size: 1rem;
    position: relative;
    transition: color 0.3s ease;
  }

  .nav-link::after {
    content: "";
    position: absolute;
    bottom: -6px;
    left: 0;
    width: 0;
    height: 2px;
    background: #c94f7c;
    transition: width 0.3s ease;
  }

  .nav-link:hover::after,
  .nav-link.active::after {
    width: 100%;
  }

  .nav-link:hover,
  .nav-link.active {
    color: #c94f7c;
  }

  /* BOTONES ESPECIALES */
  .logout-btn,
  .login-btn {
    background: #F9F5EC;
    color: #38122A !important;
    padding: 8px 18px !important;
    border-radius: 25px;
    font-weight: 600;
  }

  .logout-btn:hover,
  .login-btn:hover {
    background: #c94f7c;
    color: white !important;
    transform: translateY(-2px);
  }

  .user-greeting {
    color: #c94f7c;
    font-weight: 500;
  }

  /* RESPONSIVE */
  @media (max-width: 992px) {
    .navbar-toggler {
      display: block;
    }

    .navbar-collapse {
      position: fixed;
      top: 70px;
      left: -100%;
      width: 100%;
      height: calc(100vh - 70px);
      background: #38122A;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      padding-top: 2rem;
      transition: left 0.3s ease;
    }

    .navbar-collapse.active {
      left: 0;
    }

    .navbar-nav {
      flex-direction: column;
      gap: 1rem;
      width: 100%;
      text-align: center;
    }

    .nav-link {
      font-size: 1.2rem;
      padding: 0.8rem 0;
    }
  }
</style>

<script>
  // Toggle menú móvil
  document.querySelector('.navbar-toggler').addEventListener('click', () => {
    document.querySelector('.navbar-collapse').classList.toggle('active');
  });
</script>

@endif


{{--  Navbar Cliente  --}}
@if ($Modo == 'EncabezadoClie')
<nav class="navbar">
  <div class="container-fluid nav-container">

    {{-- LOGO --}}
    <a href="/" class="navbar-brand">
      <svg class="flower-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/>
      </svg>
      ARIDETALLES
    </a>

    {{-- BOTÓN HAMBURGUESA (MÓVIL) --}}
    <button class="navbar-toggler" type="button">
      <span class="toggler-icon"></span>
    </button>

    {{-- MENÚ --}}
    <div class="navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('products*') ? 'active' : '' }}" href="{{ url('/products') }}">Catálogo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('contacto*') ? 'active' : '' }}" href="{{ route('contactanos') }}">Contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('nosotros*') ? 'active' : '' }}" href="{{ url('/nosotros') }}">Sobre Nosotros</a>
        </li>

        @auth
          <li class="nav-item">
            <span class="nav-link user-greeting">Hola, {{ Auth::user()->name }}</span>
          </li>
          <li class="nav-item">
            <a class="nav-link logout-btn" href="{{ route('logout') }}">Cerrar sesión</a>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link login-btn" href="{{ route('login') }}">Iniciar sesión</a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
<style>
  /* ===== NAVBAR ESTILO FIGMA ===== */
  .navbar {
    background: linear-gradient(135deg, #561c41, #38122A);
    box-shadow: 0 4px 15px rgba(201, 79, 124, 0.25);
    border-bottom: 2px solid #38122A;
    padding: 0.8rem 0;
    position: sticky;
    top: 0;
    z-index: 1000;
    font-family: 'Inria Serif', serif;
  }

  .nav-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  /* LOGO */
  .navbar-brand {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #c94f7c;
    font-size: 1.8rem;
    font-weight: 700;
    text-decoration: none;
    transition: color 0.3s ease;
    margin-right: 100px;
  }

  .navbar-brand:hover {
    color: #a6315b;
  }

  .flower-icon {
    width: 28px;
    height: 28px;
    stroke: #c94f7c;
  }

  /* TOGGLER */
  .navbar-toggler {
    display: none;
    background: none;
    border: none;
    color: white;
    font-size: 1.5rem;
    cursor: pointer;
  }

  .toggler-icon {
    display: block;
    width: 25px;
    height: 3px;
    background: white;
    position: relative;
    border-radius: 2px;
  }

  .toggler-icon::before,
  .toggler-icon::after {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: white;
    border-radius: 2px;
    transition: 0.3s;
  }

  .toggler-icon::before { top: -8px; }
  .toggler-icon::after { bottom: -8px; }

  /* COLLAPSE */
  .navbar-collapse {
    display: flex;
    justify-content: flex-end;
  }

  .navbar-nav {
    display: flex;
    gap: 1.8rem;
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .nav-link {
    color: #F9F5EC;
    text-decoration: none;
    font-weight: 500;
    font-size: 1rem;
    position: relative;
    transition: color 0.3s ease;
  }

  .nav-link::after {
    content: "";
    position: absolute;
    bottom: -6px;
    left: 0;
    width: 0;
    height: 2px;
    background: #c94f7c;
    transition: width 0.3s ease;
  }

  .nav-link:hover::after,
  .nav-link.active::after {
    width: 100%;
  }

  .nav-link:hover,
  .nav-link.active {
    color: #c94f7c;
  }

  /* BOTONES ESPECIALES */
  .logout-btn,
  .login-btn {
    background: #F9F5EC;
    color: #38122A !important;
    padding: 8px 18px !important;
    border-radius: 25px;
    font-weight: 600;
  }

  .logout-btn:hover,
  .login-btn:hover {
    background: #c94f7c;
    color: white !important;
    transform: translateY(-2px);
  }

  .user-greeting {
    color: #c94f7c;
    font-weight: 500;
  }

  /* RESPONSIVE */
  @media (max-width: 992px) {
    .navbar-toggler {
      display: block;
    }

    .navbar-collapse {
      position: fixed;
      top: 70px;
      left: -100%;
      width: 100%;
      height: calc(100vh - 70px);
      background: #38122A;
      flex-direction: column;
      align-items: center;
      justify-content: flex-start;
      padding-top: 2rem;
      transition: left 0.3s ease;
    }

    .navbar-collapse.active {
      left: 0;
    }

    .navbar-nav {
      flex-direction: column;
      gap: 1rem;
      width: 100%;
      text-align: center;
    }

    .nav-link {
      font-size: 1.2rem;
      padding: 0.8rem 0;
    }
  }
</style>

<script>
  // Toggle menú móvil
  document.querySelector('.navbar-toggler').addEventListener('click', () => {
    document.querySelector('.navbar-collapse').classList.toggle('active');
  });
</script>
@endif

{{-- Inventario + Producto --}}
@if($Modo == 'crearInv' || $Modo == 'editarInv')
<div class="card shadow mb-4 border-0">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">
            {{ $Modo == 'crearInv' ? '🏗️ Crear Producto desde Inventario' : '✏️ Editar Inventario / Producto' }}
        </h4>
    </div>

    <div class="card-body">
        <div class="row g-3">

            {{-- Datos del producto --}}
            <div class="col-md-6">
                <label for="name" class="form-label">🛍️ Nombre del Producto</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ isset($producto->name) ? $producto->name : '' }}" required>
            </div>

            <div class="col-md-6">
                <label for="price" class="form-label">💰 Precio de Venta (S/)</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control"
                    value="{{ isset($producto->price) ? $producto->price : '' }}" required>
            </div>

            <div class="col-md-6">
                <label for="stock" class="form-label">📦 Stock Inicial</label>
                <input type="number" name="stock" id="stock" class="form-control" min="1"
                    value="{{ isset($producto->stock) ? $producto->stock : 1 }}">
            </div>

            <div class="col-md-6">
            <label for="image_path" class="form-label">🖼️ Imagen (opcional)</label>
            <div class="input-group">
                <input type="file" name="image_path" id="image_path" class="form-control" accept="image/*">
            </div>
        </div>

            <div class="col-md-12">
                <label for="description" class="form-label">📝 Descripción</label>
                <textarea name="description" id="description" class="form-control"
                    rows="2">{{ isset($producto->description) ? $producto->description : '' }}</textarea>
            </div>

            {{-- Descripción general del inventario --}}
            <div class="col-md-12">
                <label for="descripcion" class="form-label">📋 Descripción del Inventario</label>
                <textarea name="descripcion" id="descripcion" class="form-control"
                    rows="2">{{ isset($inventario->descripcion) ? $inventario->descripcion : '' }}</textarea>
            </div>
        </div>
    </div>
</div>

{{-- Insumos dinámicos --}}
<div class="card shadow mb-4 border-0">
    <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
        <h4 class="mb-0">🧾 Agregar Insumos al Producto</h4>
        <div class="d-flex align-items-center">
            <input type="text" id="searchInsumo" class="form-control me-2" placeholder="Buscar insumo...">
            <button type="button" class="btn btn-light" id="btnBuscarInsumo">🔍 Buscar</button>
        </div>
    </div>

    <div class="card-body">

        {{-- Resultados de búsqueda --}}
        <div id="resultadoBusqueda" class="mt-2" style="display: none;">
            <h6>Resultados:</h6>
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Stock</th>
                        <th>Unidad</th>
                        <th>Costo Unitario</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody id="tablaResultados">
                    {{-- Resultados dinámicos por JS --}}
                </tbody>
            </table>
        </div>

        {{-- Tabla de insumos seleccionados --}}
        <div class="mt-4">
            <h6>Insumos seleccionados:</h6>
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Stock</th>
                        <th>Unidad</th>
                        <th>Costo Unitario</th>
                        <th>Cantidad a Usar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody id="tablaSeleccionados">
                    {{-- Insumos agregados aparecerán aquí --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Script dinámico --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const inputBuscar = document.getElementById('searchInsumo');
    const btnBuscar = document.getElementById('btnBuscarInsumo');
    const resultadoDiv = document.getElementById('resultadoBusqueda');
    const tablaResultados = document.getElementById('tablaResultados');
    const tablaSeleccionados = document.getElementById('tablaSeleccionados');
    let contadorInsumos = 0;

    // 🔍 Buscar insumo (por nombre)
    btnBuscar.addEventListener('click', function() {
        const query = inputBuscar.value.trim();
        if (!query) return;

        fetch(`/api/insumos/buscar?nombre=${query}`)
            .then(res => res.json())
            .then(data => {
                tablaResultados.innerHTML = '';
                resultadoDiv.style.display = 'block';
                if (data.length === 0) {
                    tablaResultados.innerHTML = `<tr><td colspan="6" class="text-center text-muted">No se encontraron insumos</td></tr>`;
                    return;
                }

                data.forEach(insumo => {
                    const fila = `
                        <tr>
                            <td>${insumo.nombre}</td>
                            <td>${insumo.tipo}</td>
                            <td>${insumo.stock}</td>
                            <td>${insumo.unidad}</td>
                            <td>S/ ${parseFloat(insumo.costo_unitario).toFixed(2)}</td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm" onclick="agregarInsumo(${insumo.id}, '${insumo.nombre}', '${insumo.tipo}', ${insumo.stock}, '${insumo.unidad}', ${insumo.costo_unitario})">➕</button>
                            </td>
                        </tr>`;
                    tablaResultados.insertAdjacentHTML('beforeend', fila);
                });
            });
    });
    
    // 🧩 Función para agregar insumo
    window.agregarInsumo = function(id, nombre, tipo, stock, unidad, costo_unitario) {
    if (document.querySelector(`#filaInsumo_${id}`)) {
        alert('⚠️ Este insumo ya está agregado.');
        return;
    }

    const fila = `
        <tr id="filaInsumo_${id}">
            <td>${nombre}<input type="hidden" name="insumos[${contadorInsumos}][id]" value="${id}"></td>
            <td>${tipo}</td>
            <td>${stock}</td>
            <td>${unidad}</td>
            <td>S/ ${costo_unitario.toFixed(2)}</td>
            <td><input type="number" name="insumos[${contadorInsumos}][cantidad_usada]" class="form-control" min="1" max="${stock}" placeholder="Ej. 2"></td>
            <td><button type="button" class="btn btn-danger btn-sm" onclick="eliminarInsumo(${id})">🗑️</button></td>
        </tr>`;

    tablaSeleccionados.insertAdjacentHTML('beforeend', fila);
    contadorInsumos++;
};
});
</script>
@endif

{{-- Detalle de Inventario --}}
@if($Modo == 'detalleInv')
<div class="card shadow mb-4 border-0">
    <div class="card-header bg-info text-white">
        <h4 class="mb-0">📋 Detalle del Inventario #{{ $inventario->id }}</h4>
    </div>

    <div class="card-body">
        <p><strong>Descripción:</strong> {{ $inventario->descripcion ?? 'Sin descripción' }}</p>
        <p><strong>Costo Total:</strong> S/ {{ number_format($inventario->costo_total, 2) }}</p>
        <p><strong>Cantidad Total Usada:</strong> {{ $inventario->cantidad_usada }}</p>

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Insumo</th>
                        <th>Cantidad Usada</th>
                        <th>Costo Unitario</th>
                        <th>Costo Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inventario->deta as $detalle)
                    <tr>
                        <td>{{ $detalle->insumo->nombre }}</td>
                        <td>{{ $detalle->cantidad_usada }}</td>
                        <td>S/ {{ number_format($detalle->insumo->costo_unitario, 2) }}</td>
                        <td>S/ {{ number_format($detalle->cantidad_usada * $detalle->insumo->costo_unitario, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endif

{{-- Widget de Accesibilidad --}}
@if($Modo === 'Accesibilidad')

@once
@push('styles')
<style>
    .acc-widget { position: fixed; bottom: 90px; right: 20px; z-index: 999; font-family: system-ui, sans-serif; }
    .acc-btn { width: 56px; height: 56px; background: #007bff; color: white; border: none; border-radius: 50%; font-size: 24px; cursor: pointer; box-shadow: 0 4px 12px rgba(0,0,0,0.2); display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; }
    .acc-btn:hover { background: #0056b3; transform: scale(1.1); }
    .acc-btn:focus { outline: 3px solid #fff; outline-offset: 2px; }
    .acc-panel { position: absolute; bottom: 70px; right: 0; width: 280px; background: white; border-radius: 12px; box-shadow: 0 8px 24px rgba(0,0,0,0.15); padding: 16px; display: none; flex-direction: column; gap: 12px; opacity: 0; transform: translateY(10px); transition: all 0.3s ease; border: 1px solid #e0e0e0; }
    .acc-panel.open { display: flex; opacity: 1; transform: translateY(0); }
    .acc-title { font-weight: 600; font-size: 16px; margin: 0 0 8px; color: #1a1a1a; text-align: center; }
    .acc-option { display: flex; align-items: center; justify-content: space-between; padding: 10px 12px; background: #f8f9fa; border-radius: 8px; font-size: 14px; color: #333; cursor: pointer; transition: background 0.2s; }
    .acc-option:hover { background: #e9ecef; }
    .acc-text-controls { display: flex; align-items: center; gap: 8px; padding: 8px 12px; background: #f8f9fa; border-radius: 8px; }
    .acc-text-btn { width: 32px; height: 32px; border: 1px solid #ccc; background: white; border-radius: 6px; font-weight: bold; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: all 0.2s; }
    .acc-text-btn:hover { background: #007bff; color: white; border-color: #007bff; }
    .acc-text-btn:disabled { opacity: 0.5; cursor: not-allowed; }
    .acc-text-value { min-width: 40px; text-align: center; font-weight: 500; }
    .acc-reset { margin-top: 8px; padding: 10px; background: #dc3545; color: white; border: none; border-radius: 8px; font-size: 14px; cursor: pointer; }
    .acc-reset:hover { background: #c82333; }
    .acc-panel::after { content: ''; position: absolute; bottom: -8px; right: 24px; width: 0; height: 0; border-left: 8px solid transparent; border-right: 8px solid transparent; border-top: 8px solid white; }
    body.acc-high-contrast, body.acc-high-contrast * { background: black !important; color: white !important; border-color: white !important; }
    body.acc-high-contrast a { color: #66ccff !important; text-decoration: underline !important; }
    body.acc-high-contrast img, body.acc-high-contrast video, body.acc-high-contrast iframe { filter: brightness(0.8) contrast(1.2) !important; }
    body.acc-underline-links a { text-decoration: underline !important; }
    body.acc-reading-mode *, body.acc-reading-mode *:before, body.acc-reading-mode *:after { animation: none !important; transition: none !important; }
    body.acc-reading-mode img, body.acc-reading-mode video, body.acc-reading-mode svg, body.acc-reading-mode [style*="background-image"] { filter: grayscale(100%) opacity(0.7) !important; }
    @media (max-width: 480px) { .acc-panel { width: 260px; right: -10px; } .acc-btn { width: 48px; height: 48px; font-size: 20px; } }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        if (document.querySelector('.acc-widget')) return;

        const CONFIG = { min: 80, max: 150, step: 10, key: 'acc-v1' };
        let state = { fontSize: 100, highContrast: false, readingMode: false, underlineLinks: false };

        const save = () => localStorage.setItem(CONFIG.key, JSON.stringify(state));
        const load = () => { const s = localStorage.getItem(CONFIG.key); if (s) try { state = { ...state, ...JSON.parse(s) }; apply(); } catch(e) {} };
        const applyFontSize = () => {
            document.documentElement.style.fontSize = state.fontSize + '%';
            const v = document.querySelector('.acc-text-value'); if (v) v.textContent = state.fontSize + '%';
            const d = document.querySelector('.acc-decrease'); if (d) d.disabled = state.fontSize <= CONFIG.min;
            const i = document.querySelector('.acc-increase'); if (i) i.disabled = state.fontSize >= CONFIG.max;
        };
        const toggle = (c, e) => e ? document.body.classList.add(c) : document.body.classList.remove(c);
        const updateStatus = () => {
            ['high-contrast', 'reading-mode', 'underline-links'].forEach(id => {
                const el = document.querySelector(`#acc-${id}-status`);
                if (el) el.textContent = state[id.replace('-', '')] ? 'ON' : 'OFF';
            });
        };
        const apply = () => { applyFontSize(); toggle('acc-high-contrast', state.highContrast); toggle('acc-reading-mode', state.readingMode); toggle('acc-underline-links', state.underlineLinks); updateStatus(); };
        const reset = () => { state = { fontSize: 100, highContrast: false, readingMode: false, underlineLinks: false }; localStorage.removeItem(CONFIG.key); apply(); };

        const widget = document.createElement('div');
        widget.className = 'acc-widget';
        widget.innerHTML = `
            <button class="acc-btn" aria-label="Accesibilidad" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 0a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM4.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm7 0a1.5 1.5 0 1 0 0 3 1.5 1.1 0 0 0 0-3zM2.5 8A1.5 1.5 0 1 0 5 8 1.5 1.5 0 0 0 2.5 8zm11 0A1.5 1.5 0 1 0 16 8a1.5 1.5 0 0 0-2.5 0zM8 6.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/>
                    <circle cx="8" cy="11" r="2"/>
                    <path d="M8 13v3m-3-3l1 2m4-2l-1 2"/>
                </svg>
            </button>
            <div class="acc-panel">
                <h3 class="acc-title">Accesibilidad</h3>
                <div class="acc-text-controls">
                    <button class="acc-text-btn acc-decrease" aria-label="Disminuir">-</button>
                    <span class="acc-text-value">100%</span>
                    <button class="acc-text-btn acc-increase" aria-label="Aumentar">+</button>
                </div>
                <div class="acc-option" id="acc-high-contrast-toggle"><span>Alto Contraste</span><span id="acc-high-contrast-status">OFF</span></div>
                <div class="acc-option" id="acc-reading-mode-toggle"><span>Modo Lectura</span><span id="acc-reading-mode-status">OFF</span></div>
                <div class="acc-option" id="acc-underline-links-toggle"><span>Subrayar Enlaces</span><span id="acc-underline-links-status">OFF</span></div>
                <button class="acc-reset">Restablecer</button>
            </div>
        `;
        document.body.appendChild(widget);

        const btn = widget.querySelector('.acc-btn');
        const panel = widget.querySelector('.acc-panel');

        btn.addEventListener('click', e => { e.stopPropagation(); const o = panel.classList.toggle('open'); btn.setAttribute('aria-expanded', o); });
        document.addEventListener('click', () => { panel.classList.remove('open'); btn.setAttribute('aria-expanded', 'false'); });
        panel.addEventListener('click', e => e.stopPropagation());

        widget.querySelector('.acc-decrease').addEventListener('click', () => { if (state.fontSize > CONFIG.min) { state.fontSize -= CONFIG.step; apply(); save(); } });
        widget.querySelector('.acc-increase').addEventListener('click', () => { if (state.fontSize < CONFIG.max) { state.fontSize += CONFIG.step; apply(); save(); } });
        widget.querySelector('#acc-high-contrast-toggle').addEventListener('click', () => { state.highContrast = !state.highContrast; apply(); save(); });
        widget.querySelector('#acc-reading-mode-toggle').addEventListener('click', () => { state.readingMode = !state.readingMode; apply(); save(); });
        widget.querySelector('#acc-underline-links-toggle').addEventListener('click', () => { state.underlineLinks = !state.underlineLinks; apply(); save(); });
        widget.querySelector('.acc-reset').addEventListener('click', reset);

        document.addEventListener('keydown', e => { if (e.key === 'Escape' && panel.classList.contains('open')) { panel.classList.remove('open'); btn.focus(); } });

        load();
    });
</script>
@endpush
@endonce

{{-- Inyectar estilos y scripts al final --}}
@stack('styles')
@stack('scripts')

@endif