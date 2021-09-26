<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as FacadesDB;

class CheckRol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try{
            $data['query'] = FacadesDB::table('tblUserRol')
            ->select('*')
            ->where('id_user','=',Auth::user()->id)
            ->get();
        }catch(\Exception $ex){

        }
        
        // dd($data['query'][0]->id_user);
        if(isset($data['query'][0]->id_user)){
            //dd(Auth::user());
            

            // dd($data);
            // dd(Auth::user()->id);
            
            return $next($request);
        }
        return redirect('/')->with(['msg' => 'No es usuario admin', 'class' => 'alert-warning alert-dismissible fade show']);
    }
}
