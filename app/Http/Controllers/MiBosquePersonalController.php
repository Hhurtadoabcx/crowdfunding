<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use Kreait\Firebase\Factory;
use Illuminate\Http\Request;

class MiBosquePersonalController extends Controller
{
    public function mostrarBosquePersonal()
    {
        // Obtén el UID del usuario autenticado
        $userId = Auth::user()->localId;

        // Configura el SDK de Firebase
        $factory = (new Factory)->withDatabaseUri(env('FIREBASE_DATABASE_URL'));
        $database = $factory->createDatabase();

        // Obtén las donaciones del usuario actual
        $donaciones = $database->getReference('donacion')
            ->orderByChild('id_user')
            ->equalTo($userId)
            ->getValue();

        return view('mi_bosque_personal', ['donaciones' => $donaciones]);
    }
    public function verUbicacion($firebaseId)
    {
        // SDK configuracion
        $factory = (new Factory)->withDatabaseUri(env('FIREBASE_DATABASE_URL'));
        $database = $factory->createDatabase();


        $coordenadas = $database->getReference("proyectista/$firebaseId/coordenadas")->getValue();

        list($latitud, $longitud) = explode(',', $coordenadas);

        // URL de Google Maps
        $urlMaps = "https://www.google.com/maps?q=$latitud,$longitud";


        return redirect($urlMaps);
    }
}
