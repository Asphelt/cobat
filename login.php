<?php

?> 
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
<body class="fondo_alumno">
<main class="index-area">
        <div class="index-container">
            <div class="index-hero">
                <h1 class="hero-header"><span>Cobat 15</span> </h1>
                <div class="hero-img" id="lottie-animation"></div>
                <div clas="hero-footer">Se parte de la experiencia Cobat.</div>
            </div>
            <div class="index-login">
                <div class="login-header">Bienvenido  </div>
                <div class="login-logo">
                    <img src="build/img/assets/LogoIEST.png" alt="">
                </div>
                <form class="login-form" onsubmit="modalLoading_login(event)">
                    <div class="formLogin-campo">
                        <label for="username"> <i class="fa-solid fa-right-to-bracket"></i> Correo </label>
                        <input id="username"type="email" required>
                    </div>
                    <div class="formLogin-campo">
                        <label for="password"><i class="fa-solid fa-lock"></i> Contraseña</label>
                        <input id="password"type="password" required>
                    </div>
                    <button class="btn btn_primary">Iniciar Sesión <i class="fa-solid fa-right-to-bracket"></i></button>
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
<script src="build/js/login.js"></script>
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