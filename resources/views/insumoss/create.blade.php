<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Insumo</title>
    <div>
        @include('forms', ['Modo' => 'Encabezado'])
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
/* 🎨 Fondo general floral */
body {
  background-color: #d28cdbff;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  color: #333;
  display: flex;
  flex-direction: column;
  align-items: center;
  min-height: 100vh;
  margin: 0;
  padding: 20px;
}

/* 🌸 Contenedor principal (centrado y compacto) */
.container {
  background: #ffffff;
  border-radius: 16px;
  box-shadow: 0 6px 18px rgba(201, 79, 124, 0.15);
  padding: 25px 30px;
  width: 90%;
  max-width: 650px;
  margin: 20px auto;
  animation: fadeIn 0.4s ease;
}

/* ✨ Animación de aparición */
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(-10px); }
  to { opacity: 1; transform: translateY(0); }
}

/* 🩷 Encabezados */
h2, h4 {
  color: #c94f7c;
  font-weight: bold;
  text-align: center;
  margin-bottom: 20px;
  text-shadow: 1px 1px 2px rgba(201, 79, 124, 0.1);
}

/* 🌿 Botones principales */
.btn {
  border-radius: 8px;
  transition: all 0.3s ease;
  font-weight: 500;
}

.btn-primary {
  background-color: #e58ba3;
  border-color: #e58ba3;
}

.btn-primary:hover {
  background-color: #c94f7c;
  border-color: #c94f7c;
}

.btn-outline-secondary {
  border-color: #c94f7c;
  color: #c94f7c;
}

.btn-outline-secondary:hover {
  background-color: #c94f7c;
  color: white;
}

.btn-success {
  background-color: #d47a96;
  border: none;
  color: white;
}

.btn-success:hover {
  background-color: #c94f7c;
}

.btn-info {
  background-color: #f4b7c2;
  color: white;
}

.btn-info:hover {
  background-color: #c94f7c;
}

/* ✏️ Formularios */
form input,
form select,
form textarea {
  border-radius: 12px;
  border: 1px solid #f2b1c2;
  padding: 10px;
  box-shadow: 0 2px 5px rgba(201,79,124,0.05);
  width: 100%;
  transition: all 0.3s ease;
}

form input:focus,
form select:focus,
form textarea:focus {
  border-color: #c94f7c;
  box-shadow: 0 0 5px rgba(201,79,124,0.2);
  outline: none;
}

form label {
  color: #c94f7c;
  font-weight: 600;
}

/* 💐 Botones externos (nueva categoría y proveedor) */
#btnOpenCarac,
#btnOpenSupplier {
  margin: 10px 8px;
  border-radius: 10px;
  font-weight: 500;
  box-shadow: 0 3px 6px rgba(201, 79, 124, 0.15);
}

/* 🪻 Formularios flotantes */
.form-container {
  display: none;
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  background: #ffffff;
  border-radius: 16px;
  box-shadow: 0 10px 30px rgba(201, 79, 124, 0.25);
  padding: 25px 30px;
  width: 90%;
  max-width: 500px;
  z-index: 1050;
  animation: fadeIn 0.3s ease;
}

/* 🌷 Encabezado de los formularios flotantes */
.form-header {
  font-size: 1.3rem;
  color: #c94f7c;
  font-weight: bold;
  text-align: center;
  margin-bottom: 15px;
}

/* ❌ Botón de cierre */
.close-btn {
  position: absolute;
  top: 10px;
  right: 15px;
  font-size: 24px;
  color: #c94f7c;
  cursor: pointer;
  transition: 0.3s ease;
}

.close-btn:hover {
  color: #a73d62;
}

/* 🌙 Fondo difuminado detrás del modal */
body::before {
  content: "";
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(201, 79, 124, 0.15);
  backdrop-filter: blur(3px);
  z-index: 1000;
}

/* Mostrar fondo cuando hay formulario abierto */
body.modal-open::before {
  display: block;
}

/* 📱 Ajuste responsivo */
@media (max-width: 576px) {
  .container {
    padding: 20px;
    max-width: 95%;
  }

  .form-container {
    width: 95%;
    padding: 20px;
  }
}
</style>

</head>

<body>


    <div class="container mt-4">
    <form action="{{url('/insumos')}}" method="POST" enctype="multipart/form-data"
            class="p-4 bg-white shadow rounded">
            @csrf
            @include('forms', ['Modo' => 'crearI'])
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary me-2">💾 Guardar</button>
                <a href="{{ url('/')}}" class="btn btn-outline-secondary">⬅️ Regresar</a>
            </div>
        </form> 
        {{--  <form action="{{secure_url('/insumos')}}" method="POST" enctype="multipart/form-data"
            class="p-4 bg-white shadow rounded">
            @csrf
            @include('forms', ['Modo' => 'crearI'])
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary me-2">💾 Guardar</button>
                <a href="{{ url('/')}}" class="btn btn-outline-secondary">⬅️ Regresar</a>
            </div>
        </form>  --}}
    </div>

    <button id="btnOpenCarac" class="btn btn-success">➕ Nueva Categoría</button>
<button id="btnOpenSupplier" class="btn btn-info">➕ Nuevo Proveedor</button>



    <!-- 📌 Formulario flotante: Categoría -->
<div id="formCaracFloating" class="form-container" style="display: none;">
    <span class="close-btn">&times;</span>
    <div class="form-header">➕ Agregar Categoría</div>

    <form id="caracFormFloating" action="{{ route('product_categories.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('forms', ['Modo' => 'crearPRC'])
        <div class="text-center mt-4">
            <button type="button" id="btnGuardarCarac" class="btn btn-primary me-2">💾 Guardar</button>
            <button type="button" class="btn btn-outline-secondary btnCloseFloating">⬅️ Cancelar</button>
        </div>
    </form>
</div>

<!-- 📌 Formulario flotante: Proveedor -->
<div id="formSupplierFloating" class="form-container" style="display: none;">
    <span class="close-btn">&times;</span>
    <div class="form-header">➕ Agregar Proveedor</div>

    <form id="supplierFormFloating" action="{{ route('suppliers.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('forms', ['Modo' => 'crearSP'])
        <div class="text-center mt-4">
            <button type="button" id="btnGuardarSupplier" class="btn btn-primary me-2">💾 Guardar</button>
            <button type="button" class="btn btn-outline-secondary btnCloseSuppFloating">⬅️ Cancelar</button>
        </div>
    </form>
</div>

<!-- 🧠 JS para abrir/cerrar y guardar con AJAX -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    // CATEGORÍA
    const btnOpenCarac = document.getElementById('btnOpenCarac');
    const formCaracFloating = document.getElementById('formCaracFloating');
    const btnCloseCaracX = formCaracFloating.querySelector('.close-btn');
    const btnCloseCaracCancel = formCaracFloating.querySelector('.btnCloseFloating');
    const btnGuardarCarac = document.getElementById('btnGuardarCarac');

    if (btnOpenCarac) {
        btnOpenCarac.addEventListener('click', () => formCaracFloating.style.display = 'block');
    }
    btnCloseCaracX.addEventListener('click', () => formCaracFloating.style.display = 'none');
    btnCloseCaracCancel.addEventListener('click', () => formCaracFloating.style.display = 'none');

    btnGuardarCarac.addEventListener('click', () => {
        const formData = new FormData(document.getElementById('caracFormFloating'));

        fetch("{{ route('product_categories.store') }}", {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                {{--  alert('✅ Categoría guardada correctamente');  --}}
                formCaracFloating.style.display = 'none';
                location.reload();
            } else {
                alert('❌ Error al guardar la categoría');
            }
        })
        .catch(err => {
            console.error('Error:', err);
            alert('❌ Error en la petición');
        });
    });

    // PROVEEDOR
    const btnOpenSupplier = document.getElementById('btnOpenSupplier');
    const formSupplierFloating = document.getElementById('formSupplierFloating');
    const btnCloseSuppX = formSupplierFloating.querySelector('.close-btn');
    const btnCloseSuppCancel = formSupplierFloating.querySelector('.btnCloseSuppFloating');
    const btnGuardarSupplier = document.getElementById('btnGuardarSupplier');

    if (btnOpenSupplier) {
        btnOpenSupplier.addEventListener('click', () => formSupplierFloating.style.display = 'block');
    }
    btnCloseSuppX.addEventListener('click', () => formSupplierFloating.style.display = 'none');
    btnCloseSuppCancel.addEventListener('click', () => formSupplierFloating.style.display = 'none');

    btnGuardarSupplier.addEventListener('click', () => {
        const formData = new FormData(document.getElementById('supplierFormFloating'));

        fetch("{{ route('suppliers.store') }}", {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                {{--  alert('✅ Proveedor guardado correctamente');  --}}
                formSupplierFloating.style.display = 'none';
                location.reload();
            } else {
                alert('❌ Error al guardar el proveedor');
            }
        })
        .catch(err => {
            console.error('Error:', err);
            alert('❌ Error en la petición');
        });
    });
});


</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>