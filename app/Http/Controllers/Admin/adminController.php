<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\models\destinos;
use App\Models\models\tblRecorridos;
use App\Models\models\tblTours;
use Mockery\Undefined;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['query']=destinos::get();
        // $data['qRecorrido']=tblRecorridos::get();
        // $data['qTours']=tblTours::get();
        if(count($data['query'])==0){
            return view("noadAlo");
        }
        else{  
            return view("admin",$data);
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
        try{
            // $url= $this -> getUrl($request -> txtDestino);
            $query = new destinos();
            $query -> ubicacion = $request -> ipUbicacion1;
            $query -> estadia = $request -> ipAlojamiento1;
            $query -> costo_persona = $request -> ipCosto1;
            $query -> descripcion = $request -> ttaDescripcion1;
            $query -> foto = $request -> ipImagen1;
            date_default_timezone_set("America/Bogota");
            $time = time();
            $query -> updated_at = date("d-m-Y H:i:s", $time);
            
            // $query -> url = $url;
            $query -> save();

            return redirect("/admin")->with(['msg'=>'Registro creado correctamente','class'=>'alert-success ']);
        }catch(\Exception $ex){
            return redirect("/admin")->with(['msg'=>'Error al crear registro','class'=>'alert-danger ']);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            //return "Muestra todos los datos de la base de datos id: ".$id;
            $data=destinos::find($id);
            
            //llenando la lista de los datos que quedaron
            $data['query']=destinos::get();
            return view("admin",$data);
        }
        catch(\Exception $ex){
            return($ex);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['query']=destinos::findOrFail($id);
        dd($data['query']);

        // return "carga un formulario para editar un registro existente: ".$id;
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
        try{
            // $url= $this -> getUrl($request -> ipUbicacion);
            $query=destinos::find($id);
            $query -> ubicacion = $request -> ipUbicacion;
            $query -> estadia = $request -> ipAlojamiento;
            $query -> costo_persona = $request -> ipCosto;
            $query -> descripcion = $request -> ttaDescripcion;
            $query -> foto = $request -> ipImagen;
            date_default_timezone_set("America/Bogota");
            $time = time();
            $query -> updated_at = date("d-m-Y H:i:s", $time);
            
            // $query -> url = $url;
            $query -> save();
            // return "actualiza su registro";
            return redirect('/admin')->with(['msg' => 'Registro modificado correctamente', 'class' => 'alert-warning alert-dismissible fade show']);
        }catch(\Exception $ex){
            return redirect('/admin')->with(['msg' => 'Error al modificar registro', 'class' => 'alert-danger alert-dismissible fade show']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //borrando datos
        try{
        $data=destinos::find($id);
        $data-> delete();

        //llenando la lista de los datos que quedaron
        $data['query']=destinos::get();
        //return view("admin",$data)->with(['msg'=>'Registro eliminado correctamente.','class'=>'alert-success']);
        return redirect('/admin')->with(['msg' => 'Registro eliminado correctamente', 'class' => 'alert-warning alert-dismissible fade show']);
        }catch (\Exception $ex){
        //return view("admin",$data)->with(['msg'=>'Ha ocurrido un error: '.$ex,'class'=>'alert-success']);
        return redirect('/admin')->with(['msg' => 'El Registro no se pudo eliminar', 'class' => 'alert-danger alert-dismissible fade show']);

        }
    
    }
}
