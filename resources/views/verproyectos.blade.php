<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Crowdfunding</title>
    <!--CSS -->
    <link rel="stylesheet" href="/css/proyectos.css">
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
            <h2>Proyectos en Curso</h2>
        </div>
        <div class="text-container">
            <p class="text-section">Estos son proyectos a los que puedes apoyar ahora mismo</p>
        </div>

    </div>
    <div class="cards-container">
        @foreach($proyectistas as $firebaseId => $proyecto)
            <a href="{{ url('/donar', $firebaseId) }}">
                <!-- Resto del código -->
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
                        <h2> {{$proyecto['nombre_proyecto']}}


                        </h2>

                        <div class="desc">Morgan has collected ants since they were six years old and now has many dozen ants but none in their pants.</div>


                    </div>
                </div>
            </div></a>
        @endforeach

    </div>
</div>
</body>

</html>
