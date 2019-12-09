@extends('home')
@section('home')
<?php
use App\Area;
use App\Producto;
$grupos = Area::all();
$productos = Producto::all();
?>

   <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edita producto</div>

                <div class="card-body">
                    <form method="POST" action="{{route('producto.update',['id'=>$id])}}" enctype="multipart/form-data">
                        @csrf
                        @foreach($productos as $producto)
                        @if($producto->id==$id)
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre del producto</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $producto->nombre }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="precio" class="col-md-4 col-form-label text-md-right">Precio</label>

                                <div class="col-md-6">
                                    <input id="precio" type="text" class="form-control @error('precio') is-invalid @enderror" name="precio" value="{{ $producto->precio_propuesto }}" required autocomplete="precio" autofocus>

                                    @error('precio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        <div class="form-group row">
                            <label for="cantidad" class="col-md-4 col-form-label text-md-right">Cantidad</label>

                            <div class="col-md-6">
                                <input id="cantidad" type="cantidad" class="form-control @error('cantidad') is-invalid @enderror" name="cantidad" value="{{ $producto->disponibles }}" required autocomplete="cantidad">

                                @error('cantidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion</label>

                            <div class="col-md-6">
                                <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror"  name="descripcion"  rows="3" placeholder="Escribe la descripcion">{{ $producto->descripcion }}</textarea>

                                @error('descripcion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                            <div class="form-group row">
                            <label for="categoria" class="col-md-4 col-form-label text-md-right">Categoria</label>

                            <div class="col-md-6">
                                <select   class="form-control" id="categoria" name="categoria"  >
                                <option hidden value="{{$producto->categori->id}}">{{ $producto->categori->name }}</option>
                                @foreach($grupos as $grupo)
                                <option value="{{$grupo->id}}">{{$grupo->name}}</option>
                            @endforeach
                                </select>
                                    @error('categoria')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="imagen" class="col-md-4 col-form-label text-md-right">Imagen</label>

                            <div class="col-md-6">
                                <input id="imagen" type="file" class="form-control @error('imagen') is-invalid @enderror" name="imagen" >
                                    @error('imagen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection