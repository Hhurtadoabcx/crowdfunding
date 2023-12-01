<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Proyecto</title>
    <script src="/js/maps.js"></script>
    <link rel="stylesheet" href="/css/proyectista.css">
    <!--FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-_omB7z7XO698LS-QdZfcovmFI4XLODM&callback=initMap" async defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
</head>
<body>
<div class="container">
    @if(auth()->check())
        @if(auth()->user()->email === 'admin@admin.com' || strpos(auth()->user()->email, '@admin') !== false)
            @include('layout.navbarProy') <!-- Navbar para el administrador -->
        @else
            @include('layout.navbarUser') <!-- Navbar para otros usuarios autenticados -->
        @endif
    @else
        @include('layout.navbarUser') <!-- Navbar predeterminada para usuarios no autenticados -->
    @endif


    @if(isset($proyecto))

            <div class="form-container">
                <div class="text-form">
                <h1 class="text1">Editar Proyecto</h1>
                </div>
        <div class="form">
            <div class="form-cont">
                <form action="{{ url('/editar', $proyectoId) }}" method="POST" onsubmit="return submitForm()">
                    @csrf
                    <div class="input-container">
                        <div class="form-input">
                            <label class="label-input">Datos de referencia:</label>
                            <input type="text" name="datos_ref" value="{{ $proyecto['datos_ref'] }}" required class="input">
                        </div>
                    </div>

                    <div class="group-input-container">
                        <div class="form-input">
                            <label class="label-input">Email:</label>
                            <input type="email" name="email" value="{{ $proyecto['email'] }}"required class="input">
                        </div>
                        <div class="form-input">
                            <label class="label-input">Metros cuadrados:</label>
                            <input type="number" name="metros_cuadrado" value="{{ $proyecto['metros_cuadrado'] }}" min="{{ $proyecto['metros_cuadrado'] }}" required class="input">
                        </div>
                    </div>
                    <div class="input-container">
                        <div class="form-input">
                            <label class="label-input">Nombre del proyecto:</label>
                            <input type="text" name="nombre_proyecto" value="{{ $proyecto['nombre_proyecto'] }}"required class="input">
                        </div>
                    </div>

                    <div class="input-container">
                        <div class="form-input">
                            <label class="label-input">Nombre completo:</label>
                            <input type="text" class="input" name="nombre_completo" value="{{ $proyecto['nombre_completo'] }}"required>
                        </div>
                    </div>
                    <div class="input-container">
                        <div class="form-input">
                        <label class="label-input">Teléfono:</label>
                        <input type="text" class="input" name="tel" value="{{ $proyecto['tel'] }}"required>
                        </div>
                    </div>

            <label>Coordenadas:
                <input  id="latitud" name="latitud" placeholder="latitud" type="hidden"required>
                <input  id="longitud" name="longitud" placeholder="longitud" type="hidden"required>
                <input  id="coordenadas" name="coordenadas" placeholder="coordenadas" type="hidden"required>
                <div id="MapDiv" name="mapa" style="height: 300px; width:500px"></div>

            </label>
                    <div class="submit-container">
                        <button type="submit" class="btn-submit">Guardar Cambios</button>
                    </div>
                    </form>
            </div>
        </div>
            </div>
    @else
        <p>El proyecto no existe.</p>
    @endif


</div>
</body>
</html>
