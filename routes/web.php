<?php

interface RouteStrategy
{
    public function handleRequest();
}

class HomeRoute implements RouteStrategy
{
    public function handleRequest()
    {
        return view('home');
    }
}

class AboutUsRoute implements RouteStrategy
{
    public function handleRequest()
    {
        return view('contribuidores.view');
    }
}

class CreateProjectRoute implements RouteStrategy
{
    public function handleRequest()
    {
        return view('proyectista');
    }
}

class ViewProjectsRoute implements RouteStrategy
{
    private $proyectistaController;

    public function __construct(ProyectistaController $proyectistaController)
    {
        $this->proyectistaController = $proyectistaController;
    }

    public function handleRequest()
    {
        return $this->proyectistaController->mostrarProyectos();
    }
}
class Router
{
    private $routeStrategy;

    public function __construct(RouteStrategy $routeStrategy)
    {
        $this->routeStrategy = $routeStrategy;
    }

    public function executeStrategy()
    {
        return $this->routeStrategy->handleRequest();
    }
}



use App\Http\Controllers\ProyectistaController;

Route::get('/', function () {
    $strategy = new Router(new HomeRoute());
    return $strategy->executeStrategy();
});

Route::get('/quienessomos', function () {
    $strategy = new Router(new AboutUsRoute());
    return $strategy->executeStrategy();
});

Route::get('/creaunproyecto', function () {
    $strategy = new Router(new CreateProjectRoute());
    return $strategy->executeStrategy();
});

Route::get('/verproyectos', function () {
    $strategy = new Router(new ViewProjectsRoute(app(ProyectistaController::class)));
    return $strategy->executeStrategy();
});

// Otras rutas y configuraciones...

