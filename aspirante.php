<?php

?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="build/css/app.css">
    <title>Document</title>
</head>

<body class="aspirante">
    <main class="index-area">
        <div class="index-container">
            <div class="index-hero">
                <h1 class="hero-header"><span>Cobat 15</span> </h1>
                <div class="hero-img" id="lottie-animation"></div>
                <div clas="hero-footer">Forma parte de la experiencia Cobat.</div>
            </div>
            <div class="index-login">
                <div class="login-header">Comienza tu proceso de Aspirante</div>
                <div class="login-logo">
                    <img src="build/img/assets/LogoIEST.png" alt="">
                </div>
                <form class="login-form" onsubmit="modalLoading_aspirante(event)">
                    <div class="formLogin-campo">
                        <label for="username"> <i class="fa-solid fa-right-to-bracket"></i> Nombre completo </label>
                        <input id="username"type="text" required>
                    </div>
                    <div class="formLogin-campo">
                        <label for="middlename"> <i class="fa-solid fa-right-to-bracket"></i> Apellido Paterno </label>
                        <input id="middlename"type="text" required>
                    </div>
                    <div class="formLogin-campo">
                        <label for="middlename"> <i class="fa-solid fa-right-to-bracket"></i> Apellido Materno </label>
                        <input id="lastname"type="text" required>
                    </div>
                    <div class="formLogin-campo">
                        <label for="password"><i class="fa-solid fa-lock"></i> Contraseña</label>
                        <input id="password"type="password" required>
                    </div>
                    <div class="formLogin-campo">
                        <label for="password"><i class="fa-solid fa-lock"></i> Confirmar Contraseña</label>
                        <input id="password"type="password" required>
                    </div>
                    <div class="formLogin-campo">
                        <label for="e-mail"><i class="fa-solid fa-lock"></i> Correo</label>
                        <input id="e-mail"type="e-mail" required>
                    </div>
                    <button class="btn btn_primary">Registrarme <i class="fa-solid fa-right-to-bracket"></i></button>
                </form>
                <div class="formLogin-footer">
                    <img src="build/img/assets/LogoOpenLab.png" alt="">
                    <img src="build/img/assets/LogoIngenierias.png" alt="">
                </div>
            </div>
        </div>
    </main>
</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="build/js/aspirante.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.5/lottie.min.js'></script>
<script>
    var animation = bodymovin.loadAnimation({
        container: document.getElementById('lottie-animation'), // ID del contenedor
        renderer: 'svg', // Puede ser 'canvas', 'html' o 'svg'
        loop: true, // Si la animación debe ciclarse
        autoplay: true, // Si la animación debe empezar automáticamente
        path: 'build/img/lottie/student.json' // Ruta al archivo JSON de la animación
    });
</script>
</html>