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
/* ===== RESET ===== */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-family: 'Poppins', sans-serif;
}

/* ===== BODY ===== */
body {
  background: linear-gradient(120deg, #ffeef2, #fff8f7);
  min-height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 2rem 0;
}

/* ===== FORMULARIO PRINCIPAL ===== */
.container form {
  background: #fff;
  border-radius: 20px;
  padding: 2.5rem;
  box-shadow: 0 8px 25px rgba(201, 79, 124, 0.15);
  max-width: 700px;
  width: 100%;
  transition: all 0.3s ease;
}

.container form:hover {
  box-shadow: 0 12px 35px rgba(201, 79, 124, 0.25);
}

/* ===== BOTONES ===== */
.btn {
  border-radius: 30px;
  font-weight: 500;
  padding: 10px 22px;
  transition: all 0.3s ease;
}

.btn-primary {
  background: linear-gradient(135deg, #ff7aa8, #c94f7c);
  border: none;
}

.btn-primary:hover {
  background: linear-gradient(135deg, #c94f7c, #a62c5f);
  transform: translateY(-2px);
}

.btn-outline-secondary {
  border: 2px solid #c94f7c;
  color: #c94f7c;
  background: transparent;
}

.btn-outline-secondary:hover {
  background: #c94f7c;
  color: #fff;
  transform: translateY(-2px);
}

/* ===== BOTONES NUEVA CATEGORÍA / PROVEEDOR ===== */
#btnOpenCarac, #btnOpenSupplier {
  position: fixed;
  bottom: 25px;
  right: 25px;
  z-index: 100;
  border-radius: 50px;
  padding: 12px 18px;
  font-weight: 600;
  font-size: 0.95rem;
  box-shadow: 0 4px 15px rgba(201, 79, 124, 0.25);
  transition: all 0.3s ease;
}

#btnOpenCarac:hover, #btnOpenSupplier:hover {
  transform: scale(1.05);
  box-shadow: 0 6px 20px rgba(201, 79, 124, 0.35);
}

#btnOpenSupplier {
  right: 190px;
  background: linear-gradient(135deg, #4fb1c9, #6ad7f2);
  border: none;
}

/* ===== FORMULARIOS FLOTANTES ===== */
.form-container {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%) scale(0.95);
  background: rgba(255, 255, 255, 0.85);
  backdrop-filter: blur(10px);
  box-shadow: 0 8px 25px rgba(201, 79, 124, 0.3);
  border-radius: 20px;
  width: 90%;
  max-width: 600px;
  padding: 2rem;
  z-index: 2000;
  animation: fadeIn 0.3s ease forwards;
}

/* ===== ENCABEZADO DEL FORMULARIO FLOTANTE ===== */
.form-header {
  font-size: 1.4rem;
  font-weight: 600;
  color: #c94f7c;
  text-align: center;
  margin-bottom: 1.5rem;
  text-shadow: 0 1px 2px rgba(201, 79, 124, 0.3);
}

/* ===== BOTÓN CERRAR (X) ===== */
.close-btn {
  position: absolute;
  top: 12px;
  right: 18px;
  font-size: 1.8rem;
  cursor: pointer;
  color: #c94f7c;
  transition: all 0.3s ease;
}

.close-btn:hover {
  color: #a62c5f;
  transform: scale(1.1);
}

/* ===== EFECTO DE ANIMACIÓN ===== */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translate(-50%, -48%) scale(0.9);
  }
  to {
    opacity: 1;
    transform: translate(-50%, -50%) scale(1);
  }
}

/* ===== FORMULARIO INTERNO ===== */
.form-container form {
  background: transparent;
  box-shadow: none;
  padding: 0;
}

/* ===== RESPONSIVE ===== */
@media (max-width: 768px) {
  body {
    padding: 1rem;
  }

  .container form {
    padding: 1.5rem;
  }

  #btnOpenCarac, #btnOpenSupplier {
    font-size: 0.85rem;
    padding: 10px 14px;
  }

  #btnOpenSupplier {
    right: 150px;
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