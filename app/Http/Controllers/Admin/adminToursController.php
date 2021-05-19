<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\models\tblTours;
use App\Models\DB\Planes;
use Illuminate\Support\Facades\DB as FacadesDB;

class adminToursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['qTours']=tblTours::get();
        $data['qTours'] = FacadesDB::table('tblPlanes')
        ->select('tblPlanes.id as id','tblDestinos.destino as destino',
        'tblTipoPlan.nombre','tblPlanes.titulo as titulo',
        'tblPlanes.url','tblPlanes.descripcion as descripcion',
        'tblPlanes.Imagen as img','tblPlanes.costo_persona as costo_persona',
        'tblPlanes.created_at',
        'tblPlanes.updated_at')
        ->join('tblDestinos','tblPlanes.id_destinos', '=', 'tblDestinos.id')
        ->join('tblTipoPlan','tblPlanes.id_tipo','=','tblTipoPlan.id')
        ->where('tblTipoPlan.nombre','=','Tours')
        ->get();
        // dd($data);
        if(count($data['qTours'])==0){
            return view("noadTo");
        }
        else{  
            
            return view("adminTours",$data);
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
            $query = new Planes();
            $query -> id_destinos = $request -> selDestino1;
            //1 por ser alojamiento
            $query -> id_tipo =3;
            $query -> titulo = $request -> ipAlojamiento1;
            $query -> url = $this -> getUrl($request -> ipAlojamiento1);
            $query -> costo_persona = $request -> ipCosto1;
            $query -> descripcion = $request -> ttaDescripcion1;
            $query -> Imagen = $request -> ipImagen1;
            date_default_timezone_set("America/Bogota");
            $time = time();
            $query -> updated_at = date("d-m-Y H:i:s", $time);
            $query -> save();

            return redirect("/adminTours")->with(['msg'=>'Registro creado correctamente','class'=>'alert-success ']);

        }catch(\Exception $ex){
            return redirect("/adminTours")->with(['msg'=>'Error al crear registro','class'=>'alert-danger ']);
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
        try{
            $query=Planes::find($id);
            $query -> id_destinos = $request -> selDestino;
            //2 por que es tipo recorridos
            $query -> id_tipo = 3;
            $query -> titulo = $request -> ipAlojamiento;
            $query -> url = $this -> getUrl($request -> ipAlojamiento);
            $query -> costo_persona = $request -> ipCosto;
            $query -> descripcion = $request -> ttaDescripcion;
            $query -> Imagen = $request -> ipImagen;
            date_default_timezone_set("America/Bogota");
            $time = time();
            $query -> updated_at = date("d-m-Y H:i:s", $time);
            // dd($query);
            $query -> save();
            // return "actualiza su registro";
            return redirect('/adminTours')->with(['msg' => 'Registro modificado correctamente', 'class' => 'alert-warning']);
        }catch(\Exception $ex){
            return redirect("/adminTours")->with(['msg'=>'Error al modificar registro','class'=>'alert-danger ']);
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
        try
        {
            $data=Planes::find($id);
            $data-> delete();

            return redirect('/adminTours')->with(['msg' => 'Registro eliminado correctamente', 'class' => 'alert-warning alert-dismissible fade show']);
        }
        catch (\Exception $ex){
                
            return redirect('/adminTours')->with(['msg' => 'El Registro no se pudo eliminar', 'class' => 'alert-danger alert-dismissible fade show']);
        }
    }

    private static function getUrl( $str = '')
    {
        $buscar = 'áéíóúÁÉÍÓÚàèìòùÀÈÌÒÙâêîôûÂÊÎÔÛäëïöüÄËÏÖÜñÑÜü ';
        $cambiar = 'aeiouaeiouaeiouaeiouaeiouaeiouaeiouaeiounnuu-';
        $patron = '([^A-Za-z0-9-.])';

        $url_titulo = trim($str);
        $url_titulo = strtr(utf8_decode($url_titulo), utf8_decode($buscar), utf8_decode($cambiar));
        $url_titulo = preg_replace(utf8_decode($patron), "", utf8_decode($url_titulo));
        $url_titulo = preg_replace('/--/', '-', $url_titulo);
        $url_titulo = preg_replace('/---/', '-', $url_titulo);
        $url_titulo = strtolower($url_titulo);

        return $url_titulo;
    }
}
