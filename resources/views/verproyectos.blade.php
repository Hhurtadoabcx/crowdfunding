<!-- resources/views/verproyectos.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="pragma" content="no-cache">
    <title>Proyecto Crowdfunding</title>
    <!--CSS -->
    <link rel="stylesheet" href="/css/proyectos.css">
    <!--FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
</head>
<body>
@if(auth()->check())
    @if(auth()->user()->email === 'admin@admin.com' || strpos(auth()->user()->email, '@admin') !== false)
        @include('layout.navbarProy') <!-- Navbar para el administrador -->
    @else
        @include('layout.navbarUser') <!-- Navbar para otros usuarios autenticados -->
    @endif
@else
    @include('layout.navbarUser') <!-- Navbar predeterminada para usuarios no autenticados -->
@endif

<div class="container">
    <div class="disclaimer-section">
        <div class="header-container">
            <h2>Proyectos en Curso</h2>
        </div>
        <div class="text-container">
            <p class="text-section">Estos son proyectos a los que puedes apoyar ahora mismo</p>
        </div>
    </div>

    <div class="cards-container">
        @if(count($proyectistas) > 0)
            @foreach($proyectistas as $firebaseId => $proyecto)
                <a href="{{ url('/donar', $firebaseId) }}">
                    <!-- Resto del código -->
                    <div class="card" id="cardClick">
                        <div class="img-avatar">
                            <svg viewBox="0 0 100 100">
                            </svg>
                        </div>
                        <div class="card-text">
                            <div class="portada"></div>
                            <div class="title-total">
                                <div class="title">{{ $proyecto['nombre_completo'] }}</div>
                                <h2> {{$proyecto['nombre_proyecto']}}</h2>
                                <div class="desc">{{$proyecto['datos_ref']}}</div>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        @else
            <div style="text-align: center; margin-top: 50px;">
                <h2 style="color: white;">En este momento no tenemos proyectos en curso</h2>
            </div>
        @endif
    </div>
</div>
</body>

</html>
