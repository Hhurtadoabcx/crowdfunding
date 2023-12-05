<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/styleNavbar.css">
    <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="pragma" content="no-cache">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
</head>
<body>
<ul class="nav-links">
    <li class="titulo">CrowdFunding</li>
    <li class="upward"><a href="/verproyectos">Ver Proyectos</a></li>
    <li class="upward"><a href="/quienessomos">Quienes Somos</a></li>
    <li class="upward"><a href="/mision">Mision</a></li>
    <li class="upward">
        @auth
            <a href="{{ route('mi_bosque_personal') }}">Mi Bosque Personal</a>
        @else
            <a href="{{ route('login') }}">Mi Bosque Personal</a>
        @endauth
    </li>

    @auth
        <li class="upward">
            <a href="#" onclick="confirmLogout()">Desconectar</a>
        </li>
    @endauth
</ul>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<script>
    function confirmLogout() {
        if (confirm('¿Estás seguro de que deseas desconectar tu cuenta?')) {
            document.getElementById('logout-form').submit();
        }
    }
</script>
</body>
</html>
