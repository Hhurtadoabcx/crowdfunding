<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Crowdfunding</title>
    <!--CSS -->
    <link rel="stylesheet" href="/css/mision.css">
    <!--FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
</head>
<body>
<div class="container">
    <!-- Barra de navegacion-->
    @if(auth()->check())
        @if(auth()->user()->email === 'admin@admin.com' || strpos(auth()->user()->email, '@admin') !== false)
            @include('layout.navbarProy') <!-- Navbar para el administrador -->
        @else
            @include('layout.navbarUser') <!-- Navbar para otros usuarios autenticados -->
        @endif
    @else
        @include('layout.navbarUser') <!-- Navbar predeterminada para usuarios no autenticados -->
    @endif

    <!--Seccion de Bienvenida -->
    <div class="welcome-section">
        <div class="header-container">
            <h2>Nuestra Misión</h2>
        </div>
        <div class="text-container">
            <p class="text-section">Ayudar a reforestar Santa Cruz</p>
        </div>

    </div>
    <!-- Mision y arboles plantados -->
    <div class="secciones">
        <div class="donados">
            <div class="donados-container">
                <h2 class="header-arboles">Nuestra Misión</h2>
                <p class="msg">Somos Tarumá</p>
                <p class="msg2">
                    Tarumá es un portal Crowdfunding, que busca apoyar a todas las iniciativas de reforestacion,
                    dandoles facilidad para recibir donaciones y exposicion a gente dispuesta a colaborar
                </p>
                <a href="/verproyectos" class="boton-donar">
                    Ver Proyectos
                </a>
            </div>
        </div>
        <div class="mision">
            <div class="image-div"></div>
            <!--<div class="mision-div">
                <h2 class="header-mision">Nuestra Mision</h2>
                <p class="body-mision">
                    Apoyar a todas las iniciativas de reforestacion en el departamento de Santa Cruz,
                    otorgando la facilidad de apoyar estos proyectos.
                </p>
                <p>

                </p> -->
        </div>
    </div>
</div>



</body>
</html>
<?php
