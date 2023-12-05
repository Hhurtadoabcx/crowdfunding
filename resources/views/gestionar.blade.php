<!-- resources/views/ver_proyectos.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Crowdfunding</title>
    <!--CSS -->
    <link rel="stylesheet" href="/css/gestionar.css">
    <!--FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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

    <div class="disclaimer-section">
        <div class="header-container">
            <h2>Proyectos en Curso</h2>
        </div>
        <div class="text-container">
            <p class="text-section">Estos son proyectos a los que puedes apoyar ahora mismo</p>
        </div>
    </div>

    @if(isset($proyectos) && count($proyectos) > 0)
        <div class="cards-container">
            @foreach($proyectos as $firebaseId => $proyecto)
                <a href="{{ url('/donar', $firebaseId) }}">
                    <div class="card" id="cardClick">
                        <div class="img-avatar">
                            <svg viewBox="0 0 100 100">
                            </svg>
                        </div>
                        <div class="card-text">
                            <div class="portada">
                            </div>
                            <div class="title-total">
                                <div class="title">{{ $proyecto['nombre_completo'] }}</div>
                                <h2>{{ $proyecto['nombre_proyecto'] }}</h2>
                                <div class="desc">{{$proyecto['datos_ref']}}</div>
                                <p>Total de Árboles Donados:
                                    {{
                                        (isset($proyecto['cedro']) ? $proyecto['cedro'] : 0) +
                                        (isset($proyecto['pino']) ? $proyecto['pino'] : 0) +
                                        (isset($proyecto['roble']) ? $proyecto['roble'] : 0)
                                    }}
                                </p>
                                <a href="{{ url('/editar', $firebaseId) }}">
                                    <button>Editar</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <div class="no-proyectos-message">
            <p>{{ isset($mensaje) ? $mensaje : 'No tienes proyectos. ¡Crea uno ahora!' }}</p>
        </div>
    @endif

</div>
</body>

</html>
