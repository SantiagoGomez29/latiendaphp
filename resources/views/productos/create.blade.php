@extends('layouts.principal')
@section('contenido')


    <form  class="col s8" method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
      @csrf
      @if( session('mensajito') )
        <div class="row">
          <strong>{{ session('mensajito') }}</strong>
        </div>

      @endif
        <div class="row">
           <div class="col s8">
             <h1 class="blue-text text-darken-2">Nuevo Producto</h1>
           </div>
        </div>

      <div class="row">
        <div class="input-field col s8">
          <input id="nombre" name="nombre" type="text" class="validate">
          <label for="nombre">Nombre del Producto </label>
          <strong class="red-text text-darken-2 ">{{ $errors->first('nombre') }}</strong>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s8">
          <input id="desc" name="desc" type="text" class="validate">
          <label for="desc">Descripción del producto</label>
          <strong class="red-text text-darken-2 ">{{ $errors->first('desc') }}</strong>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s8">
          <input id="precio" name="precio" type="number" class="validate">
          <label for="precio">Precio</label>
          <strong class="red-text text-darken-2 ">{{ $errors->first('precio') }}</strong>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s8">
          <select name="marca" id="marca">
            <option value="">Elija la marca del producto deseado</option>
           @foreach($marcas as $marca)
                <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
           @endforeach
          </select>
          <strong class="red-text text-darken-2 ">{{ $errors->first('marca') }}</strong>
        </div>
      </div>

      <div class="row">
       <div class="col s8 input-field">
         <select name="categoria" id="categoria">
           <option value="">Elija la categoria del producto deseado</option>
           @foreach($categorias as $categorias)
              <option value="{{ $categorias->id }}">
                {{ $categorias->nombre }}
              </option>
           @endforeach
         </select>
         <strong class="red-text text-darken-2 ">{{ $errors->first('categoria') }}</strong>
       </div>
      </div>

      <div class="row">
      <div class="file-field input-field col s8">
      <div class="btn">
        <span>Ingrese Imagen...</span>
        <input type="file" name="imagen" multiple>
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
    <strong class="red-text text-darken-2 ">{{ $errors->first('imagen') }}</strong>
      </div>

      <div class="row">
        <button class="btn waves-effect waves-light" type="submit">Guardar</button>
      </div>
    </form>
  @endsection