<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\models\tblRecorridos;
use App\Models\models\tblTours;

class adminRecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['qRecorrido']=tblRecorridos::get();

        return view("adminRecorridos",$data);
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
        // $url= $this -> getUrl($request -> txtDestino);
        $query = new tblRecorridos();
        $query -> ubicacion = $request -> ipUbicacion1;
        $query -> costo_persona = $request -> ipCosto1;
        $query -> descripcion = $request -> ttaDescripcion1;
        $query -> foto = $request -> ipImagen1;
        date_default_timezone_set("America/Bogota");
        $time = time();
        $query -> updated_at = date("d-m-Y H:i:s", $time);
        
        // $query -> url = $url;
        $query -> save();

        return redirect("/adminRecorridos")->with(['msg'=>'Registro creado correctamente','class'=>'alert-success ']);
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
        $qRecorrido=tblRecorridos::find($id);
        $qRecorrido -> ubicacion = $request -> ipUbicacion;
        $qRecorrido -> costo_persona = $request -> ipCosto;
        $qRecorrido -> descripcion = $request -> ttaDescripcion;
        $qRecorrido -> foto = $request -> ipImagen;
        date_default_timezone_set("America/Bogota");
        $time = time();
        $qRecorrido -> updated_at = date("d-m-Y H:i:s", $time);
        
        // $query -> url = $url;
        $qRecorrido -> save();
        // return "actualiza su registro";
        return redirect('/adminRecorridos')->with(['msg' => 'Registro modificado correctamente', 'class' => 'alert-warning alert-dismissible fade show']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $data=tblRecorridos::find($id);
            $data-> delete();
    
            //llenando la lista de los datos que quedaron
            $data['query']=tblRecorridos::get();
            //return view("admin",$data)->with(['msg'=>'Registro eliminado correctamente.','class'=>'alert-success']);
            return redirect('/adminRecorridos')->with(['msg' => 'Registro eliminado correctamente', 'class' => 'alert-warning alert-dismissible fade show']);
            }catch (\Exception $ex){
            //return view("admin",$data)->with(['msg'=>'Ha ocurrido un error: '.$ex,'class'=>'alert-success']);
            return redirect('/adminRecorridos')->with(['msg' => 'El Registro no se pudo eliminar', 'class' => 'alert-danger alert-dismissible fade show']);
    
            }
    }
}
