<?php

namespace App\Http\Controllers\Otros;

use App\Http\Controllers\Controller;
use App\Models\models\destinos;
use App\Models\models\tblRecorridos;
use App\Models\models\tblTours;
use App\Models\DB\Planes;
use Illuminate\Http\Request;
use App\Models\DB\Usuarios;
use Illuminate\Support\Facades\DB as FacadesDB;

class OtrasFuncionesController extends Controller
{
    //CUIDADO CON LAS "" SON OBLIGATORIAS PARA HACER CONSULTAS 
    //CON VARCHAR QUITAR SIN SON NUMERICOS
    public function filtrarAlojamientos(Request $request){
        // $data['query']=destinos::where("costo_persona","<=", $request -> filtrodinero)->get();
        // $data['query']=destinos::get("costo_persona");
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
                ['TblTipoPlan.nombre','=','Alojamientos'],
                ['tblPlanes.costo_persona','<=', $request->filtrodinero]
                ]) 
            ->get();
        // dd($data);
        $data['filtro']=$request ->filtrodinero;
        return view("alojamientos",$data);
    }

    public function filtrarRecorridos(Request $request){
        // $data['query']=tblRecorridos::where("costo_persona","<=", $request -> filtrodinero)->get();
        $data['query'] = FacadesDB::table('tblPlanes')
            ->select('tblPlanes.id as id','tblDestinos.destino as destino',
            'tblTipoPlan.nombre','tblPlanes.titulo as titulo',
            'tblPlanes.url','tblPlanes.descripcion as descripcion',
            'tblPlanes.Imagen as img','tblPlanes.costo_persona as costo_persona',
            'tblPlanes.created_at',
            'tblPlanes.updated_at')
            ->join('tblDestinos','tblPlanes.id_destinos', '=', 'tblDestinos.id')
            ->join('tblTipoPlan','tblPlanes.id_tipo','=','tblTipoPlan.id')
            ->where([
                ['TblTipoPlan.nombre','=','Recorridos'],
                ['tblPlanes.costo_persona','<=', $request->filtrodinero]
                ]) 
            ->get();
        // dd($data);
        $data['filtro']=$request ->filtrodinero;
        
        return view("recorridos",$data);
    }

    public function filtrarTours(Request $request){
        // $data['query']=tblTours::where("costo_persona","<=", $request -> filtrodinero)->get();
        $data['query'] = FacadesDB::table('tblPlanes')
            ->select('tblPlanes.id as id','tblDestinos.destino as destino',
            'tblTipoPlan.nombre','tblPlanes.titulo as titulo',
            'tblPlanes.url','tblPlanes.descripcion as descripcion',
            'tblPlanes.Imagen as img','tblPlanes.costo_persona as costo_persona',
            'tblPlanes.created_at',
            'tblPlanes.updated_at')
            ->join('tblDestinos','tblPlanes.id_destinos', '=', 'tblDestinos.id')
            ->join('tblTipoPlan','tblPlanes.id_tipo','=','tblTipoPlan.id')
            ->where([
                ['TblTipoPlan.nombre','=','Tours'],
                ['tblPlanes.costo_persona','<=', $request->filtrodinero]
                ]) 
            ->get();
        // dd($data);
        $data['filtro']=$request ->filtrodinero;
        return view("tours",$data);
    }

    // public function porPlan($planid){
    //     $data['query']=destinos::findOrFail($planid);
    //     // dd($data['query']);
    //     // return ('/'.$planid);
    //     // return view('/{'.$planid.'}');
    //     return view('plan',$data);
    // }

    //$planid se creo en el archivo web.php con la ruta de /{$planid}
    public function porPlanAlojamiento($planid){
        //con este metodo se debe imprimir asi: $query[0] -> id
        $data['query'] = FacadesDB::table('tblPlanes')
            ->select('tblPlanes.id as id','tblDestinos.destino as destino',
            'tblTipoPlan.nombre','tblPlanes.titulo as titulo',
            'tblPlanes.url','tblPlanes.descripcion as descripcion',
            'tblPlanes.Imagen as img','tblPlanes.costo_persona as costo_persona',
            'tblPlanes.created_at',
            'tblPlanes.updated_at')
            ->join('tblDestinos','tblPlanes.id_destinos', '=', 'tblDestinos.id')
            ->join('tblTipoPlan','tblPlanes.id_tipo','=','tblTipoPlan.id')
            ->where('tblPlanes.id','=',$planid)
            ->get();
            // dd($planid);
            
        return view('plan',$data);
    }

    
    public function Inscripcion($url){
        // $data['query']=Planes::findorfail($id)->get();

        // $data['query']=Planes::where("url","=",$url)->get();

        $data['query'] = FacadesDB::table('tblPlanes')
        ->select('tblPlanes.id as id','tblDestinos.destino as destino',
        'tblTipoPlan.nombre','tblPlanes.titulo as titulo',
        'tblPlanes.url','tblPlanes.descripcion as descripcion',
        'tblPlanes.Imagen as img','tblPlanes.costo_persona as costo_persona',
        'tblPlanes.created_at',
        'tblPlanes.updated_at')
        ->join('tblDestinos','tblPlanes.id_destinos', '=', 'tblDestinos.id')
        ->join('tblTipoPlan','tblPlanes.id_tipo','=','tblTipoPlan.id')
        ->where('tblPlanes.url','=',$url)
        ->get();
        // dd($data);

        return view('inscripcion',$data);
    }

    //En la tabla que guardamos información desde la pagina web es obligatorio
    //tener variables created_at y updated_at ya que laravel los pone obligatorios por default
    public function Registro (Request $request){
        $query = new Usuarios();
        
        $query -> nombre = $request -> inNombre;
        $query -> numero = $request -> inNumero;
        $query -> email = $request ->inEmail;
        $query -> direccion = $request ->inDireccion;
        $query -> nombreEmergencia = $request ->inNombreEmergencia;
        $query -> numeroEmergencia = $request ->inNumeroEmergencia;
        date_default_timezone_set("America/Bogota");
        $time = time();
        $query -> updated_at = date("d-m-Y H:i:s", $time);
        $query -> save();
        // dd($query);
        return ("usuario: ".$query->email." creado");
    }

}
