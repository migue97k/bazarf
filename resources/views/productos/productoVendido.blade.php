@extends('home')
@section('home')
<div class="col-11">
<?php
//obtenemos los valores de la tablas
use App\Venta;
$ventas = venta::all();
$suma=0;
?>
<h1>Productos Vendidos</h1>
<table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">iD</th>
            <th scope="col">Producto</th>
            <th scope="col">Precio</th>
            <th scope="col">Comprador</th>
          </tr>
        </thead>
        <tbody>
          <!--//pasamos los datos de la base de datos a la variable-->
          @foreach($ventas as $venta)
          <!--verificamos que el vendedor sea la misma id para mostrar los datos-->
          @if($venta->quien_vendio == Auth::user()->id)
          <tr>
            <th scope="row">{{$venta->id}}</th>
            <td>{{$venta->producto->nombre}}</td>
            <td>{{$venta->producto->precio_propuesto}}</td>
            <td>{{$venta->users->name}}</td>
            <?php
            $suma=$suma+$venta->producto->precio_propuesto;
            ?>
          </tr>
          @endif
          @endforeach
          <tr>
            <th scope="row"></th>
            <td>Total de ventas : </td>
            <td>{{$suma}}</td>
            <td></td>
          </tr>
        </tbody>
      </table>
      <center>
      </center>
</div>
@endsection