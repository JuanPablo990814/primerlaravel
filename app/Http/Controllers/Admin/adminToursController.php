<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\models\tblTours;

class adminToursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['qTours']=tblTours::get();
        return view("adminTours",$data);
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
        $query = new tblTours();
        $query -> ubicacion = $request -> ipUbicacion1;
        $query -> costo_persona = $request -> ipCosto1;
        $query -> descripcion = $request -> ttaDescripcion1;
        $query -> foto = $request -> ipImagen1;
        date_default_timezone_set("America/Bogota");
        $time = time();
        $query -> updated_at = date("d-m-Y H:i:s", $time);
        
        // $query -> url = $url;
        $query -> save();

        return redirect("/adminTours")->with(['msg'=>'Registro creado correctamente','class'=>'alert-success ']);
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
        $query=tblTours::find($id);
        $query -> ubicacion = $request -> ipUbicacion;
        $query -> costo_persona = $request -> ipCosto;
        $query -> descripcion = $request -> ttaDescripcion;
        $query -> foto = $request -> ipImagen;
        date_default_timezone_set("America/Bogota");
        $time = time();
        $query -> updated_at = date("d-m-Y H:i:s", $time);
        
        // $query -> url = $url;
        $query -> save();
        // return "actualiza su registro";
        return redirect('/adminTours')->with(['msg' => 'Registro modificado correctamente', 'class' => 'alert-warning']);
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

            $data=tblTours::find($id);
            $data-> delete();
    
            //llenando la lista de los datos que quedaron
            $data['query']=tblTours::get();
            //return view("admin",$data)->with(['msg'=>'Registro eliminado correctamente.','class'=>'alert-success']);
            return redirect('/adminTours')->with(['msg' => 'Registro eliminado correctamente', 'class' => 'alert-warning alert-dismissible fade show']);
        }
        catch (\Exception $ex){

            //return view("admin",$data)->with(['msg'=>'Ha ocurrido un error: '.$ex,'class'=>'alert-success']);
            return redirect('/adminTours')->with(['msg' => 'El Registro no se pudo eliminar', 'class' => 'alert-danger alert-dismissible fade show']);
        }
    }
}
