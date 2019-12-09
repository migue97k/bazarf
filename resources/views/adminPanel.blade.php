@extends('home')

@section('home')
   <?php
use App\Area;
$usuarios = Area::all();
?>
<div class="col-11">
<table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">iD</th>
            <th scope="col">Categoria</th>
            <th scope="col">Descripcion</th>
          </tr>
        </thead>
        <tbody>
          @foreach($usuarios as $usuario)
          <tr>
            <td>{{$usuario->id}}</td>
            <td>{{$usuario->name}}</td>
            <td>{{$usuario->descripcion}}</td>
          </tr>

    @endforeach
        </tbody>
      </table>

              <div class="form-group row mb-0">
                  <div class="col-md-6 offset-md-4">
                    <a href="{{route('alimentosybebidas')}}" class="btn btn-success" id="imagenes">Agregar</a>
                  </div>
              </div>

</div>
@endsection