<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cobat 15</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="build/css/app.css">
</head>
<body>

    <header class="header">
        <div class="contenedor contenido-header">
            <h1>Cobat 15 Tampico</h1>

            <nav class="navegacion-principal">
                <a  href="#Avisos">Avisos</a>
                <a href="#galeria">Galería</a>
                <a href="aspirante.php">Inscripción</a>
                <a href="login.php">Login</a>
            </nav>
        </div>
    </header>

    <div class="video">
        <div class="overlay">
            <div class="contenedor contenido-video">
                <h2>Cobat 15</h2>
                <p>Tampico,Tamaulipas.</p>
            </div>
        </div>
        <video autoplay muted loop>
            <source src="video/Cobat 15.mp4" type="video/mp4">
        </video>
    </div>
    
    <section class="contenedor sobre-festival">
        <div class="imagen">
            <picture>
                <source srcset="build/img/foto_principal.jpg" type="image/avif">
                <source srcset="build/img/foto_principal.jpg" type="image/webp">
                <img loading="lazy" width="200" height="300" src="build/img/foto_principal.jpg" alt="imagen vocalista">
            </picture>
        </div>
        <div class="contenido-festival">
            <h2>Somos COBAT</h2>
            <p>Desde su establecimiento en 1996 y su ascenso a Plantel B en 1997, el Plantel 15 de Tampico ha mejorado significativamente, destacándose por sus modernas instalaciones inauguradas en 2006 y una educación de calidad dirigida por la Lic. María Luisa Martínez Macías y un equipo docente dedicado.</p>
        </div>
    </section>

    <section id="Avisos" class="lineup">
        <h3>Avisos</h3>

        <p class="dia">Viernes 21</p>
        <div class="escenarios-contenedor contenedor">
            <div class="escenario rock bg-amarillo">
                <p class="nombre-escenario">Lunes</p>

                <ul class="calendario">
                    <li>
                        4:00 | <span>Entrega de boletas</span>
                    </li>
                    <li>
                        2:00 | <span>Vacunación</span>
                    </li>
                </ul>
            </div> <!--.escenario-->

            <div class="escenario edm bg-verde">
                <p class="nombre-escenario">Martes</p>

                <ul class="calendario">
                    <li>
                        4:00 | <span>Entrega de boletas</span>
                    </li>
                    <li>
                        2:00 | <span>Vacunación</span>
                    </li>
                </ul>
            </div> <!--.escenario-->
        </div> <!--.escenarios-contenedor -->


        <p class="dia">Sábado 22</p>
        <div class="escenarios-contenedor contenedor">
            <div class="escenario rock bg-verde">
                <p class="nombre-escenario">Miercoles</p>

                <ul class="calendario">
                    <li>
                        4:00 | <span>Entrega de boletas</span>
                    </li>
                    <li>
                        2:00 | <span>Vacunación</span>
                    </li>
                </ul>
            </div> <!--.escenario-->

            <div class="escenario edm bg-amarillo">
                <p class="nombre-escenario">Jueves</p>

                <ul class="calendario">
                    <li>
                        4:00 | <span>Entrega de boletas</span>
                    </li>
                    <li>
                        2:00 | <span>Vacunación</span>
                    </li>
                </ul>
            </div> <!--.escenario-->
        </div> <!--.escenarios-contenedor -->

    </section>

    <section id="galeria" class="galeria contenedor">
        <h3>Galería</h3>

        <ul class="galeria-imagenes"></ul>
    </section>

    <footer class="site-footer">
        <p>Cobat 15 Tampico, Todos los derechos reservados</p>
    </footer>

    <script src="build/js/app.js"></script>
</body>
</html>