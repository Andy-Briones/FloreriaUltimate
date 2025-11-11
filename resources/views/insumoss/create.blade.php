<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Insumo - Aridetalles</title>

    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css2?family=Inria+Serif:ital,wght@0,300;0,400;0,700;1,400&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Estilos (mismo que página principal + mejoras para formularios) -->
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
            min-height: 100vh;
            padding: 2rem 1rem;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
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

        /* ===== FORMULARIO PRINCIPAL ===== */
        .form-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            padding: 2rem;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .form-title {
            font-size: 1.8rem;
            color: #38122A;
            text-align: center;
            margin-bottom: 1.5rem;
            font-weight: 700;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.2rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            font-family: 'Inter', sans-serif;
            font-weight: 600;
            color: #38122A;
            margin-bottom: 0.4rem;
            font-size: 0.95rem;
        }

        input, select, textarea {
            font-family: 'Inter', sans-serif;
            padding: 0.8rem 1rem;
            border: 1.5px solid #ddd;
            border-radius: 12px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: #fdfbfc;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #FF69B4;
            box-shadow: 0 0 8px rgba(255, 105, 180, 0.2);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        /* ===== BOTONES ===== */
        .btn-custom {
            padding: 0.7rem 1.5rem;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            border: none;
        }

        .btn-primary-custom {
            background: #FF69B4;
            color: white;
        }

        .btn-primary-custom:hover {
            background: #ff4d9a;
            transform: translateY(-1px);
        }

        .btn-secondary-custom {
            background: #f8d7e3;
            color: #38122A;
            border: 1.5px solid #38122A;
        }

        .btn-secondary-custom:hover {
            background: #38122A;
            color: white;
        }

        .btn-add-extra {
            background: #ffe4ec;
            color: #38122A;
            font-size: 0.9rem;
            padding: 0.6rem 1rem;
            margin: 0.5rem 0.3rem;
        }

        .btn-add-extra:hover {
            background: #FF69B4;
            color: white;
        }

        .btn-group {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 2rem;
        }

        /* ===== MODALES FLOTANTES ===== */
        .modal-floating {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            width: 90%;
            max-width: 500px;
            z-index: 1050;
            animation: fadeIn 0.3s ease;
            padding: 2rem;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .modal-title {
            font-size: 1.4rem;
            color: #38122A;
            font-weight: 700;
        }

        .close-modal {
            font-size: 1.8rem;
            color: #999;
            cursor: pointer;
            transition: 0.3s;
        }

        .close-modal:hover {
            color: #38122A;
        }

        .modal-backdrop {
            display: none;
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(56, 18, 42, 0.4);
            backdrop-filter: blur(4px);
            z-index: 1000;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .btn-group {
                flex-direction: column;
            }

            .btn-custom {
                width: 100%;
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
        @include('forms', ['Modo' => 'Encabezado'])
    @endif
    @else
        @include('forms', ['Modo' => 'Encabezado'])
    @endauth
</head>

<body>

<!-- HEADER -->
<header class="header">
    <div class="nav-container">
        <button class="menu-toggle">Menú</button>
    </div>
</header>

<!-- CONTENIDO -->
<div class="container">
    <div class="form-card">
        <h2 class="form-title">Agregar Nuevo Insumo</h2>

        <form action="{{ url('/insumos') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-grid">
                @include('forms', ['Modo' => 'crearI'])
            </div>

            <div class="btn-group">
                <button type="submit" class="btn-custom btn-primary-custom">Guardar Insumo</button>
                <a href="{{ url('/') }}" class="btn-custom btn-secondary-custom">Regresar</a>
            </div>
        </form>

        <!-- BOTONES PARA MODALES -->
        <div class="text-center mt-4">
            <button id="btnOpenCarac" class="btn-custom btn-add-extra">Nueva Categoría</button>
            <button id="btnOpenSupplier" class="btn-custom btn-add-extra">Nuevo Proveedor</button>
        </div>
    </div>
</div>
@include('forms', ['Modo' => 'Accesibilidad'])

<!-- MODAL: NUEVA CATEGORÍA -->
<div id="modalCarac" class="modal-floating">
    <div class="modal-header">
        <h3 class="modal-title">Nueva Categoría</h3>
        <span class="close-modal" data-target="modalCarac">&times;</span>
    </div>
    <form id="formCarac">
        @csrf
        @include('forms', ['Modo' => 'crearPRC'])
        <div class="btn-group mt-3">
            <button type="button" id="btnGuardarCarac" class="btn-custom btn-primary-custom">Guardar</button>
            <button type="button" class="btn-custom btn-secondary-custom close-modal" data-target="modalCarac">Cancelar</button>
        </div>
    </form>
</div>

<!-- MODAL: NUEVO PROVEEDOR -->
<div id="modalSupplier" class="modal-floating">
    <div class="modal-header">
        <h3 class="modal-title">Nuevo Proveedor</h3>
        <span class="close-modal" data-target="modalSupplier">&times;</span>
    </div>
    <form id="formSupplier">
        @csrf
        @include('forms', ['Modo' => 'crearSP'])
        <div class="btn-group mt-3">
            <button type="button" id="btnGuardarSupplier" class="btn-custom btn-primary-custom">Guardar</button>
            <button type="button" class="btn-custom btn-secondary-custom close-modal" data-target="modalSupplier">Cancelar</button>
        </div>
    </form>
</div>

<!-- BACKDROP -->
<div id="modalBackdrop" class="modal-backdrop"></div>

<!-- SCRIPT: MODALES + AJAX -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const backdrop = document.getElementById('modalBackdrop');

        // Abrir modal
        document.getElementById('btnOpenCarac').addEventListener('click', () => openModal('modalCarac'));
        document.getElementById('btnOpenSupplier').addEventListener('click', () => openModal('modalSupplier'));

        // Cerrar con X o botón
        document.querySelectorAll('.close-modal').forEach(btn => {
            btn.addEventListener('click', () => {
                const target = btn.getAttribute('data-target');
                closeModal(target);
            });
        });

        // Cerrar al hacer clic fuera
        backdrop.addEventListener('click', () => closeModal());

        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'block';
            backdrop.style.display = 'block';
            document.body.style.overflow = 'hidden';
        }

        function closeModal(modalId = null) {
            if (modalId) {
                document.getElementById(modalId).style.display = 'none';
            } else {
                document.querySelectorAll('.modal-floating').forEach(m => m.style.display = 'none');
            }
            backdrop.style.display = 'none';
            document.body.style.overflow = 'auto';
        }

        // GUARDAR CATEGORÍA
        document.getElementById('btnGuardarCarac').addEventListener('click', () => {
            const formData = new FormData(document.getElementById('formCarac'));
            fetch("{{ route('product_categories.store') }}", {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || 
                                   document.querySelector('input[name="_token"]').value
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    closeModal('modalCarac');
                    setTimeout(() => location.reload(), 300);
                } else {
                    alert('Error al guardar categoría');
                }
            })
            .catch(() => alert('Error en la petición'));
        });

        // GUARDAR PROVEEDOR
        document.getElementById('btnGuardarSupplier').addEventListener('click', () => {
            const formData = new FormData(document.getElementById('formSupplier'));
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
                    closeModal('modalSupplier');
                    setTimeout(() => location.reload(), 300);
                } else {
                    alert('Error al guardar proveedor');
                }
            })
            .catch(() => alert('Error en la petición'));
        });

        // Menu mobile
        document.querySelector('.menu-toggle')?.addEventListener('click', () => {
            document.querySelector('.nav')?.classList.toggle('active');
        });
    });
</script>

</body>
</html>