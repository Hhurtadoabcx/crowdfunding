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
            'nombre' => $request->nombre_completo,
            'ci' => $request->ci,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'metros_cuadrados' => $request->metros_cuadrados,

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
