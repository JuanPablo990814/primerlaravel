<?php

namespace App\Http\Controllers\Datos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControladorArreglo extends Controller
{
    public function Arreglo(){

        //Ubicacion=0
        //Alojamiento=1
        //Descripcion=2
        //Costo=3
        //Imagen=4

        $datos["planes"] = [
            ["La Pintada","Finca Hotel Campestre","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et eros at augue aliquam dignissim ut non purus. Curabitur finibus molestie turpis eget fringilla. Pellentesque malesuada consectetur fringilla. Suspendisse vitae sem in nunc elementum suscipit.","30000","https://loremflickr.com/320/240/travel"],
            ["La Pintada","Finca Hotel Campestre","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et eros at augue aliquam dignissim ut non purus. Curabitur finibus molestie turpis eget fringilla. Pellentesque malesuada consectetur fringilla. Suspendisse vitae sem in nunc elementum suscipit.","30000","https://loremflickr.com/320/240/travel"],
            ["La Pintada","Finca Hotel Campestre","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et eros at augue aliquam dignissim ut non purus. Curabitur finibus molestie turpis eget fringilla. Pellentesque malesuada consectetur fringilla. Suspendisse vitae sem in nunc elementum suscipit.","30000","https://loremflickr.com/320/240/travel"],
            ["La Pintada","Finca Hotel Campestre","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et eros at augue aliquam dignissim ut non purus. Curabitur finibus molestie turpis eget fringilla. Pellentesque malesuada consectetur fringilla. Suspendisse vitae sem in nunc elementum suscipit.","30000","https://loremflickr.com/320/240/travel"],
            ["La Pintada","Finca Hotel Campestre","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et eros at augue aliquam dignissim ut non purus. Curabitur finibus molestie turpis eget fringilla. Pellentesque malesuada consectetur fringilla. Suspendisse vitae sem in nunc elementum suscipit.","30000","https://loremflickr.com/320/240/travel"],
            ["La Pintada","Finca Hotel Campestre","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et eros at augue aliquam dignissim ut non purus. Curabitur finibus molestie turpis eget fringilla. Pellentesque malesuada consectetur fringilla. Suspendisse vitae sem in nunc elementum suscipit.","30000","https://loremflickr.com/320/240/travel"]    
        ];
        $datos["titulo"]="Alojamientos";
        

        //return view('tours',$datos);
        return view('usandoarray')->with('array',$datos);
        //return $datos;
        //return view('tours')->with('datos', $datos);
    }
}
