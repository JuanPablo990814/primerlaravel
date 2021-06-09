<?php

namespace App\Http\Controllers\PackCrud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DB\Destinos;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Auth;
// use Illumminate\Support\Facades\DB;
// use App\Models\models\destinos;

class alojamientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // try{
        //     $data['query']=destinos::get();
        //     // var_dump($data);
        //     return view("alojamientos",$data);
        // }
        // catch(\Exception $ex){
        //     return view("withoutplanes");
        // }
        
        try{
            $data['filtro'] =0;
            $data['query'] = FacadesDB::table('tblPlanes')
            ->select('tblPlanes.id as id','tblDestinos.destino as destino',
            'tblTipoPlan.nombre','tblPlanes.titulo as estadia',
            'tblPlanes.url','tblPlanes.descripcion as descripcion',
            'tblPlanes.Imagen as img','tblPlanes.costo_persona as costo_persona',
            'tblPlanes.created_at',
            'tblPlanes.updated_at')
            ->join('tblDestinos','tblPlanes.id_destinos', '=', 'tblDestinos.id')
            ->join('tblTipoPlan','tblPlanes.id_tipo','=','tblTipoPlan.id')
            ->where([
                ['tblTipoPlan.nombre','=','Alojamientos'],
                ['tblPlanes.estado','=','Activo']
            ])
            ->get();

            if(isset(Auth::user()->email)){
                $data['correo']=Auth::user()->email;
            }
            
            $data['busqueda']="";

            return view("alojamientos",$data);
        }
        catch(\Exception $ex){
            return view("withoutplanes");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}
