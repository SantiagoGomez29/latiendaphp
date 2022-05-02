<?php

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

Route::get('/', function () {
    return view('welcome');
});

//Ruta evidencias de Paises
Route::get('paises', function(){
   $paises = [ 
       "Colombia" =>[
           "capital"=> "Bogotá",
           "moneda"=>  "Peso",
           "poblacion" => 51.6,
           "ciudades" => [
               "Cali",
               "Medellin",
               "Barranquilla"
             ]
           ],
        "Ecuador" => [
            "capital"=> "Quíto",
            "moneda"=>  "Dolar estadounidense",
            "poblacion" => 17.6,
            "ciudades" => [
                "Ibarra",
                "Guayaquil"
              ]
            ],
            "Rusia" => [
                "capital"=> "Moscú",
                "moneda"=>  "Rublo Ruso",
                "poblacion" => 144.1,
                "ciudades" => [
                    "San Petersburgo",
                ] 
            ]
       ];

       //Código para mostrar la vista de paises 
       return view('paises')
       ->with('paises', $paises);
});
