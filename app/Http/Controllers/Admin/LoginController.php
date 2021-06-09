<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use PhpParser\Node\Expr\FuncCall;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\DB\Usuarios;

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
        
        return redirect('/login')->with(['msg' => '¡Usuario creado correctamente!']);
    }

    public function registerForm(){

        return view('LoginRegister/register');
    }

    public function uploadFile(){

        return ("el upload");
    }

    public function uploadForm(){

        return ("el uploadForm");
    }

    public function dashboardForm(){

        $html='';
        $html.='<h1>Bienvenid@ '.Auth::user()->email.'</h1>';
        $html.='<h1>Bienvenid@ '.Auth::user()->name.'</h1>';
        $html.='<h1>id del usuario:  '.Auth::user()->id.'</h1>';
        $html.='<br><a href="'.url('logout').'">Salir</a>';
        return $html;
    }

    public function logout2(Request $request){

        Auth::logout();
        $request ->session()->invalidate();
        $request ->session()->regenerateToken();

        return redirect(url()->previous())->with(['msg'=>'Sesion cerrada correctamente', 'class' => 'alert-warning alert-dismissible fade show']);
    }

}
