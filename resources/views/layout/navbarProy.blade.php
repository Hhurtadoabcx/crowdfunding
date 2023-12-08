<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="/css/styleNavbar.css">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
    <script>
        function confirmLogout() {
            if (confirm('¿Estás seguro de que deseas desconectar tu cuenta?')) {
                document.getElementById('logout-form').submit();
            }
        }
    </script>
</head>
<body>
<ul class="nav-links">
    <li class="titulo">Tarumá</li>
    <li class="upward"><a href="/verproyectos">Ver Proyectos</a></li>
    <li class="upward"><a href="/gestionar">Gestionar Proyecto</a></li>
    <li class="upward"><a href="/creaunproyecto">Registrar Proyecto</a></li>
    <li class="upward"><a href="/quienessomos">Quienes Somos</a></li>
    <li class="upward"><a href="mision">Mision</a></li>
    <li class="upward">
        @auth
            <a href="/mi_bosque_personal">Mi Bosque Personal</a>
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


</body>
</html>
