<?php

namespace App\Http\Controllers;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Database;

use Illuminate\Http\Request;

class ProyectistaController extends Controller
{
    public function store(Request $request)
    {
        // Obtén los datos del formulario
        $nombreCompleto = $request->input('nombre_completo');
        $ci = $request->input('ci');
        $email = $request->input('email');
        $coordenadas = $request->input('coordenadas');
        $telefono = $request->input('telefono');
        $direccion = $request->input('direccion');
        $metrosCuadrados = $request->input('metros_cuadrados');

        // Configura el SDK de Firebase
        $factory = (new Factory)->withServiceAccount(base_path(env('FIREBASE_CREDENTIALS')));
        $firestore = $factory->createFirestore();

        // Accede a la colección 'proyectista' y guarda los datos
        $firestore->collection('proyectista')->add([
            'nombre_completo' => $nombreCompleto,
            'ci' => $ci,
            'email' => $email,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'coordenadas' => $coordenadas,
        'metros_cuadrados' => $metrosCuadrados,
        ]);

        return redirect()->back()->with('success', 'Proyecto creado exitosamente!');
    }

    public function mostrarProyectos()
    {
        $factory = (new Factory)
            ->withDatabaseUri(env('FIREBASE_DATABASE_URL'));

        $database = $factory->createDatabase();

        $proyectistas = $database->getReference('proyectista')->getValue();

        //dd($proyectistas); // Esto imprimirá el contenido de $proyectistas en la consola

        return view('verproyectos', ['proyectistas' => $proyectistas]);
    }

    public function pantallaBlanco($nombreCompleto)
    {
        $factory = (new Factory)
            ->withDatabaseUri(env('FIREBASE_DATABASE_URL'));

        $database = $factory->createDatabase();

        $proyectista = $database->getReference('proyectista')
            ->orderByChild('nombre_completo')
            ->equalTo($nombreCompleto)
            ->getValue();

        return view('pantalla_blanco', ['proyectista' => reset($proyectista)]);
    }




}
