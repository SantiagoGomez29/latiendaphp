@extends('layouts.principal')

@section('contenido')
    <form  class="col s8" method="POST" action="{{ route('productos.store') }}">
      @csrf
        <div class="row">
           <div class="col s8">
             <h1 class="blue-text text-darken-2">Nuevo Producto</h1>
           </div>
        </div>

      <div class="row">
        <div class="input-field col s8">
          <input id="nombre" name="nombre" type="text" class="validate">
          <label for="nombre">Nombre del Producto </label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s8">
          <input id="desc" name="desc" type="text" class="validate">
          <label for="desc">Descripción del producto</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s8">
          <input id="precio" name="precio" type="number" class="validate">
          <label for="precio">Precio</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s8">
          <select name="marca" id="marca">
            <option>Elija la marca del producto deseado</option>
           @foreach($marcas as $marca)
           <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
           @endforeach
          </select>
        </div>
      </div>

      <div class="row">
       <div class="col s8 input-field">
         <select name="categoria" id="categoria">
           <option>Elija la categoria del producto deseado</option>
           @foreach($categorias as $categorias)
              <option value="{{ $categorias->id }}">
                {{ $categorias->nombre }}
              </option>
           @endforeach
         </select>
       </div>
      </div>

      <div class="row">
      <div class="file-field input-field col s8">
      <div class="btn">
        <span>Ingrese Imagen...</span>
        <input type="file">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
      </div>
    </div>
      </div>

      <div class="row">
        <button class="btn waves-effect waves-light" type="submit">Guardar</button>
      </div>
    </form>
  @endsection