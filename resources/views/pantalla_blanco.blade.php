<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pantalla en Blanco</title>
    <!-- Agrega aquí cualquier otro recurso que necesites -->
</head>

<body>
<div>
    @if(isset($proyectista))
        <h1>Proyectista: {{ $proyectista['nombre_completo'] }}</h1>
    @else
        <p>Proyectista no encontrado</p>
    @endif
</div>
</body>

</html>
