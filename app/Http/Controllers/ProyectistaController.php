<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProyectistaRepository;
use App\Adapters\FirebaseAdapter;

class ProyectistaController extends Controller
{
    private $databaseAdapter;

    public function __construct(FirebaseAdapter $databaseAdapter)
    {
        $this->databaseAdapter = $databaseAdapter;
    }

    public function store(Request $request)
    {
        // Obtén los datos del formulario
        $data = $request->only(['nombre_completo', 'ci', 'email', 'telefono', 'direccion', 'metros_cuadrados']);

        // Llamada al método del adaptador para crear un proyectista
        $this->databaseAdapter->create($data);

        return redirect()->back()->with('success', 'Proyecto creado exitosamente!');
    }

    public function mostrarProyectos()
    {
        // Llamada al método del adaptador para obtener todos los proyectistas
        $proyectistas = $this->databaseAdapter->getAll();

        return view('verproyectos', ['proyectistas' => $proyectistas]);
    }
}

