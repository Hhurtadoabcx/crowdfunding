<!-- resources/views/mi_bosque_personal.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Crowdfunding</title>
    <!--CSS -->
    <link rel="stylesheet" href="/css/mibosquepersonal.css">
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
    <div class="text-container">
        <h2>Mi Bosque Personal</h2>
    </div>
    <div class="cards-container">
        @if(count($donaciones) > 0)
            @foreach($donaciones as $donacion)
                <div class="card" id="cardClick">
                    <div class="img-avatar">
                        <svg viewBox="0 0 100 100">
                        </svg>
                    </div>
                    <div class="card-text">
                        <div class="portada">
                            <!-- Aquí puedes agregar una imagen o cualquier otro elemento de diseño -->
                        </div>
                        <div class="title-total">
                            <div class="title">{{ $donacion['nombre_proyecto'] }}</div>
                            <h2>Total de Árboles Donados:
                                {{
                                    (isset($donacion['cedro']) ? $donacion['cedro'] : 0) +
                                    (isset($donacion['pino']) ? $donacion['pino'] : 0) +
                                    (isset($donacion['roble']) ? $donacion['roble'] : 0)
                                }}
                            </h2>
                            <div class="desc"><a href="{{ route('verUbicacion', ['firebaseId' => $donacion['id_proyecto']]) }}" class="verubi">Ver ubicación</a></div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div style="text-align: center; margin-top: 50px;">
                <h2 style="color: white;">Aún no tienes árboles en tu bosque :(</h2>
            </div>
        @endif
    </div>
</div>

</body>

</html>
