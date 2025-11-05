<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @include('forms', ['Modo' => 'Encabezado'])
    <style>
    /* ======= RESET Y BASE ======= */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Noto Sans', sans-serif;
}

body {
  background-color: #fff6f8;
  color: #4a4a4a;
  display: flex;
  flex-direction: column;
  min-height: 100vh;
}

/* ======= NAVBAR SUPERIOR ======= */
nav {
  width: 100%;
  background-color: #ffc6d5;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
  padding: 10px 0;
}

nav ul {
  list-style: none;
  display: flex;
  justify-content: center;
  gap: 30px;
}

nav ul li a {
  text-decoration: none;
  color: white;
  background-color: #c94f7c;
  padding: 10px 20px;
  border-radius: 20px;
  font-weight: 600;
  transition: background-color 0.3s ease, transform 0.2s ease;
}

nav ul li a:hover {
  background-color: #b03f68;
  transform: scale(1.05);
}

/* ======= CONTENIDO PRINCIPAL ======= */
.container {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: flex-start;
  padding: 40px 20px;
}

/* ======= FORMULARIO DE CONTACTO ======= */
.contact-box {
  display: flex;
  flex-direction: column;
  align-items: center;
  background: #e8a6e5ff;
  border: 2px solid #f2b1c2;
  border-radius: 12px;
  box-shadow: 0 4px 15px rgba(201,79,124,0.1);
  padding: 40px;
  max-width: 800px;
  width: 100%;
}

.contact-box h2 {
  color: #c94f7c;
  margin-bottom: 10px;
  font-size: 28px;
}

.contact-box p {
  color: #888;
  margin-bottom: 25px;
  text-align: center;
}

form {
  display: flex;
  flex-direction: column;
  gap: 15px;
  width: 100%;
}

form label {
  color: #c94f7c;
  font-weight: 600;
}

form input,
form select,
form textarea {
  border-radius: 10px;
  border: 1px solid #f2b1c2;
  padding: 10px;
  box-shadow: 0 2px 5px rgba(201,79,124,0.05);
  width: 100%;
}

form button {
  background-color: #c94f7c;
  color: white;
  border: none;
  padding: 10px 20px;
  border-radius: 8px;
  cursor: pointer;
  font-weight: 600;
  align-self: flex-end;
  transition: background-color 0.3s ease;
}

form button:hover {
  background-color: #a93c63;
}

/* ======= SECCIÓN DE INFORMACIÓN ======= */
.info-box {
  margin-top: 20px;
  background-color: #f1a2dbff;
  border: 1px solid #f2b1c2;
  border-radius: 12px;
  padding: 20px;
  color: #555;
  width: 100%;
}

.info-box h3 {
  color: #c94f7c;
  margin-bottom: 10px;
}

/* ======= FOOTER ======= */
footer {
  background-color: #ffc6d5;
  text-align: center;
  padding: 10px 0;
  font-size: 14px;
  color: #6b2c48;
  border-top: 1px solid #f2b1c2;
}
</style>

</head>

<body>
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