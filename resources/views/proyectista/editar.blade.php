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
    <h1>Editar Proyecto</h1>

    @if(isset($proyecto))
        <form action="{{ url('/editar', $proyectoId) }}" method="POST" onsubmit="return submitForm()">
            @csrf
            <label>Datos de referencia:
                <input type="text" name="datos_ref" value="{{ $proyecto['datos_ref'] }}" required>
            </label>
            <br><br>
            <label>Email:
                <input type="email" name="email" value="{{ $proyecto['email'] }}"required>
            </label>
            <br><br>
            <label>Metros cuadrados:
                <input type="number" name="metros_cuadrado" value="{{ $proyecto['metros_cuadrado'] }}" min="{{ $proyecto['metros_cuadrado'] }}" required>
            </label>
            <br><br>
            <label>Nombre completo:
                <input type="text" name="nombre_completo" value="{{ $proyecto['nombre_completo'] }}"required>
            </label>
            <br><br>
            <label>Nombre del proyecto:
                <input type="text" name="nombre_proyecto" value="{{ $proyecto['nombre_proyecto'] }}"required>
            </label>
            <br><br>
            <label>Teléfono:
                <input type="text" name="tel" value="{{ $proyecto['tel'] }}"required>
            </label>
            <br><br>
            <label>Coordenadas:
                <input  id="latitud" name="latitud" placeholder="latitud" type="hidden"required>
                <input  id="longitud" name="longitud" placeholder="longitud" type="hidden"required>
                <input  id="coordenadas" name="coordenadas" placeholder="coordenadas" type="hidden"required>
                <div id="MapDiv" name="mapa" style="height: 300px; width:500px"></div>

            </label>
            <button type="submit">Guardar Cambios</button>
        </form>
    @else
        <p>El proyecto no existe.</p>
    @endif


</div>
</body>
</html>
