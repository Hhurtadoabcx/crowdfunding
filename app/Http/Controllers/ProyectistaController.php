<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Kreait\Firebase\Factory;
use Illuminate\Support\Facades\Auth;



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

    public function gestionarProyectos()
    {
        $factory = (new Factory)
            ->withDatabaseUri(env('FIREBASE_DATABASE_URL'));

        $database = $factory->createDatabase();

        $uid = Auth::user()->localId;

        $proyectos = $database->getReference('proyectista')->orderByChild('uid')->equalTo($uid)->getValue();

        if ($proyectos) {
            return view('gestionar', ['proyectos' => $proyectos]);
        } else {
            return view('gestionar', ['mensaje' => 'No tienes proyectos. ¡Crea uno ahora!']);
        }
    }

    public function editarProyecto($proyectoId, Request $request)
    {
        $factory = (new Factory)
            ->withDatabaseUri(env('FIREBASE_DATABASE_URL'));

        $database = $factory->createDatabase();

        $proyecto = $database->getReference('proyectista/' . $proyectoId)->getValue();

        if ($proyecto) {
            if ($request->isMethod('post')) {
                $datosRef = $request->input('datos_ref');
                $email = $request->input('email');
                $metrosCuadrado = $request->input('metros_cuadrado');
                $nombreCompleto = $request->input('nombre_completo');
                $nombreProyecto = $request->input('nombre_proyecto');
                $tel = $request->input('tel');
                $coordenadas = $request->input('coordenadas');

                $database->getReference('proyectista/' . $proyectoId)->update([
                    'datos_ref' => $datosRef,
                    'email' => $email,
                    'metros_cuadrado' => $metrosCuadrado,
                    'nombre_completo' => $nombreCompleto,
                    'nombre_proyecto' => $nombreProyecto,
                    'tel' => $tel,
                    'coordenadas' => $coordenadas,
                ]);

                return redirect('/gestionar')->with('status', 'Cambios guardados exitosamente!');
            } else {
                return view('proyectista.editar', ['proyecto' => $proyecto, 'proyectoId' => $proyectoId]);
            }
        } else {
            abort(404);
        }
    }
    public function mostrarArbol($id)
    {
        $factory = (new Factory)
            ->withDatabaseUri(env('FIREBASE_DATABASE_URL'));

        $database = $factory->createDatabase();

        $proyecto = $database->getReference('proyectista/' . $id)->getValue();

        if ($proyecto) {
            $nombreCreador = $proyecto['nombre_completo'];
            $correocreador = $proyecto['email'];
            $arboles = [
                ['tipo' => 'Roble', 'precio' => 20],
                ['tipo' => 'Pino', 'precio' => 15],
                ['tipo' => 'Cedro', 'precio' => 25],
            ];

            $proyectoId = $id;

            return view('donacion', compact('arboles', 'nombreCreador', 'correocreador', 'proyectoId'));
        } else {
            abort(404);
        }
    }
    public function guardarDonacion(Request $request, $proyectoId)
    {
        $userId = Auth::user()->localId;
        $userName = Auth::user()->displayName;
        $arbolesSeleccionados = $request->input('arboles');
        $this->guardarDonacionEnFirebase($userId, $userName, $proyectoId, $arbolesSeleccionados);
        return redirect()->route('mostrarArbol', ['id' => $proyectoId])->with('donacionExitosa', true);
    }
    private function guardarDonacionEnFirebase($userId, $userName, $proyectoId, $arbolesSeleccionados)
    {
        $factory = (new Factory)->withDatabaseUri(env('FIREBASE_DATABASE_URL'));
        $database = $factory->createDatabase();
        $proyectoRef = $database->getReference('proyectista/' . $proyectoId);
        $proyecto = $proyectoRef->getValue();
        $actualizaciones = [];
        foreach ($arbolesSeleccionados as $arbol) {
            $tipoArbol = strtolower($arbol['tipo']);  // Convertir el tipo de árbol a minúsculas para evitar problemas de mayúsculas y minúsculas
            $cantidadExistente = isset($proyecto[$tipoArbol]) ? $proyecto[$tipoArbol] : 0;
            $cantidadNueva = $cantidadExistente + intval($arbol['cantidad']);
            $actualizaciones[$tipoArbol] = $cantidadNueva;
        }
        $donacionExistente = $database->getReference('donacion')
            ->orderByChild('id_user_id_proyecto')
            ->equalTo($userId . '_' . $proyectoId)
            ->getValue();
        if ($donacionExistente) {
            $donacionId = key($donacionExistente);
            $database->getReference('donacion/' . $donacionId)->update($actualizaciones);
        } else {
            $existingUid = $database->getReference('donacion_uids')
                ->orderByChild('id_user_id_proyecto')
                ->equalTo($userId . '_' . $proyectoId)
                ->getValue();
            if ($existingUid) {
                $uid = current($existingUid)['uid'];
            } else {
                $uid = $database->getReference('donacion_uids')->push()->getKey();
                $database->getReference('donacion_uids/' . $uid)->set([
                    'id_user_id_proyecto' => $userId . '_' . $proyectoId,
                    'uid' => $uid,
                ]);
            }
            $data = [
                'id_user' => $userId,
                'name' => $userName,
                'id_proyecto' => $proyectoId,
            ];
            $data += $actualizaciones;
            $database->getReference('donacion/' . $uid)->set($data);
        }
    }
}
