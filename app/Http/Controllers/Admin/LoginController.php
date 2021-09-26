<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\DB\Usuarios;
use Illuminate\Support\Facades\DB as FacadesDB;
use App\Models\DB\Planes;

class LoginController extends Controller
{
    public function logout(Request $request){

        Auth::logout();
        $request ->session()->invalidate();
        $request ->session()->regenerateToken();
        return redirect('/login')->with(['msg'=>'Sesion cerrada correctamente']);
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return redirect('login')->with(['msg' => '¡Error en el usuario y/o contraseña!']);
    }

    public function loginForm(){
        return view('LoginRegister/login');
    }

    public function register(Request $request){

        $query = new Usuarios();
        $query -> name = $request -> inNombre;
        // $query -> password = $request ->
        $query -> numero = $request -> inNumero;
        $query -> email = $request ->inEmail;
        $query -> direccion = $request ->inDireccion;
        $query -> nombreEmergencia = $request ->inNombreEmergencia;
        $query -> numeroEmergencia = $request ->inNumeroEmergencia;
        $query -> password = Hash::make($request -> InpPasswordConfirm);
        date_default_timezone_set("America/Bogota");
        $time = time();
        $query -> updated_at = date("d-m-Y H:i:s", $time);
        $query -> save();
        // dd($query);
        
        return redirect('/login')->with(['msg' => '¡Usuario creado correctamente!', 'class' => 'alert-warning alert-dismissible fade show']);
    }

    public function registerForm(){

        return view('LoginRegister/register');
    }
    public function uploadFile(Request $request){
        


        #############subida de archivos#######################
        $file=$request->file('files');
        $imgs='';
        
        
        if($file):
            $token = $this -> randomToken(5,15);
            $imgName = $token.'-'.$file->getClientOriginalName();
            //variable creada en .env UPLOADFILE_PATH
            $file->move(env('UPLOADFILE_PATH'),$imgName);
            $imgs.="http://".$_SERVER["HTTP_HOST"]."/img/upload/".$imgName;
        #############fin subida de archivos######################
        
        ########################prueba de ingreso de json a sql server####################################
        $query = new Planes();
        $query -> id_destinos = 1;
        $query -> id_tipo =1;
        $query -> titulo = "prueba";
        //cambiar url por cada prueba "campo unico"
        $query -> url = $this -> randomToken(5,15);
        $query -> costo_persona = 10000;
        $query -> descripcion = "prueba";
        $query -> Imagen =$imgs;
        $query -> estado = "Activo";
        date_default_timezone_set("America/Bogota");
        $time = time();
        $query -> updated_at = date("d-m-Y H:i:s", $time);
        $query -> save();
        ########################fin prueba de ingreso de json a sql server####################################

            return redirect("upload")->with(['msg'=>'Archivo subido', 'class' => 'alert-warning alert-dismissible fade show']);
        else:
            return redirect("upload")->with(['msg'=>'No se ha subido ningun archivo', 'class' => 'alert-warning alert-dismissible fade show']);
        endif;
    }

    public function uploadFileJson(Request $request){

        // $request->validate([
        //     'files'=>'required|image|max:2048'
        // ]);
        #############subida de archivos#######################
        $files=$request->file('files');
        $imgs='';
        
        
        if($files):
            foreach($files as $key =>$value):
                $token = $this -> randomToken(5,15);
                $imgName = "http://".$_SERVER["HTTP_HOST"]."/img/upload/".$token.'-'.$value->getClientOriginalName();
                //variable creada en .env UPLOADFILE_PATH
                $value->move(env('UPLOADFILE_PATH'),$imgName);
                $imgs.='"'.$imgName.'",';
                //dd($files);
            endforeach;
            #############fin subida de archivos######################
            
            ########################prueba de ingreso de json a sql server####################################
            $query = new Planes();
            $query -> id_destinos = 1;
            $query -> id_tipo =1;
            $query -> titulo = "prueba";
            //cambiar url por cada prueba "campo unico"
            $query -> url = $this -> randomToken(5,15);
            $query -> costo_persona = 10000;
            $query -> descripcion = "prueba";
            $query -> Imagen ='{"photos": ['.substr($imgs, 0, -1).']}';
            $query -> estado = "Activo";
            date_default_timezone_set("America/Bogota");
            $time = time();
            $query -> updated_at = date("d-m-Y H:i:s", $time);
            $query -> save();
            ########################fin prueba de ingreso de json a sql server####################################

            return redirect("uploadJson")->with(['msg'=>'Archivo subido', 'class' => 'alert-warning alert-dismissible fade show']);
        else:
            return redirect("uploadJson")->with(['msg'=>'No se ha subido ningun archivo', 'class' => 'alert-warning alert-dismissible fade show']);
        endif;
    }

    private static function randomToken($start=5,$end=60){
        return substr(str_shuffle("1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"),$start,$end);
    }

    public function uploadForm(){
        $data['query']=FacadesDB::table('users')
        ->select('tblFactura.fechaReserva','tblFactura.horaReserva',
        'users.name','users.numero','tblPlanes.titulo','tblFactura.created_at',
        'tblFactura.id')
        ->join('tblFactura','users.id','=','tblFactura.id_user')
        ->join('tblPlanes','tblFactura.id_plan','=','tblPlanes.id')
        ->where('users.id',"=",Auth::user()->id)
        ->get();

        // dd(Auth::user());

        if(isset(Auth::user()->email)){
            $data['correo']=Auth::user()->email;
        }

        return view("uploadFile",$data);
    }

    public function dashboardForm(){
        
        // $html='';
        // $html.='<h1>Bienvenid@ '.Auth::user()->email.'</h1>';
        // $html.='<h1>Bienvenid@ '.Auth::user()->name.'</h1>';
        // $html.='<h1>id del usuario:  '.Auth::user()->id.'</h1>';
        // $html.='<br><a href="'.url('logout').'">Salir</a>';
        // return $html;

        $data['query']=FacadesDB::table('users')
        ->select('tblFactura.fechaReserva','tblFactura.horaReserva',
        'users.name','users.numero','tblPlanes.titulo','tblFactura.created_at',
        'tblFactura.id')
        ->join('tblFactura','users.id','=','tblFactura.id_user')
        ->join('tblPlanes','tblFactura.id_plan','=','tblPlanes.id')
        ->where('users.id',"=",Auth::user()->id)
        ->get();

        // dd(Auth::user());

        if(isset(Auth::user()->email)){
            $data['correo']=Auth::user()->email;
        }

        // dd(Auth::user());
        return view("LoginRegister/dashboard",$data);
    }

    public function logout2(Request $request){

        Auth::logout();
        $request ->session()->invalidate();
        $request ->session()->regenerateToken();

        return redirect(url()->previous())->with(['msg'=>'Sesion cerrada correctamente', 'class' => 'alert-warning alert-dismissible fade show']);
    }

   

}
