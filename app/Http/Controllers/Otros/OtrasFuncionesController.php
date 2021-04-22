<?php

namespace App\Http\Controllers\Otros;

use App\Http\Controllers\Controller;
use App\Models\models\destinos;
use App\Models\models\tblRecorridos;
use App\Models\models\tblTours;
use Illuminate\Http\Request;

class OtrasFuncionesController extends Controller
{
    //CUIDADO CON LAS "" SON OBLIGATORIAS PARA HACER CONSULTAS 
    //CON VARCHAR QUITAR SIN SON NUMERICOS
    public function filtrarAlojamientos(Request $request){
        $data['query']=destinos::where("costo_persona","<=", $request -> filtrodinero)->get();
        // $data['query']=destinos::get("costo_persona");
        
        
        // var_dump($data);
        //return ($request);
        // return ($data);
        //return ($request ->filtrodinero);
        return view("alojamientos",$data);
    }

    public function filtrarRecorridos(Request $request){
        $data['query']=tblRecorridos::where("costo_persona","<=", $request -> filtrodinero)->get();
        return view("recorridos",$data);
    }

    public function filtrarTours(Request $request){
        $data['query']=tblTours::where("costo_persona","<=", $request -> filtrodinero)->get();
        return view("tours",$data);
    }

}
