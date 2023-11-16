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


    //Temporal
    public function mostrarArbol()
    {
        $arboles = [
            ['tipo' => 'Roble', 'precio' => 20],
            ['tipo' => 'Pino', 'precio' => 15],
            ['tipo' => 'Cedro', 'precio' => 25],
        ];

        return view('donacion', ['arboles' => $arboles]);
    }
    //No funciona debido a que no estan los arboles en el realtime database

    /*
    public function mostrarArbol()
    {
        $factory = (new Factory)
            ->withDatabaseUri(env('FIREBASE_DATABASE_URL'));

        $database = $factory->createDatabase();

        $arboles = $database->getReference('arbol')->getValue();

        return view('donacion', ['arboles' => $arboles]);
    }
    */
}
