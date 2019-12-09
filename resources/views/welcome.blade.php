@extends('layouts.app')
@section('content')
<?php
//sacamos los datos de la base
use App\Producto;
$productos = Producto::all();
?>
<div class="row">
    @foreach($productos as $producto)
    @if($producto->disponibles>0)
    <div class="card" style="width: 18rem;" id="imagenes">
        <img src="{{route('inicio.producto',['filename'=>$producto->image])}}" class="card-img-top img-thumbnail" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{$producto->nombre}}</h5>
            @auth
          <h6 class="card-text">{{$producto->precio_propuesto}}</h6>
            @endauth
          <p class="card-text">{{$producto->descripcion}}</p>
          @auth
          <!--pasamos la id del producto por ruta-->
 <a href="{{route('DetallesProducto',['id'=>$producto->id])}}" class="btn btn-primary">Más información</a>
            @endauth
        </div>
    </div>
    @else
    <div class="card" style="width: 18rem;" id="imagenes">
        <img src="{{route('inicio.producto',['filename'=>$producto->image])}}" class="card-img-top img-thumbnail" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{$producto->nombre}}</h5>
            @auth
          <h6 class="card-text">{{$producto->precio_propuesto}}</h6>
            @endauth
          <p class="card-text">{{$producto->descripcion}}</p>
          @auth
          <!--pasamos la id del producto por ruta-->
          <h3>Producto Agotado</h3>
            @endauth
        </div>
    </div>
     @endif
        @endforeach
</div>
@endsection

