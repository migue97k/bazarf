@extends('home')
@section('home')
<div class="col-11">
<?php
use App\Producto;
$productos = Producto::all();
?>
<h1>Productos</h1>
 @if(Auth::user()->admi)
<table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">iD</th>
            <th scope="col">Producto</th>
            <th scope="col">Precio</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($productos as $producto)
          <tr>
            <th scope="row">{{$producto->id}}</th>
            <td>{{$producto->nombre}}</td>
            <td>{{$producto->precio_propuesto}}</td>
            <td><a href="{{route('ProductosEditar',['id'=>$producto->id])}}" class="btn btn-success" id="imagenes">Editar</a><a href="{{route('ProductosEliminar',['id'=>$producto->id])}}" class="btn btn-danger" id="imagenes">Eliminar</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
 @else
<table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">iD</th>
            <th scope="col">Producto</th>
            <th scope="col">Precio</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
          @foreach($productos as $producto)
          @if($producto->clienta_vende == Auth::user()->id)
          <tr>
            <th scope="row">{{$producto->id}}</th>
            <td>{{$producto->nombre}}</td>
            <td>{{$producto->precio_propuesto}}</td>
            <td>{{$producto->disponibles}}</td>
            <td><a href="{{route('ProductosEditar',['id'=>$producto->id])}}" class="btn btn-success" id="imagenes">Editar</a><a href="{{route('ProductosEliminar',['id'=>$producto->id])}}" class="btn btn-danger" id="imagenes">Eliminar</a></td>
          </tr>
          @endif
          @endforeach

        </tbody>
      </table>
 @endif

</div>
@endsection