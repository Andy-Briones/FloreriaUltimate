<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


    
</head>

<body>
    @include('forms', ['Modo' => 'Encabezado'])
    <!-- Archivo: contacto.html -->
    <section class="card">
        <h1>Contáctanos</h1>
        <p class="muted">¿Tienes una idea o necesitas ayuda? Escríbenos y te responderemos pronto.</p>


        <div class="row">
            <div>
                <form id="contactForm" onsubmit="submitForm(event)">
                    <div id="formAlert"></div>


                    <label for="name">Nombre</label>
                    <input id="name" name="name" placeholder="Tu nombre" required>


                    <label for="email">Correo electrónico</label>
                    <input id="email" name="email" type="email" placeholder="ejemplo@correo.com" required>


                    <label for="reason">Motivo</label>
                    <select id="reason" name="reason" required>
                        <option value="">Selecciona...</option>
                        <option value="consulta">Consulta</option>
                        <option value="soporte">Soporte</option>
                        <option value="cotizacion">Cotización</option>
                    </select>


                    <label for="message">Mensaje</label>
                    <textarea id="message" name="message" placeholder="Cuéntanos con detalle" required></textarea>


                    <div style="display:flex;justify-content:space-between;align-items:center;margin-top:.6rem">
                        <small class="muted">Responderemos dentro de 48 horas hábiles.</small>
                        <button class="btn" type="submit">Enviar</button>
                    </div>
                </form>
            </div>


            <aside class="card">
                <h3>Información</h3>
                <p class="muted">Dirección: Av. Central 123, Lima, Perú</p>
                <p class="muted">Teléfono: +51 987 654 321</p>
                <p class="muted">Horario: Lun-Vie 9:00 - 18:00</p>
                <div style="height:12px"></div>
                <div class="muted">También puedes enviarnos un mensaje por WhatsApp o escribirnos en nuestras redes
                    sociales.</div>
            </aside>
        </div>


    </section>
    </main>


    <footer style="text-align:center;padding:1rem;color:var(--muted)">© Alessa Floreria 2025</footer>


    <script>
        function submitForm(e) {
            e.preventDefault();
            const alert = document.getElementById('formAlert');
            alert.className = '';
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const reason = document.getElementById('reason').value;
            const message = document.getElementById('message').value.trim();
            if (!name || !email || !reason || !message) {
                alert.className = 'error'; alert.textContent = 'Por favor completa todos los campos.'; return;
            }
            alert.className = 'success'; alert.textContent = '¡Mensaje enviado! Gracias — pronto nos comunicaremos contigo.';
            e.target.reset();
        }
    </script>
    <!-- Bootstrap JS (para el botón responsive) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>