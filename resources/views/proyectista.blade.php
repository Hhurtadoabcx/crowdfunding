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
    <script src="/js/maps.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-_omB7z7XO698LS-QdZfcovmFI4XLODM&callback=initMap" async defer></script>
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

    </div>
    <div class="form-container">
        <div class="text-form">
            <h2 class="text1">Crea una iniciativa de reforestacion.</h2>
            <h2 class="text2">Siga los pasos descritos en el formulario a continuación para crear un proyecto de reforestacion. Al finalizar el formulario. los donantes podrán contribuir donando al proyecto.</h2>
        </div>
        <div class="form">
            <div class="form-cont">
                <form action="{{ route('proyectista.store') }}" method="POST" onsubmit="return submitForm()">
                    @if(session('status'))
                        <h4> {{session('status')}}</h4>
                    @endif
                    @csrf
                        <div class="checkbox-container">
                            <div class="form-checkboxes">
                                <label class="form-control">
                                    <input type="checkbox" name="checkbox" />
                                    Totaí
                                </label>
                                <label class="form-control">
                                    <input type="checkbox" name="checkbox" />
                                    Achachairu
                                </label>

                                <label class="form-control">
                                    <input type="checkbox" name="checkbox"  />
                                    Copaibó
                                </label>
                            </div>
                            <div class="form-checkboxes">
                                <label class="form-control">
                                    <input type="checkbox" name="checkbox" />
                                    Toborochi
                                </label>
                                <label class="form-control">
                                    <input type="checkbox" name="checkbox"  />
                                    Tajibo
                                </label>
                                <label class="form-control">
                                    <input type="checkbox" name="checkbox"  />
                                    Bibosi
                                </label>

                            </div>
                        </div>
                        <fieldset class="fieldset-proyectista">
                            <legend class="legend-proyectista"> Datos personales</legend>
                            <div class="input-container">
                                <div class="form-input">
                                    <label class="label-input">Nombre completo</label>
                                    <input type="text" class="input" placeholder="Nombre completo" name="nombre_completo">
                                </div>
                            </div>
                            <div class="group-input-container">
                                <div class="form-input">
                                    <label class="label-input">C.I</label>
                                    <input type="number" class="input" placeholder="C.I" name="ci">
                                </div>
                                <div class="form-input">
                                    <label class="label-input">Correo electronico</label>
                                    <input type="email" class="input" placeholder="Correo electrónico" name="email">
                                </div>
                            </div>
                            <div class="input-container">
                                <div class="form-input">
                                    <label class="label-input">Número de teléfono</label>
                                    <input type="text" class="input" placeholder="Número de telf." name="tel">
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
                                    <div id="MapDiv" name="mapa">
                                        <input type="hidden" id="latitud" name="latitud">
                                        <input type="hidden" id="longitud" name="longitud">
                                        <input type="hidden" id="coordenadas" name="coordenadas">
                                    </div>
                                </div>
                            </div>
                            <div class="group-input-container">
                                <div class="form-input">
                                    <label class="label-input">Municipio</label>
                                    <input type="number" class="input" placeholder="Municipio" name="municipio">
                                </div>
                                <div class="form-input">
                                    <label class="label-input">Metros cuadrados</label>
                                    <input type="number" class="input" placeholder="Metros cuadrados" name="metros_cuadrado">
                                </div>
                            </div>
                            <div class="input-container">
                                <div class="form-input">
                                    <label class="label-input">Datos de referencia</label>
                                    <input type="text" class="input" placeholder="Datos de referencia" name="datos_ref">
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
