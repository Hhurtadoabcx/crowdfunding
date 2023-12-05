<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Crowdfunding</title>
    <!--CSS -->
    <link rel="stylesheet" href="/css/donacion.css">
    <!--FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="/js/donaciones.js"></script>
    <script>
        var arboles = @json($arboles);
    </script>
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
            <h2>Gracias por Donar a este proyecto! </h2>
        </div>
        <div class="text-container">
            <p class="text-section">Tu contribucion es muy importante para este proyecto</p>
        </div>
    </div>
    <div class="secciones">
        <div class="seccion-arbol">
            <div class="text-arboles">
                <h2>Árboles disponibles</h2>
            </div>
            <div class="arboles-disponibles">
                <div class="arboles-container">
                    <form method="post" action="{{ route('guardarDonacion', ['proyectoId' => $proyectoId]) }}">
                        @csrf
                        <div class="form-checkboxes">
                            @foreach($arboles as $index => $arbol)
                                <div class="label-cont">
                                    <label class="form-control">
                                        <h2 class="text-label">{{ $arbol['tipo'] }}</h2>
                                        <input type="hidden" name="arboles[{{ $index }}][tipo]" value="{{ $arbol['tipo'] }}">
                                        <input type="hidden" name="arboles[{{ $index }}][precio]" value="{{ $arbol['precio'] }}">
                                        <input name="arboles[{{ $index }}][cantidad]" id="arbol{{ $index }}" class="numberstyle" type="number" min="0" step="1" value="0" oninput="calcularTotal()">
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="boton">
                        <button type="submit" class="boton-confirmar">Confirmar Donación</button>
                        </div>
                    </form>
                    <div class="cont-info">
                        <h2>Creador del proyecto: {{ $nombreCreador }}</h2>
                        <h2>Correo del creador: {{$correocreador}}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="mision">
            <div class="text-recibo">
                <h2>Más Detalles</h2>
            </div>
            <div class="recibo-cont">
                @if(session('donacionExitosa'))
                    <div class="alert alert-success" role="alert">
                        Donación realizada con éxito.
                    </div>
                @endif
                <div class="recibo">
                    <div class="recibo-box">
                        <h2>Árboles Seleccionados: </h2>
                        <div id="arbolesSeleccionados"></div>
                        <h2>Total de la donación: </h2>
                        <div id="totalDonacion"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
