@extends('home')
@section('home')
<?php
use App\User;
$usuarios = User::all();
?>
<div class="col-11">
<table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">iD</th>
            <th scope="col">Cliente</th>
            <th scope="col">Editar Eliminar</th>
          </tr>
        </thead>
        <tbody>
          @foreach($usuarios as $usuario)
          @if($usuario->admi==0)
          <tr>
            <td>{{$usuario->id}}</td>
            <td>{{$usuario->name}}</td>
            <td><a href="{{route('clienteEditar',['id'=>$usuario->id])}}" class="btn btn-success" id="imagenes">Editar</a><a href="{{route('clienteEliminar',['id'=>$usuario->id])}}" class="btn btn-danger" id="imagenes">Eliminar</a></td>
          </tr>
          @endif
    @endforeach
        </tbody>
      </table>

</div>
@endsection