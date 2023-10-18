<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Crowdfunding</title>
    <!--CSS -->
    <link rel="stylesheet" href="/css/proyectista.css">
    <!--FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
</head>
<body>
<div class="container">
    @include('layout.navbarProy')
    <div class="disclaimer-section">
        <div class="header-container">
            <h2>Gracias por Crear Proyectos con Nosotros! </h2>
        </div>
        <div class="text-container">
            <p class="text-section">Tu iniciativa es muy importante para la meta que queremos lograr</p>
        </div>
        <div class="boton-container">
            <a href="#" class="boton-donar">
                Donar
            </a>
        </div>
    </div>
    <div class="form-container">
        <div class="text-form">
            <h2 class="text1">Crea una iniciativa de reforestacion.</h2>
            <h2 class="text2">Siga los pasos descritos en el formulario a continuación para crear un proyecto de reforestacion.
                Al finalizar el formulario. los donantes podran contribuir donando al proyecto.</h2>
        </div>
        <div class="form">
            <div class="form-cont">
                <h2 class="form-header">SELECCIONE LOS ARBOLES DISPONIBLES PARA EL PROYECTO</h2>
                <p class="form-p">Haz click en uno de los botones verdes para seleccionar el tipo de árboles y los datos pertinentes al proyecto.</p>
                <form>
                    <div class="checkbox-container">
                        <div class="form-checkboxes">
                            <label class="form-control">
                                <input type="checkbox" name="checkbox" />
                                Totaí
                            </label>
                            <label class="form-control">
                                <input type="checkbox" name="checkbox-checked" checked />
                                Achachairu
                            </label>

                            <label class="form-control">
                                <input type="checkbox" name="checkbox-checked" checked />
                                Copaibó
                            </label>
                        </div>
                        <div class="form-checkboxes">
                            <label class="form-control">
                                <input type="checkbox" name="checkbox" />
                                Toborochi
                            </label>
                            <label class="form-control">
                                <input type="checkbox" name="checkbox-checked" checked />
                                Tajibo
                            </label>
                            <label class="form-control">
                                <input type="checkbox" name="checkbox-checked" checked />
                                Bibosi
                            </label>

                        </div>
                    </div>
                    <fieldset class="fieldset-proyectista">
                        <legend class="legend-proyectista"> Datos personales</legend>
                        <div class="input-container">
                            <div class="form-input">
                                <label class="label-input">Nombre completo</label>
                                <input type="text" class="input" placeholder="Nombre completo">
                            </div>
                        </div>
                        <div class="group-input-container">
                            <div class="form-input">
                                <label class="label-input">C.I</label>
                                <input type="number" class="input" placeholder="C.I">
                            </div>
                            <div class="form-input">
                                <label class="label-input">Correo electronico</label>
                                <input type="email" class="input" placeholder="Correo electrónico">
                            </div>
                        </div>
                        <div class="input-container">
                            <div class="form-input">
                                <label class="label-input">Número de teléfono</label>
                                <input type="text" class="input" placeholder="Número de telf.">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="fieldset-proyecto">
                        <legend class="legend-proyecto">
                            Información del proyecto
                        </legend>
                        <div class="input-container">
                            <div class="form-input">
                                <label class="label-input">Dirección del terreno</label>
                                <input type="text" class="input" placeholder="Dirección del terreno">
                            </div>
                        </div>
                        <div class="group-input-container">
                            <div class="form-input">
                                <label class="label-input">Municipio</label>
                                <input type="number" class="input" placeholder="Municipio">
                            </div>
                            <div class="form-input">
                                <label class="label-input">Metros cuadrados</label>
                                <input type="number" class="input" placeholder="Metros cuadrados">
                            </div>
                        </div>
                        <div class="input-container">
                            <div class="form-input">
                                <label class="label-input">Datos de referencia</label>
                                <input type="text" class="input" placeholder="Datos de referencia">
                            </div>
                        </div>
                    </fieldset>
                    <div class="submit-container">
                        <input type="submit" value="CREAR PROYECTO" class="btn-submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<?php

?>
