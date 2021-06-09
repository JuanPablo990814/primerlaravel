<?php

namespace App\Http\Controllers\Otros;

use App\Http\Controllers\Controller;
use App\Models\DB\Factura;
use App\Models\DB\ItemsFactura;
use App\Models\DB\Adiciones;
use App\Models\DB\Usuarios;
use Illuminate\Support\Facades\DB as FacadesDB;
use App\Models\models\destinos;
use App\Models\models\tblRecorridos;
use App\Models\models\tblTours;
use App\Models\DB\Planes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use Monolog\Handler\IFTTTHandler;
use phpDocumentor\Reflection\PseudoTypes\True_;
use Illuminate\Support\Facades\Auth;

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
            if(isset(Auth::user()->email)){
                $data['correo']=Auth::user()->email;
            }
            
        return view('plan',$data);
    }

    
    public function Inscripcion($url){
        // $data['query']=Planes::findorfail($id)->get();

        // $data['query']=Planes::where("url","=",$url)->get();

        $data['query'] = FacadesDB::table('tblPlanes')
        ->select('tblPlanes.id as id','tblDestinos.destino as destino',
        'tblTipoPlan.nombre','tblPlanes.titulo as titulo','tblPlanes.id_tipo',
        'tblPlanes.url as Url','tblPlanes.descripcion as descripcion',
        'tblPlanes.Imagen as img','tblPlanes.costo_persona as costo_persona',
        'tblPlanes.created_at',
        'tblPlanes.updated_at')
        ->join('tblDestinos','tblPlanes.id_destinos', '=', 'tblDestinos.id')
        ->join('tblTipoPlan','tblPlanes.id_tipo','=','tblTipoPlan.id')
        ->where('tblPlanes.url','=',$url)
        ->get();
        //dd($data);
        if(isset(Auth::user()->email)){
            $data['correo']=Auth::user()->email;
            $data['iduser']=encrypt( $str = Auth::user()->id);
        }else{
            $data['iduser']=null;
        }
        

        return view('inscripcion',$data);
    }

    //En la tabla que guardamos información desde la pagina web es obligatorio
    //tener variables created_at y updated_at ya que laravel los pone obligatorios por default
    public function Registro (Request $request){
        $query = new Usuarios();
        $query -> name = $request -> inNombre;
        // $query -> password = $request ->
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
        //return ("usuario: ".$query->email." creado");
        return redirect('/')->with(['msg' => 'Usuario creado correctamente', 'class' => 'alert-warning alert-dismissible fade show']);
    }


    public function InscripcionPlan (Request $request){

        // try{
            
            $query = new Factura();
            $time = time();
            //id_user = 4 por que todavia no se manejan sesiones en la pagina cambiar por variable mas adelante
            //MODIFICAR LINEA 166 Y 186

            $idusuario=decrypt($request -> iduser);
            $data['Users']=Usuarios::findorfail($idusuario);
            if(is_numeric($idusuario)==True and $data['Users']!=null){
                $query -> id_user = $idusuario;
            }
            
            //$query -> id_user =1;
            $data['Planes']=Planes::findorfail($request -> prodId);
            if(is_numeric($request -> prodId)==True and $data['Planes']!=null){
                
                $query -> id_plan = $request -> prodId;
                //dd($data['Planes']->costo_persona);
                
            }else{
                $query -> id_plan ="error";
            }
            $query -> fechaReserva = $request -> datepicker1;
            $query -> horaReserva = $request -> selectTime;
            $query -> updated_at = date("d-m-Y H:i:s", $time);
            $checkSim = $request -> checkSim;
            $checkTransporte = $request -> checkTransporte;
            $numpersonas = $request ->inpNumeroPer + 1;
            $query -> save();
            //dd($query);
            
            $data['query2'] = FacadesDB::table('tblFactura')
            ->where([
                ['id_user','=',decrypt($request->iduser)],
                ['updated_at','=',$query -> updated_at]
            ])
            ->get();


            if($checkSim==True){
                //return("Hola checkSim");
                $queryAdds = new ItemsFactura();
                $queryAdds -> id_factura = $data['query2'][0]->id;
                $queryAdds -> id_adicion = 1;
                $queryAdds -> numpersonas = $numpersonas;
                $queryAdds -> updated_at = date("d-m-Y H:i:s", $time);
                $data['Adiciones']=Adiciones::findOrFail(1);
                $valor=(int)$data['Adiciones'] -> valor;
                if($numpersonas>0){
                    $valor=$valor*(int)$numpersonas;
                    $queryAdds -> valor = $valor;
                }else{
                    $queryAdds -> valor = $valor;
                }
                //dd($valor);
                $queryAdds -> save();
            }

            if($checkTransporte==True){
                //return("Hola checkTransporte");
                $queryAdds = new ItemsFactura();
                $queryAdds -> id_factura = $data['query2'][0]->id;
                $queryAdds -> id_adicion = 2;
                $queryAdds -> numpersonas = $numpersonas;
                $queryAdds -> updated_at = date("d-m-Y H:i:s", $time);
                $data['Adiciones']=Adiciones::findOrFail(2);
                $valor=(int)$data['Adiciones'] -> valor;
                if($numpersonas>0){
                    $valor=$valor*(int)$numpersonas;
                    $queryAdds -> valor = $valor;
                }else{
                    $queryAdds -> valor = $valor;
                }
                //dd($valor);
                $queryAdds -> save();
            }

            $PlanFactura = new ItemsFactura();
            $PlanFactura -> id_factura = $data['query2'][0]->id;
            $PlanFactura -> id_adicion = 4;
            $PlanFactura -> numpersonas = $numpersonas;
            $PlanFactura -> updated_at = date("d-m-Y H:i:s", $time);
            // $PlanFactura -> valor = $request -> costopersona*$numpersonas;
            $PlanFactura -> valor = $data['Planes']->costo_persona*$numpersonas;
            $PlanFactura -> save();

            return redirect('/')->with(['msg' => 'Inscrito correctamente', 'class' => 'alert-warning alert-dismissible fade show']);
        // }catch(\Exception $ex){
            return redirect('/')->with(['msg' => 'Error al inscribirse', 'class' => 'alert-danger alert-dismissible fade show']);
        // }
        //dd($query,"Numpersonas= ".$numpersonas,"Sim= ".$checkSim,"Transporte= ".$checkTransporte,$request,$data['query2'][0]->id);

    }

    public function pedidos(){
        
        $data['query']=FacadesDB::table('users')
        ->select('tblFactura.fechaReserva','tblFactura.horaReserva',
        'users.name','users.numero','tblPlanes.titulo','tblFactura.created_at',
        'tblFactura.id')
        ->join('tblFactura','users.id','=','tblFactura.id_user')
        ->join('tblPlanes','tblFactura.id_plan','=','tblPlanes.id')
        ->get();

        //dd($data);

        return view('pedidos',$data);
    }

    public static function decrypt( $str = '' )
    {
        $data = '';
        if( $str != '' ):
            $ciphering = "AES-128-CBC";
            $decryption_iv = '1234567891011121'; 
            $options = 0; 

            $data = str_replace( '___', '/', $str );
            $data = str_replace( '---', '+', $data );
            $data = openssl_decrypt ($data, $ciphering, self::token(), $options, $decryption_iv);
        endif;
        return $data;
    }
    ############################################################# END,DECRYPTED


    ############################################################# ENCRYPTED
    public static function encrypt( $str = '' )
    {
        $data = '';
        if( $str != '' ):

            $ciphering = "AES-128-CBC"; 
            $iv_length = openssl_cipher_iv_length($ciphering); 
            $options = 0; 
            $encryption_iv = '1234567891011121'; 
            $data = openssl_encrypt($str, $ciphering, self::token(), $options, $encryption_iv);
            $data = str_replace( '/', '___', $data );
            $data = str_replace( '+', '---', $data );
        endif;
        return $data;
    }
    ############################################################# END, ENCRYPTED

    
    ############################################################# TOKEN APP
    private static function token(){ return 'CLAVE_DE_CIFRADO'; }
    ############################################################# END, TOKEN APP


    public function BusquedaAlojamientos(Request $request){
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
                    ['tblPlanes.titulo','like',"%".$request->inpSearch."%"]
                ])
            ->get();

            $data['busqueda']=$request->inpSearch;

            if(isset(Auth::user()->email)){
                $data['correo']=Auth::user()->email;
            }
            

            return view("alojamientos",$data);
        }
        catch(\Exception $ex){
            return view("withoutplanes");
        }
    }

    public function BusquedaRecorridos(Request $request){
        try{
            $data['filtro'] =0;
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
                    ['tblTipoPlan.nombre','=','recorridos'],
                    ['tblPlanes.titulo','like',"%".$request->inpSearch."%"]
                ])
            ->get();

            $data['busqueda']=$request->inpSearch;

            if(isset(Auth::user()->email)){
                $data['correo']=Auth::user()->email;
            }
            
            // dd($data);
            return view("recorridos",$data);
        }
        catch(\Exception $ex){
            return view("withoutplanes");
        }
    }

    public function BusquedaTours(Request $request){
        try{
            $data['filtro'] =0;
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
                    ['tblTipoPlan.nombre','=','Tours'],
                    ['tblPlanes.titulo','like',"%".$request->inpSearch."%"]
                ])
            ->get();

            $data['busqueda']=$request->inpSearch;

            if(isset(Auth::user()->email)){
                $data['correo']=Auth::user()->email;
            }
            

            return view("tours",$data);
        }
        catch(\Exception $ex){
            return view("withoutplanes");
        }
    }

    public function BorrarRegistro(Request $request){
        $id=$request->idfactura;
        //dd($id);
        try{
            

            $data['ids'] = FacadesDB::table('tblItemsFactura')
            ->select('id')
            ->where('id_factura','=',$id)
            ->get();
            
            // dd($data['ids'][0]->id,$data['ids'][1]->id);
     
            //$html='';
            $cuenta=count($data['ids']);
            //dd(intval($data['ids'][0]->id));
            for($i=0;$i<$cuenta;$i++){
                //$html.="id: ".$data['ids'][$i]->id;
                $posicion=intval($data['ids'][$i]->id);
                $items=ItemsFactura::find($posicion);
                $items-> delete();
            }
            

            $data=Factura::find($id);
            $data-> delete();

            return redirect('/pedidos')->with(['msg' => 'Registro eliminado correctamente', 'class' => 'alert-warning alert-dismissible fade show']);
        }
        catch (\Exception $ex){
        
            return redirect('/pedidos')->with(['msg' => 'El Registro no se pudo eliminar', 'class' => 'alert-danger alert-dismissible fade show']);

        }

    }

    public function itemsFactura($id){

        $data['query'] = FacadesDB::table('users')
        ->select('tblItemsFactura.id',
        'tblFactura.id as factura_id',
        'users.email',
        'tblFactura.fechaReserva',
        'tblAdiciones.nombre as producto',
        'tblItemsFactura.numpersonas as numero_de_personas_adicionales',
        'tblAdiciones.valor as valor_una_persona',
        'tblItemsFactura.valor as total')

        ->join('tblFactura','users.id', '=', 'tblFactura.id_user')
        ->join('tblPlanes','tblFactura.id_plan', '=', 'tblPlanes.id')
        ->join('tblItemsFactura','tblItemsFactura.id_factura', '=', 'tblFactura.id')
        ->join('tblAdiciones','tblItemsFactura.id_adicion', '=', 'tblAdiciones.id')
        ->where('tblFactura.id','=',$id)
        ->get();

        $cuenta=count($data['query']);
        // dd($data['query'][1]->total);
        $total=0;
        for($i=0;$i<$cuenta;$i++){
            //$html.="id: ".$data['ids'][$i]->id;
            $total+=intval($data['query'][$i]->total);
        }

        $data['total']=$total;
        

        return view('items',$data);

    }

    public function eliminarPedido($id){
        try{
            $data=Planes::find($id);
            $data-> delete();
            return redirect(redirect()->getUrlGenerator()->previous())->with(['msg' => 'Registro eliminado correctamente', 'class' => 'alert-warning alert-dismissible fade show']);
        }
        catch (\Exception $ex){
            return redirect(redirect()->getUrlGenerator()->previous())->with(['msg' => 'El Registro no se pudo eliminar', 'class' => 'alert-danger alert-dismissible fade show']);
        }
    }

}
