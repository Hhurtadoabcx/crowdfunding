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
        $proyectoRef = $database->getReference('proyectista/' . $id);

        // Obtiene una instancia de la base de datos de Firebase
        $proyecto = $proyectoRef->getValue();

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

            $nuevaDonacion = request()->input('totalDonacion');

            // Actualiza o crea el índice "lotes" en la base de datos
            $proyectoRef->getChild('lotes')->set([
                'totalDonacion' => $nuevaDonacion
            ]);

            return view('donacion', compact('arboles', 'nombreCreador', 'correocreador', 'id'));
        } else {
            // Maneja el caso en que el proyecto con el ID especificado no existe
            abort(404);
        }
    }

    public function confirmarDonacion(Request $request)
    {
        // Aquí maneja la confirmación de la donación en el servidor
        $idProyecto = $request->input('idProyecto');

        // Realiza la lógica necesaria para actualizar o crear el índice "lotes" en Firebase
        $database = app('firebase.database');
        $proyectoRef = $database->getReference('proyectista/' . $idProyecto);

        // Obtén el valor actual del proyecto
        $proyecto = $proyectoRef->getValue();

        if ($proyecto) {
            // Proyecto existe, actualiza o crea el índice "lotes"
            $proyectoRef->getChild('lotes')->update([
                'totalDonacion' => $request->input('totalDonacion')
            ]);
        } else {
            // Maneja el caso en que el proyecto con el ID especificado no existe
            abort(404);
        }

        return response()->json(['success' => true]);
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
