<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Marca;
use App\Models\Categorias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "Aqui va a ir el catalogo de productos";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Seleccionar todas las marcas 
        $marca = Marca::all();

        //Seleccionar todas las categorias
        $categorias = Categorias::all(); 

        //Mostrar la vista del nuevo producto
        //Enviandoles los datos de marcas y categorias
        return view('productos.create')
           ->with('marcas' ,$marca)
           ->with('categorias' ,$categorias);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {   

        //Validaciones
        //1. Realizar reglas de validacion
        $reglas=[
            "nombre" => 'required|alpha|unique:productos,nombre',
            "desc" => 'required|min:5|max:20',
            "precio" => 'required|numeric',
            "imagen" => 'required|image',
            "marca" => 'required',
            "categoria" => 'required'
        ];

        //2. Crear el objeto validador
        $v = Validator::make($r->all() , $reglas );

        //3. Validar
        if($v->fails()){
            //Si la validacion falló
            //Redigirme a la vista de create(ruta: productos/create)
            //con los errores de errores
            return redirect('productos/create')
                ->withErrors($v);
        }else{
            //Validación exitosa
            $archivo=$r->imagen;

            //Obtener el nombre original del archivo
             $nombre_archivo = $archivo->getClientOriginalName();

            //Establacer la ubicacion de guardado del archivo
             $ruta = public_path()."/img";

            //Mover el arhivo de imagen a la ubicacion y nombre deseados
             $archivo->move($ruta, $nombre_archivo);
       
            //Crear nuevo producto:
             $p = new Producto();
            //Asignar atributos del producto
            $p->nombre= $r->nombre;
            $p->desc = $r->desc;
            $p->precio = $r->precio;
            $p->marca_id = $r->marca;
            $p->categoria_id = $r->categoria;
            $p->imagen = $nombre_archivo;   
            //Grabar producto
            $p->save();
            //Redigir a productos/create con un mensaje de exito
            return redirect('productos/create')
                   ->with('mensajito', 'Producto registrado exitosamente');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        echo " Aqui va el detalle del producto con id:$producto ";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        echo "aqui va el formulario para actualizar producto";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
