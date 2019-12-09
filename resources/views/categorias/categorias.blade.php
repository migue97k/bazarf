@extends('home')
@section('home')
<?php
use App\Area;
use App\Producto;
$areas = Area::find($id);;
$productos = Producto::all();
?>
<div>
<h3>{{$areas->name}}</h3>
    @foreach($productos as $producto)
    @if($producto->area_id == $id)
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
            <h3>Producto Agotado</h3>
            @endauth
        </div>
    </div>
    @endif
     @endif
        @endforeach
</div>
@endsection
