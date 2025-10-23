<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sobre Nosotros</title>
    <div>
        @include('forms', ['Modo' => 'Encabezado'])
    </div>
</head>

<body>
    <header>
        <div class="container">
            <div style="display:flex;justify-content:space-between;align-items:center">
                <div class="brand"><span class="logo" aria-hidden="true"></span>
                    <div style="font-size:1rem">Alessa Floreria <div style="font-size:.8rem;color:var(--muted)">Calidad y
                            confianza</div>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <main class="container">
        <section class="card">
            <div style="display:flex;gap:1rem;align-items:center">
                <div
                    style="width:90px;height:90px;border-radius:12px;background:linear-gradient(135deg,#fde68a,#fb7185)">
                </div>
                <div>
                    <h1>Sobre Nosotros</h1>
                    <p class="lead">Somos un equipo apasionado por crear soluciones digitales sencillas y efectivas.
                        Nuestra misión es ayudar a negocios y personas a comunicar mejor sus ideas en la web.</p>
                    <p style="color:var(--muted)">Con experiencia en diseño, desarrollo y estrategia, trabajamos por
                        proyectos claros, entregables y con buen soporte.</p>
                </div>
            </div>


            <hr style="margin:1rem 0;border:none;border-top:1px solid #eef6fb">


            <div class="grid">
                <div>
                    <h3>Nuestra Visión</h3>
                    <p style="color:var(--muted)">Ser el aliado digital de pequeñas y medianas empresas en
                        Latinoamérica.</p>
                </div>
                <div>
                    <h3>Valores</h3>
                    <p style="color:var(--muted)">Transparencia, rapidez y enfoque en el usuario.</p>
                </div>
                <div>
                    <h3>Cómo trabajamos</h3>
                    <p style="color:var(--muted)">Iteraciones rápidas, feedback constante y entregas con documentación
                        clara.</p>
                </div>
            </div>
        </section>
    </main>

    <div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.42243817919737!2d-78.52107202395996!3d-7.153838090714266!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91b25a57fd1c8a11%3A0x82686cd346b8aa0b!2sFloreria%20Alessa!5e0!3m2!1ses-419!2spe!4v1760476481888!5m2!1ses-419!2spe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <footer style="text-align:center;padding:1rem;color:var(--muted)">© Alessa Floreria 2025</footer>
</body>

</html>