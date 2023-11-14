
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Crowdfunding</title>
    <!--CSS -->
    <link rel="stylesheet" href="/css/donacion.css">
    <!--FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

</head>

<body>

<div class="container">
@include('layout.navbarProy')
<div class="disclaimer-section">
    <div class="header-container">
        <h2>Gracias por Donar a este proyecto! </h2>
    </div>
    <div class="text-container">
        <p class="text-section">Tu contribucion es muy importante para este proyecto</p>
    </div>

</div>
    <div class="secciones">
        <div class="seccion-arbol">
                <div class="text-arboles">
                    <h2>Zonas disponibles</h2>
                </div>
            <div class="arboles-disponibles">
                <div class="arboles-container">
                    <form>
                        <div class="checkbox-container">
                            <div class="form-checkboxes">
                                <div class="label-cont">
                                <label class="form-control">
                                   <h2 class="text-label">Totai</h2>
                                    <input class="numberstyle" type="number" min="1" step="1" value="1">
                                </label>
                                </div>
                                <div class="label-cont">
                                    <label class="form-control">
                                        <h2 class="text-label">Achachairu</h2>
                                        <input class="numberstyle" type="number" min="1" step="1" value="1">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
        </div>
        <div class="mision">
            <div class="recibo-cont">
                <div class="recibo">

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php

?>
