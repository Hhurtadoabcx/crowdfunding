
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Crowdfunding</title>
    <!--CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <!--FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
</head>
<body>
    @include('layout.navbarUser')
        <div class="container">
            <!-- Barra de navegacion-->

            <!--Seccion de Bienvenida -->
            <div class="welcome-section">
                <div class="header-container">
                    <h2>CrowdFunding</h2>
                </div>
                <div class="text-container">
                    <p class="text-section">Apoya a los proyectos de reforestacion de Bolivia</p>
                </div>
            </div>
            <!-- Mision y arboles plantados -->
            <div class="secciones">

                <div class="donados">
                    <div class="donados-container">
                        <h2 class="header-arboles">Arboles donados</h2>
                        <h3 class="nro-arboles">1.024</h3>
                        <p class="msg">Ayuda a reforestar Santa Cruz.</p>
                        <p class="msg2">
                                Los árboles garantizan que el aire, el agua y los suelos se mantengan limpios y sanos.
                                Cada uno de nosotros puede contribuir:
                                elige cómo quieres actuar y salvaguardar tu futuro.
                        </p>
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
        </div>


</body>
</html>
<?php


?>
