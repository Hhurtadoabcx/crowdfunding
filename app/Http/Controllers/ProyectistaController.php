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

        return view('verproyectos', ['proyectistas' => $proyectistas]);
    }


    //Temporal
    public function mostrarArbol($id)
    {
        $factory = (new Factory)
            ->withDatabaseUri(env('FIREBASE_DATABASE_URL'));

        $database = $factory->createDatabase();

        // Accede a la colección 'proyectista' y obtén los datos del proyecto específico
        $proyecto = $database->getReference('proyectista/' . $id)->getValue();

        // Verifica si el proyecto con el ID especificado existe
        if ($proyecto) {
            // Accede al nombre del creador del proyecto
            $nombreCreador = $proyecto['nombre_completo'];
            $correocreador = $proyecto['email'];
            $arboles = [
                ['tipo' => 'Roble', 'precio' => 20],
                ['tipo' => 'Pino', 'precio' => 15],
                ['tipo' => 'Cedro', 'precio' => 25],
            ];
            return view('donacion', compact('arboles', 'nombreCreador', 'correocreador'));
            // Resto de tu lógica...
        } else {
            // Maneja el caso en que el proyecto con el ID especificado no existe
            abort(404);
        }
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
