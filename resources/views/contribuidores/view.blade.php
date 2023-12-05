<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="pragma" content="no-cache">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros</title>

    <link rel="stylesheet" href="/css/contribuitors-views.css">
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
    <div class="contribuidores" style="background-image: linear-gradient(to bottom, #1b7161, #1b7161);">
        <div class="container">
            <!-- Líderes -->
            <div class="lideres">
                <div class="card">
                    <img src="https://generated.photos/vue-static/face-generator/landing/wall/1.jpg" alt="Foto del contribuidor" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Juan Pérez</h5>
                        <p class="card-text">Product Owner</p>
                        <p class="card-text">juan@email.com</p>
                    </div>
                </div>
                <div class="card">
                    <img src="https://generated.photos/vue-static/face-generator/landing/wall/2.jpg" alt="Foto del contribuidor" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">María Rodríguez</h5>
                        <p class="card-text">SCRUM Master</p>
                        <p class="card-text">maria@email.com</p>
                    </div>
                </div>
            </div>
            <!-- Desarrolladores -->
            <div class="desarrolladores">
                <div class="card">
                    <img src="https://generated.photos/vue-static/face-generator/landing/wall/3.jpg" alt="Foto del contribuidor" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Juan Gómez</h5>
                        <p class="card-text">Desarrollador</p>
                        <p class="card-text">juang@email.com</p>
                    </div>
                </div>
                <div class="card">
                    <img src="https://generated.photos/vue-static/face-generator/landing/wall/4.jpg" alt="Foto del contribuidor" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Pedro López</h5>
                        <p class="card-text">Desarrollador</p>
                        <p class="card-text">pedro@email.com</p>
                    </div>
                </div>
                <div class="card">
                    <img src="https://generated.photos/vue-static/face-generator/landing/wall/5.jpg" alt="Foto del contribuidor" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Laura Torres</h5>
                        <p class="card-text">Desarrollador</p>
                        <p class="card-text">laura@email.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
