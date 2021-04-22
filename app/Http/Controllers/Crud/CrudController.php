<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\models\destinos;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        // //verificacion 1 de datos desde la base de datos
        //$query = destinos::Get();
        //dd($query); //para ver el array7
        
        //$html="";
        // foreach($query as $c){
        //     $html.= $c -> id." ".$c -> ubicacion." <strong>valor:".$c -> costo_persona."</strong><br>"; 
        // }
        //return $html;
        //---------------------------------------------------------

        //return view("crud2.tours",$query) cuando es dentro de una carpeta de views
        
        
        // $data['query']=destinos::get();
        
        // return view("tours",$data);
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
        //$url=$this-> getUrl($request-> txtDestino);
        //$query = new destinos();
        
        //$query ->columnadebasededatos
        //$query -> url = $url
        //$query->save();

        //return $request;
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
        return "Muestra todos los datos de la base de datos id: ".$id;
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
        //$quert = destinos::find($id);
        //$query-> delete();

        //return "Eliminar un registro segun su id: ".$id;
    }
}
