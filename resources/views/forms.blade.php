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
        <h4 class="mb-0">{{ $Modo == 'crearI' ? '🛒 Agregar Insumo' : '✏️ Modificar Isumo' }}</h4>
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
                    @endforeach
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

{{-- Producto --}}
{{--  @if($Modo == 'crearP' || $Modo == 'editarP')
<div class="card shadow mb-4 border-0">
    <div class="card-header bg-success text-white">
        <h4 class="mb-0">{{ $Modo == 'crearP' ? '🛒 Agregar Producto' : '✏️ Modificar Producto' }}</h4>
    </div>
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label for="name" class="form-label">📦 Nombre del Producto</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ isset($product->name) ? $product->name : '' }}">
            </div>
            <div class="col-md-6">
                <label for="description" class="form-label">📝 Descripción</label>
                <input type="text" name="description" id="description" class="form-control"
                    value="{{ isset($product->description) ? $product->description : '' }}">
            </div>
            <div class="col-md-6">
                <label for="price" class="form-label">💲 Precio</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control"
                    value="{{ isset($product->price) ? $product->price : '' }}">
            </div>
            <div class="col-md-6">
                <label for="stock" class="form-label">📊 Stock</label>
                <input type="number" name="stock" id="stock" class="form-control"
                    value="{{ isset($product->stock) ? $product->stock : '' }}">
            </div>
            <div class="col-md-6">
            <label for="image_path" class="form-label">📝 Imagen</label>
                <input type="text" name="image_path" id="image_path" class="form-control"
                    value="{{ isset($product->image_path) ? $product->image_path : '' }}">
            </div>
            {{--  <div class="col-md-6">
                <label for="als_category_id" class="form-label">📂 Categoria</label>
                <select name="als_category_id" id="als_category_id" class="form-select">
                    @foreach($categorys as $category) 
                        <option value="{{ $category->id }}" {{ isset($product->als_category_id) && $product->als_category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="als_supplier_id" class="form-label">🚚 Proveedor</label>
                <select name="als_supplier_id" id="als_supplier_id" class="form-select">
                    @foreach($suppliers as $supplier) suppliers supplier
                        <option value="{{ $supplier->id }}" {{ isset($product->als_supplier_id) && $product->als_supplier_id == $supplier->id ? 'selected' : '' }}>
                            {{ $supplier->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div> --}}
{{--  @endif  --}}

{{-- Listado de Productos --}}
@if($Modo == 'listarProd')
<div class="card shadow mb-4 border-0">
    <div class="card-header bg-dark text-white">
        <h4 class="mb-0">📦 Productos Registrados</h4>
    </div>

    <div class="card-body">
        <a href="{{ route('inventario.create') }}" class="btn btn-success mb-3">➕ Nuevo Producto</a>

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Precio (S/)</th>
                        <th>Costo Producción</th>
                        <th>Stock</th>
                        <th>Estado</th>
                        <th>Inventario ID</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->name }}</td>
                        <td>S/ {{ number_format($producto->price, 2) }}</td>
                        <td>S/ {{ number_format($producto->costo_produccion, 2) }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>{{ ucfirst($producto->estado) }}</td>
                        <td>{{ $producto->alsinventories_id }}</td>
                        <td>
                            <a href="{{ route('inventario.detalle', $producto->alsinventories_id) }}" class="btn btn-sm btn-info">👁️ Detalle</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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


{{--  Cliente  --}}
@if ($Modo == 'Encabezado')
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/insumos')}}">Insumos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/products')}}">Catálogo</a>
        </li>
        {{--  <li class="nav-item">
          <a class="nav-link" href="{{ route('orders.create') }}">Pedido</a>
        </li>  --}}
        <li class="nav-item">
          <a class="nav-link" href="{{route('contactanos')}}">Contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/nosotros') }}">Sobre Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Iniciar Sesion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<style>
/* ===== NAVBAR GENERAL ===== */
.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: linear-gradient(135deg, #ffd9e0, #ffeef2);
  box-shadow: 0 4px 15px rgba(201, 79, 124, 0.25);
  border-bottom: 2px solid #ffb6c1;
  padding: 0.8rem 2rem;
  position: sticky;
  top: 0;
  z-index: 1000;
}

/* ===== LOGO / TÍTULO ===== */
.navbar-brand {
  font-family: "Playfair Display", serif;
  font-size: 1.8rem;
  font-weight: 700;
  color: #c94f7c;
  letter-spacing: 1px;
  text-decoration: none;
  transition: color 0.3s ease;
}

.navbar-brand:hover {
  color: #a6315b;
}

/* ===== CONTENEDOR DE LINKS ===== */
.navbar-nav {
  display: flex;
  gap: 1.5rem;
  list-style: none;
  margin: 0;
  padding: 0;
}

/* ===== LINKS ===== */
.navbar-nav .nav-link {
  color: #4b3b3b;
  text-decoration: none;
  font-weight: 500;
  font-size: 1rem;
  position: relative;
  transition: all 0.3s ease;
}

/* ===== EFECTO DE SUBRAYADO ===== */
.navbar-nav .nav-link::after {
  content: "";
  position: absolute;
  bottom: -4px;
  left: 0;
  width: 0%;
  height: 2px;
  background-color: #c94f7c;
  transition: width 0.3s ease;
}

.navbar-nav .nav-link:hover::after,
.navbar-nav .nav-link.active::after {
  width: 100%;
}

/* ===== LINK ACTIVO ===== */
.navbar-nav .nav-link.active {
  color: #c94f7c;
  font-weight: 600;
}

/* ===== BOTÓN DE SESIÓN DESTACADO ===== */
.navbar-nav .nav-link:last-child {
  background-color: #c94f7c;
  color: #fff;
  padding: 8px 18px;
  border-radius: 25px;
  transition: all 0.3s ease;
}

.navbar-nav .nav-link:last-child:hover {
  background-color: #a6315b;
  transform: translateY(-2px);
}

/* ===== RESPONSIVE ===== */
@media (max-width: 768px) {
  .navbar {
    flex-direction: column;
    text-align: center;
    padding: 1rem;
  }

  .navbar-nav {
    flex-direction: column;
    gap: 0.8rem;
    margin-top: 0.8rem;
  }
}
</style>

@endif


{{--  Administrador  --}}
@if ($Modo == 'EncabezadoAdmin')
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/products')}}">Producto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/orders') }}">Pedido</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('contactanos')}}">Contacto</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Sobre Nosotros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Iniciar Sesion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
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
                <input type="text" name="image_path" id="image_path" class="form-control"
                    value="{{ isset($producto->image_path) ? $producto->image_path : '' }}">
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

{{-- Insumos --}}
<div class="card shadow mb-4 border-0">
    <div class="card-header bg-success text-white">
        <h4 class="mb-0">🧾 Seleccionar Insumos para el Producto</h4>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Stock Disponible</th>
                        <th>Unidad</th>
                        <th>Costo Unitario</th>
                        <th>Cantidad a Usar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($insumos as $index => $insumo)
                    <tr>
                        <td>
                            {{ $insumo->nombre }}
                            <input type="hidden" name="insumos[{{ $index }}][id]" value="{{ $insumo->id }}">
                        </td>
                        <td>{{ $insumo->tipo }}</td>
                        <td>{{ $insumo->stock }}</td>
                        <td>{{ $insumo->unidad }}</td>
                        <td>S/ {{ number_format($insumo->costo_unitario, 2) }}</td>
                        <td>
                            <input type="number" name="insumos[{{ $index }}][cantidad_usada]" 
                                class="form-control" min="0" max="{{ $insumo->stock }}" 
                                placeholder="Ej. 2">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
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

