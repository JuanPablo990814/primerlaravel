<?php

use App\Http\Controllers\Crud\CrudController;
use App\Http\Controllers\Datos\ControladorArreglo;
use App\Http\Controllers\Ruta\Nombrecontroller;
use Illuminate\Support\Facades\Route;

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
//--------------------------------

//Administrador
Route::get('/admin', function () {
    return view('admin');
});
Route::resource('/admin', 'App\Http\Controllers\Admin\adminController');
// Route::get('/admin/{url}', 'App\Http\Controllers\Admin\adminController') -> where (['url'=>'[0-9]+']);

Route::get('/adminRecorridos', function () {
    return view('adminRecorridos');
});
Route::resource('/adminRecorridos', 'App\Http\Controllers\Admin\adminRecoController');

Route::get('/adminTours', function () {
    return view('adminTours');
});
Route::resource('/adminTours', 'App\Http\Controllers\Admin\adminToursController');

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
    //$serverName = "(LocalDB)\MSSQLLocalDB"; //serverName\instanceName

    // Puesto que no se han especificado UID ni PWD en el array  $connectionInfo,
    // // La conexión se intentará utilizando la autenticación Windows.
    //$connectionInfo = array( "Database"=>"DB_Viajes");
    // //sqlsrv_connect() NO ESTA MALO EL CODIGO si ejecuta solo que aparece como error en el visual y sqlsrv_errors() igual
    //$conn = sqlsrv_connect( $serverName, $connectionInfo);
    
    //if( $conn ) {
    //      echo "Conexión establecida.<br />";
    //}else{
    //      echo "Conexión no se pudo establecer.<br />";
    //      die( print_r( sqlsrv_errors(), true));
    //}
    //return phpinfo();
});