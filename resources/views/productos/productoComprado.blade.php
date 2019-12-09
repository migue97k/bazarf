@extends('home')
@section('home')
<div class="col-11">
<?php
//obtenemos los valores de la tablas
use App\Venta;
$ventas = venta::all();
?>
@if(Auth::user()->admi)
<h1>Productos Comprados</h1>
<table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">iD</th>
            <th scope="col">Producto</th>
            <th scope="col">Precio</th>
            <th scope="col">Vendedor</th>
            <th scope="col">Comprador</th>
          </tr>
        </thead>
        <tbody>
          <!--/pasamos los datos de la base de datos a la variable-->
          @foreach($ventas as $venta)
          <!--//verificamos que el comprador sea la misma id para mostrar los datos-->
          <tr>
            <th scope="row">{{$venta->id}}</th>
            <td>{{$venta->producto->nombre}}</td>
            <td>{{$venta->producto->precio_propuesto}}</td>
            <td>{{$venta->userss->name}}</td>
            <td>{{$venta->users->name}}</td>
          </tr>
          @endforeach

        </tbody>
      </table>
@else
<h1>Productos Comprados</h1>
<table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">iD</th>
            <th scope="col">Producto</th>
            <th scope="col">Precio</th>
            <th scope="col">Vendedor</th>
          </tr>
        </thead>
        <tbody>
          <!--/pasamos los datos de la base de datos a la variable-->
          @foreach($ventas as $venta)
          <!--//verificamos que el comprador sea la misma id para mostrar los datos-->
          @if($venta->comprador == Auth::user()->id)
          <tr>
            <th scope="row">{{$venta->id}}</th>
            <td>{{$venta->producto->nombre}}</td>
            <td>{{$venta->producto->precio_propuesto}}</td>
            <td>{{$venta->userss->name}}</td>
          </tr>
          @endif
          @endforeach

        </tbody>
      </table>
@endif
</div>
@endsection