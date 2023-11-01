<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;

class ContactController extends Controller
{
    protected $database;
    protected $tablename = 'proyectista';

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function index()
    {
        return view('creaunproyecto');
    }

    public function create()
    {
        return view('creaunproyecto');
    }

    public function store(Request $request)
    {
        // Verifica si se proporcionaron coordenadas en la solicitud
        if ($request->has('latitud') && $request->has('longitud')) {
            $latitud = $request->latitud;
            $longitud = $request->longitud;

            // Guarda los datos en la base de datos
            $postData = [
                'checkbox' => $request->checkbox,
                'nombre_completo' => $request->nombre_completo,
                'ci' => $request->ci,
                'email' => $request->email,
                'tel' => $request->tel,
                'latitud' => $latitud,
                'longitud' => $longitud,
                'municipio' => $request->municipio,
                'metros_cuadrados' => $request->metros_cuadrados,
                'datos_ref' => $request->datos_ref,
            ];

            // Guarda los datos en la base de datos de Firebase
            $this->database->getReference($this->tablename)->push($postData);

            return redirect('creaunproyecto')->with('status', 'Proyectista agregado con éxito');
        } else {
            // Maneja el caso en el que no se proporcionaron coordenadas
            return redirect('creaunproyecto')->with('status', 'Error, no se proporcionaron coordenadas');
        }
    }
}
