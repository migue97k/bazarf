@extends('home')
@section('home')
<?php
use App\Producto;
$productos = Producto::all();
?>
<div style="width:800px; padding:5px;">
<div style="width:245px; float:left;">
    <h1>Ropa</h1>
     @foreach($productos as $producto)
     @if($producto->area_id == 15)
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
    @endif
@endforeach

</div>

<div style="width:245px; float:right;">
    <h1>Bolsa</h1>
     @foreach($productos as $producto)
     @if($producto->area_id == 16)
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
    @endif
@endforeach


</div>

<div style="width:245px; float:right;">
    <h1>Calzado</h1>
     @foreach($productos as $producto)
     @if($producto->area_id == 17)
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
    @endif
@endforeach

</div>
</div>
@endsection
