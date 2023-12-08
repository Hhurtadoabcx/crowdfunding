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
                    <a href="https://www.linkedin.com/in/sebastian-arze-pando-1690b975/" target="_blank">
                    <img src="https://media.licdn.com/dms/image/D4E03AQHptj8aaoa7fQ/profile-displayphoto-shrink_800_800/0/1682522365279?e=1707350400&v=beta&t=VOeSkVC9QetaNNqj551RwWiVLfrQQTgvXvpGGcZv0Tc" alt="Foto del contribuidor" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Sebastian Arze Pando</h5>
                        <p class="card-text">Product Owner</p>
                        <p class="card-text">sarzep@univalle.edu</p>
                    </div>
                    </a>
                </div>
                <div class="card">
                    <a href="https://www.linkedin.com/in/jos%C3%A9-maria-zapata-paz/">
                    <img src="https://media.licdn.com/dms/image/D4E03AQGKZsX677ZktA/profile-displayphoto-shrink_800_800/0/1691979298224?e=1707350400&v=beta&t=VBCwUw393j2VwUd0N2or33a-QV0uWP9Nv293id7MYbQ" alt="Foto del contribuidor" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">José Maria Zapata Paz</h5>
                        <p class="card-text">SCRUM Master</p>
                        <p class="card-text">josemariazapata12@gmail.com</p>
                    </div>
                    </a>
                </div>
            </div>
            <!-- Desarrolladores -->
            <div class="desarrolladores">
                <div class="card">
                    <a href="https://www.linkedin.com/in/dar%C3%ADo-guzm%C3%A1n-balc%C3%A1zar-53a409288/?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app">
                    <img src="https://media.licdn.com/dms/image/D4D03AQEfdW4n2rfYUQ/profile-displayphoto-shrink_800_800/0/1691974917028?e=1707350400&v=beta&t=RHeOgR2pjdiXecyyPDpz60LHALWbkbDip4ovEqTYGuI" alt="Foto del contribuidor" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Darío Guzmán Balcazár</h5>
                        <p class="card-text">Desarrollador Front End</p>
                        <p class="card-text">gbd6000330@est.univalle.edu</p>
                    </div>
                    </a>
                </div>
                <div class="card">
                    <a href="https://www.linkedin.com/in/hurtadolxyzsc/">
                    <img src="https://media.licdn.com/dms/image/D5603AQGBtrpzr3x3AQ/profile-displayphoto-shrink_800_800/0/1692025248583?e=1707350400&v=beta&t=hEGAKsprp79eptI4oc8bXZqCG9ziXszScikfR6iYyJ8" alt="Foto del contribuidor" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Emanuel Hurtado Leañoz</h5>
                        <p class="card-text">Desarrollador Back End</p>
                        <p class="card-text">hla6000515@est.univalle.edu</p>
                    </div>
                    </a>
                </div>
                <div class="card">
                    <a href="https://www.linkedin.com/in/sergioescalante821/">
                    <img src="https://media.licdn.com/dms/image/D5603AQGYdQEUUprkDw/profile-displayphoto-shrink_800_800/0/1692025213048?e=1707350400&v=beta&t=l9l9yut9glF2Xjpe6N2n6ATJVxXLties7j7NdDSUm0c" alt="Foto del contribuidor" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">Sergio Martín Escalante</h5>
                        <p class="card-text">Desarrollador Back End</p>
                        <p class="card-text">escalantesergio821@gmail.com</p>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
