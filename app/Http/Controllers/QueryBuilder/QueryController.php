<?php

namespace App\Http\Controllers\QueryBuilder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{

    //NO FUE NECESARIO CREAR UN MODELO PARA CADA TABLA SOLO SE LLAMO POR EL NOMBRE TAL CUAL ESTA EN LA BASE DE DATOS

    //select * from tblAlojamientos
    // public function destinos(){
    //     $query = DB::table('tblAlojamientos')->get();
    //     dd($query);
    // }

    //select id,ubicacion,estadia from tblAlojamientos
    // public function destinos(){
    //     $query = DB::table('tblAlojamientos')
    //     ->select('id','ubicacion','estadia')
    //     ->get();
    //     dd($query);
    // }

    //select id,ubicacion,estadia from tblAlojamientos where id=75
    // public function destinos(){
    //     $query = DB::table('tblAlojamientos')
    //     ->select('id','ubicacion','estadia')
    //     ->where('id',"=",75)
    //     ->get();
    //     dd($query);
    // }

    //select id,ubicacion,estadia from tblAlojamientos where id<75
    // public function destinos(){
    //     $query = DB::table('tblAlojamientos')
    //     ->select('id','ubicacion','estadia')
    //     ->where('id',"<",75)
    //     ->get();
    //     dd($query);
    // }

    //WHEREIN
    //select id,ubicacion,estadia from tblAlojamientos where id in(75,76)  
    // public function destinos(){
    //     $query = DB::table('tblAlojamientos')
    //     ->select('id','ubicacion','estadia')
    //     ->whereIn('id',[75,76])
    //     ->get();
    //     dd($query);
    // }
    
    //LIKE
    //select id,ubicacion,estadia from tblUsuarios where tblUsuarios like '%@gmail%' 
    // public function destinos(){
    //     $query = DB::table('tblUsuarios')
    //     ->select('id','usuario','email')
    //     ->where('email','LIKE','%@gmail%')
    //     ->get();
    //     dd($query);
    // }

    //seleccionar un alojamiento que tenga una a en el titulo y que cueste entre 30k y 70k
    // public function destinos(){
    //     $query = DB::table('tblAlojamientos')
    //     ->select('id','ubicacion','estadia','costo_persona')
    //     ->where('ubicacion','LIKE','%a%')
    //     ->whereBetween('costo_persona',[30000,70000])
    //     ->get();
    //     dd($query);
    // }

    public function destinos(){
        $query = DB::table('tblPlanes')
        ->select('tblPlanes.id','tblDestinos.destino',
        'tblTipoPlan.nombre','tblPlanes.titulo',
        'tblPlanes.url','tblPlanes.descripcion',
        'tblPlanes.Imagen','tblPlanes.created_at',
        'tblPlanes.updated_at')
        ->join('tblDestinos','tblPlanes.id_destinos', '=', 'tblDestinos.id')
        ->join('tblTipoPlan','tblPlanes.id_tipo','=','tblTipoPlan.id')
        ->get();
        dd($query);
    }
}
