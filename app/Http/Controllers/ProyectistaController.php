<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;

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
        $nombreProyecto = $request->input('nombre_proyecto');
        $direccion = $request->input('direccion');
        $metrosCuadrado = $request->input('metros_cuadrado');

        // Configura el SDK de Firebase
        $factory = (new Factory)->withServiceAccount(base_path(env('FIREBASE_CREDENTIALS')));
        $firestore = $factory->createFirestore();

        // Accede a la colección 'proyectista' y guarda los datos
        $firestore->collection('proyectista')->add([
            'nombre_completo' => $nombreCompleto,
            'ci' => $ci,
            'email' => $email,
            'nombre_proyecto' => $nombreProyecto,
            'coordenadas' => $coordenadas,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'metros_cuadrado' => $metrosCuadrado,
        ]);
        return redirect()->back()->with('status', 'Proyecto creado exitosamente!');
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
    //para calcular el total de los arboles lo puse dentro de donaciones.js y le cambie aqui
        return view('donacion', compact('arboles'));
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
