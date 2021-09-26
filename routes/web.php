<?php

use App\Http\Controllers\Crud\CrudController;
use App\Http\Controllers\Datos\ControladorArreglo;
use App\Http\Controllers\Ruta\Nombrecontroller;
use Doctrine\DBAL\Query\QueryBuilder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//1.Alojamientos--------------------
Route::get('/', function () {
    return view('alojamientos');
});
//controlador: la direccion es "/" por que es la direccion de alojamientos
Route::resource('/', 'App\Http\Controllers\PackCrud\alojamientosController');

//primer alojamientos quemando(repitiendo) todo el codigo
Route::get('/repitiendocode', function () {
    return view('repitiendocode');
});


//2.Recorridos---------------------
Route::get('/recorridos', function () {
    return view('usandoarray');
});
//controlador
Route::resource('/recorridos', 'App\Http\Controllers\PackCrud\recorridosController');


//primer recorridos usando array como fuente de datos
Route::get('/usandoarray', function () {
    return view('usandoarray');
});

Route::get('/usandoarray', [ControladorArreglo::class,'Arreglo']);


// Route::get('/recorridos', [ControladorArreglo::class,'Arreglo']);
//--------------------------------

//3.Tours---------------------------
Route::get('/tours', function () {
    return view('tours');
});
//controlador
Route::resource('/tours', 'App\Http\Controllers\PackCrud\toursController');

//Route::get('/tours', [ControladorArreglo::class,'Arreglo']);
// Route::resource('/tours', 'App\Http\Controllers\Crud\CrudController');

//primer intento de conexion con base de datos
Route::get('/usandodb', function () {
    return view('usandodb');
});
Route::resource('/usandodb', 'App\Http\Controllers\Crud\usandoDBController');


//paginas en blanco
Route::get('/withoutplanes', function () {
    return view('withoutplanes');
});

Route::get('/noadReco', function () {
    return view('noadReco');
});

Route::get('/noadAlo', function () {
    return view('noadAlo');
});

Route::get('/noadTo', function () {
    return view('noadTo');
});

//-------------------------------
Route::get('/login2', function () {
    return view('login');
});
//--------------------------------

//Administrador
Route::get('/admin', function () {
    return view('admin');
});

Route::resource('/admin', 'App\Http\Controllers\Admin\adminController')->middleware('rol');
// Route::get('/admin/{url}', 'App\Http\Controllers\Admin\adminController') -> where (['url'=>'[0-9]+']);

Route::get('/adminRecorridos', function () {
    return view('adminRecorridos');
});
Route::resource('/adminRecorridos', 'App\Http\Controllers\Admin\adminRecoController')->middleware('rol');

Route::get('/adminTours', function () {
    return view('adminTours');
});
Route::resource('/adminTours', 'App\Http\Controllers\Admin\adminToursController')->middleware('rol');

//FILTROS
Route::get('/filtro', 'App\Http\Controllers\Otros\OtrasFuncionesController@filtrarAlojamientos');
Route::get('/filtroRe', 'App\Http\Controllers\Otros\OtrasFuncionesController@filtrarRecorridos');
Route::get('/filtroTo', 'App\Http\Controllers\Otros\OtrasFuncionesController@filtrarTours');

//ejemplo de conectar vista con controlador 
Route::resource('/crud', 'App\Http\Controllers\Crud\CrudController');


// Calling controller using PHP callable syntax...
Route::get('/users', [Nombrecontroller::class, 'hola']);
// Calling controller using string syntax...
Route::get('/hola', 'App\Http\Controllers\Ruta\Nombrecontroller@hola');

Route::get('/ejercicios', function () {
    echo "<h2>Escriba en el link el pais deseado</h2>";
    echo "
    <ul>
        <li>Colombia</li>
        <li>Mexico</li>
        <li>Estado Unidos</li>
        <li>Japon</li>
    </ul>
    
    <p>Ejemplo escriba http://laravel.loc/ejercicios?pais=Colombia</p> <hr>";

    $pais=filter_input(INPUT_GET,'pais');
    echo "<h3>Pais:".$pais."</h3><br><br>";
    
    $elarray=[
        ['Colombia','Mexico','Estados Unidos','Japon'],
        ['Peso Colombiano','Peso Mexicano','Dolar','Yen'],
        [0.00023,0.040,0.83,0.0078]
    ];

    $mensaje="";
    for($i=0; $i< count($elarray);$i++):
        for($j=0; $j<count($elarray[$i]);$j++):

            if($elarray[$i][$j]=="Colombia" && $pais=="Colombia"){
                $mensaje="1 ".$elarray[$i+1][$j]." equivale a ".$elarray[$i+2][$j]." Euros";
            } 
            elseif($elarray[$i][$j]=="Mexico" && $pais=="Mexico"){
                $mensaje="1 ".$elarray[$i+1][$j]." equivale a ".$elarray[$i+2][$j]." Euros";
            }
            elseif($elarray[$i][$j]=="Estados Unidos" && $pais=="Estados Unidos"){
                $mensaje="1 ".$elarray[$i+1][$j]." equivale a ".$elarray[$i+2][$j]." Euros";
            }
            elseif($elarray[$i][$j]=="Japon" && $pais=="Japon"){
                $mensaje="1 ".$elarray[$i+1][$j]." equivale a ".$elarray[$i+2][$j]." Euros";
            }
     
            #endif;
            /*if($elarray[$i][$j]=="Mexico" && $pais="Mexico"):
                $mensaje="1 ".$elarray[$i+1][$j]." equivale a ".$elarray[$i+2][$j]." Euros";
            endif;
            if($elarray[$i][$j]=="Estados Unidos" && $pais="Estados Unidos"):
                $mensaje="1 ".$elarray[$i+1][$j]." equivale a ".$elarray[$i+2][$j]." Euros";
            endif;
            if($elarray[$i][$j]=="Japon" && $pais="Japon"):
                $mensaje="1 ".$elarray[$i+1][$j]." equivale a ".$elarray[$i+2][$j]." Euros";
            endif;*/
        endfor;
        #var_dump($elarray[$i][0]);
    endfor;
    return "<strong>".$mensaje."</strong>";
});

//como se prueba: http://viajes.loc/alfanumerico/holamundo
Route::get('/alfanumerico/{url}',function(){
    return 'soy alfanumerico';
}) -> where (['url'=>'[A-Za-z0-9]+']);

//como se prueba: http://viajes.loc/numerico/123
Route::get('/numerico/{url}',function(){
    return 'soy numerico';
}) -> where (['url'=>'[0-9]+']);



Route::get("/pruebasarrays",function(){

    // $datos = [
    //     ["nombre" => "pepe", "edad" => 25, "peso" => 80],
    //     ["nombre" => "juan", "edad" => 22, "peso" => 75]
    // ];
    
    // print "<p>{$datos[1]["nombre"]} pesa {$datos[1]["peso"]} kilos</p>\n";
    // print "\n";
    // print "<p>" . $datos[0]["nombre"] . " tiene " . $datos[0]["edad"] . " años</p>\n";

    $datos["planes"] = [
        ["ubicacion" => "La Pintada", "alojamiento" => "Finca Hotel Campestre", "descripcion" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et eros at augue aliquam dignissim ut non purus. Curabitur finibus molestie turpis eget fringilla. Pellentesque malesuada consectetur fringilla. Suspendisse vitae sem in nunc elementum suscipit.","costo" => "30000","img"=>"https://loremflickr.com/320/240/travel"],
        ["ubicacion" => "La Pintada", "alojamiento" => "Finca Hotel Campestre", "descripcion" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et eros at augue aliquam dignissim ut non purus. Curabitur finibus molestie turpis eget fringilla. Pellentesque malesuada consectetur fringilla. Suspendisse vitae sem in nunc elementum suscipit.","costo" => "30000","img"=>"https://loremflickr.com/320/240/travel"],
        ["ubicacion" => "La Pintada", "alojamiento" => "Finca Hotel Campestre", "descripcion" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et eros at augue aliquam dignissim ut non purus. Curabitur finibus molestie turpis eget fringilla. Pellentesque malesuada consectetur fringilla. Suspendisse vitae sem in nunc elementum suscipit.","costo" => "30000","img"=>"https://loremflickr.com/320/240/travel"]    
    ];
    $datos["titulo"]="Alojamientos";

    print "<p>" . $datos["planes"][0]["ubicacion"] . " tiene " . $datos["planes"][0]["costo"] . " años</p>\n";


});


Route::get("/conexionprueba",function(){
    $serverName = "(LocalDB)\MSSQLLocalDB"; //serverName\instanceName

    //Puesto que no se han especificado UID ni PWD en el array  $connectionInfo,
    // La conexión se intentará utilizando la autenticación Windows.
    $connectionInfo = array( "Database"=>"DB_Viajes");
    //sqlsrv_connect() NO ESTA MALO EL CODIGO si ejecuta solo que aparece como error en el visual y sqlsrv_errors() igual
    // $conn = sqlsrv_connect( $serverName, $connectionInfo);
    
    // if( $conn ) {
    //      echo "Conexión establecida.<br />";
    // }else{
    //      echo "Conexión no se pudo establecer.<br />";
    //      die( print_r( sqlsrv_errors(), true));
    // }
    // return phpinfo();
});

//Route::get('/query', [QueryController::class, 'destinos']);

//QUERY BUILDER
Route::get('/query', 'App\Http\Controllers\QueryBuilder\QueryController@destinos');



//planes por separado
// Route::get('/{plan}',function($plan){
//     return view('plan');
//     // return ('Hola mundo: '.$plan);
// })-> where (['plan'=>'[0-9]+']);

// Route::get('/{plan}','App\Http\Controllers\Otros\OtrasFuncionesController@porPlan'
// )-> where (['plan'=>'[0-9]+']);

Route::get('/{plan}','App\Http\Controllers\Otros\OtrasFuncionesController@porPlanAlojamiento'
)-> where (['plan'=>'[0-9]+']);

// Route::get('/inscripcion/{id}', function () {
//     return view('inscripcion');
// })-> where (['plan'=>'[0-9]+']);


Route::get('/inscripcion/{url}','App\Http\Controllers\Otros\OtrasFuncionesController@Inscripcion'
)-> where (['url'=>'[A-Za-z0-9-&?=]+']);


Route::get('/registro', function () {
    return view('registro');
});

//guardando en base de datos el registro
Route::get('/registro/registrando', 'App\Http\Controllers\Otros\OtrasFuncionesController@Registro');




Route::get("/horatest",function(){

    $array=[
        [7,'07:00 A.M.'],
        [8,'08:00 A.M.'],
        [9,'09:00 A.M.'],
        [10,'10:00 A.M.'],
        [11,'11:00 A.M.'],
        [12,'12:00 A.M.'],
        [13,'01:00 P.M.'],
        [14,'02:00 P.M.'],
        [15,'03:00 P.M.'],
        [16,'04:00 P.M.'],
        [17,'05:00 P.M.'],
        [18,'06:00 P.M.'],
        [19,'07:00 P.M.'],
        [20,'08:00 P.M.']
    ];

    $time = [];

    $currentDate = new DateTime();
    $currentDate->modify('+4 hours');
    $currentTime=(int)$currentDate->format('G');
    
    // dd($currentDate);
    
    foreach ($array as $c):
        if($c[0] >= $currentTime):
            array_push($time , [ $c[0],$c[1] ]);
        endif;
    endforeach;

    // if(count($time)==0):
    //     $time = $array;

    dd($time);
});

// Route::get('/registro', function () {
//     return view('registro');
// });

// //guardando en base de datos el registro
Route::get('/Inscripcion/Inscribiendo', 'App\Http\Controllers\Otros\OtrasFuncionesController@InscripcionPlan');

Route::get('/pedidos', 'App\Http\Controllers\Otros\OtrasFuncionesController@pedidos')->middleware('rol');

//Esto va en la parte superior de este formato
//pero para recordarme futuramente lo dejo aqui
use App\Http\Controllers\Admin\LoginController;
use App\Models\DB\Usuarios;
use Illuminate\Auth\Events\Verified;

//Route::get('logout', tambien se puede sin /
Route::get('/logout', [LoginController::class,'logout']);

Route::post('login', [LoginController::class,'login']);
//->name('login'); crea el nombre login como ruta para poder utilizarlo en el middleware ejemplo: return route(login);
Route::get('login', [LoginController::class,'loginForm'])->name('login');;

Route::post('register', [LoginController::class,'register']);
Route::get('register', [LoginController::class,'registerForm']);

Route::group(['middleware'=>'rol'],function(){

    Route::post('upload', [LoginController::class,'uploadFile']);
    Route::get('upload', [LoginController::class,'uploadForm']);
    Route::get("uploadJson",'App\Http\Controllers\Otros\OtrasFuncionesController@jsonForm');
    Route::post('uploadFileJson', [LoginController::class,'uploadFileJson']);
});


Route::group(['middleware'=>'auth'],function(){

    Route::get('dashboard', [LoginController::class,'dashboardForm']);

});

Route::get('/sesion', function () {
    
    //dd(Auth::user());
    dd(Auth::user()->name,Auth::user()->email,Auth::user()->numero);
});

Route::get('/logout2', [LoginController::class,'logout2']);

Route::get('/Buscar-Alojamientos', 'App\Http\Controllers\Otros\OtrasFuncionesController@BusquedaAlojamientos');
Route::get('/Buscar-Recorridos', 'App\Http\Controllers\Otros\OtrasFuncionesController@BusquedaRecorridos');
Route::get('/Buscar-Tours', 'App\Http\Controllers\Otros\OtrasFuncionesController@BusquedaTours');
Route::get('/BorrarRegistro', 'App\Http\Controllers\Otros\OtrasFuncionesController@BorrarRegistro');

Route::get('/items/{id}','App\Http\Controllers\Otros\OtrasFuncionesController@itemsFactura'
)-> where (['id'=>'[A-Za-z0-9-&?=]+']);

Route::get('/eliminarPedido/{id}','App\Http\Controllers\Otros\OtrasFuncionesController@eliminarPedido'
)-> where (['id'=>'[0-9]+']);


Route::get('/pruebaRoute',function(){
return route('login');
});

Route::get('/cambiarEstado/{id}','App\Http\Controllers\Otros\OtrasFuncionesController@cambiarEstado')-> where (['id'=>'[0-9]+']);

Route::get('/rutaImg', function () {
    
    // dd(public_path('img\\0Ox7A6ojCdvLUS1-bugha.jpg'));
    $url=public_path('img\\upload\\0Ox7A6ojCdvLUS1-bugha.jpg');
    return ($url);
});




Route::get("/jsonImg",'App\Http\Controllers\Otros\OtrasFuncionesController@jsonImg');