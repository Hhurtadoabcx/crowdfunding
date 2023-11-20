<?php

namespace App\Http\Controllers\Firebase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Kreait\Firebase\Database;

class ContactController extends Controller
{

    public function  __construct(Database $database){
        $this->database = $database;
        $this->tablename = 'proyectista';
    }
    public Function index(){


        return view('creaunproyecto');
    }

    public function create(){
        return view('creaunproyecto');
    }

    public function store(Request $request){
        $postData = [
            'checkbox' => $request->checkbox,
            'nombre_completo' => $request->nombre_completo,
            'nombre_proyecto' => $request->nombre_completo,
            'ci' => $request->ci,
            'email' => $request->email,
            'tel' => $request->tel,
            'coordenadas' =>$request->coordenadas,
            'municipio' => $request->municipio,
            'metros_cuadrado' => $request->metros_cuadrado,
            'datos_ref' => $request->datos_ref,

        ];
        $postRef = $this->database->getReference($this->tablename)->push($postData);
        if($postRef){
            return redirect('creaunproyecto')->with('status','Proyectista agregado con exito');
        }
        else{
            return redirect('proyectista')->with('status','Error, no se agrego al proyectista');

        }
    }

}
