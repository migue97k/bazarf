@extends('home')
@section('home')
<?php
use App\Producto;
$productos = Producto::all();
$now = new \DateTime();
?>
<div>
	<div class="card" style="width: 50rem;" id="imagenes">
	@foreach($productos as $producto)
	@if($producto->id==$id)
    <h1 class="card-title">{{$producto->nombre}}</h1>
	<img src="{{route('inicio.producto',['filename'=>$producto->image])}}" class="card-img-top img-thumbnail" alt="...">
    <p class="card-text">{{$producto->descripcion}}</p>
    @auth
    <h3 class="card-text">{{$producto->precio_propuesto}}</h3>

    <form method="POST" action="{{ route('saveventas') }}">
                        @csrf
        <input id="producto_id" type="hidden" name="producto_id" value="{{$producto->id}}" required>

        <input id="Fecha" type="hidden" name="Fecha" value="{{$now->format('Y-m-d')}}" required>

        <input id="quien_vendio" type="hidden" name="quien_vendio" value="{{$producto->users->id}}" required>

        <input id="precio_venta" type="hidden" name="precio_venta" value="{{$producto->precio_propuesto}}" required>

        <input id="comprador" type="hidden" name="comprador" value="{{Auth::user()->id}}" required>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Pagar') }}
                                </button>
                            </div>
                        </div>
                    </form>
    @endauth
	@endif
    @endforeach
</div>
</div>

@endsection