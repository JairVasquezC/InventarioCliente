@extends('layouts.plantilla')
@section('titulo', 'Edit Cliente')

@section('contenido')
<div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-d4ebf6c5-74b4-4308-8c64-cda718c9b324"
 id="dom-d4ebf6c5-74b4-4308-8c64-cda718c9b324" style="padding: 25px">
    <form method="POST" action="{{route('cliente.update',$cliente->idcliente)}}"> 
        @method('put')
    @csrf
        <div class="mb-3">
            <label class="form-label" for="basic-form-name">CODIGO:</label>
            <input class="form-control" type="text" placeholder="id" id="id" name="id" value="{{$cliente->idcliente}}" disabled/>

            <label class="form-label" for="basic-form-name">DNI:</label>
            <input class="form-control" @error('dni') is-invalid @enderror type="text" placeholder="Ingrese DNI" id="dni" name="dni" value="{{$cliente->dni}}"/>
                @error('dni')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror

            <label class="form-label" for="basic-form-name">NOMBRES:</label>
            <input class="form-control" @error('nombres') is-invalid @enderror type="text" placeholder="Ingrese Nombres" id="nombres" name="nombres" value="{{$cliente->nombres}}"/>
                @error('nombres')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            
            <label class="form-label" for="basic-form-name">APELLLIDOS:</label>
            <input class="form-control" @error('apellidos') is-invalid @enderror type="text" placeholder="Ingrese Apellidos" id="apellidos" name="apellidos" value="{{$cliente->apellidos}}"/>
                @error('apellidos')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            
            <label class="form-label" for="basic-form-name">DIRECCION:</label>
            <input class="form-control" @error('direccion') is-invalid @enderror type="text" placeholder="Ingrese Direccion" id="direccion" name="direccion" value="{{$cliente->direccion}}"/>
                @error('direccion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror

            <label class="form-label" for="basic-form-name">TELEFONO:</label>
            <input class="form-control" @error('telefono') is-invalid @enderror type="text" placeholder="Ingrese Telefono" id="telefono" name="telefono" value="{{$cliente->telefono}}"/>
                @error('telefono')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
        </div>
      
        <button class="btn btn-primary" type="submit" style="width: 130px">Actualizar</button>
      <a href="{{route('cancelarc')}}" class="btn btn-danger" style="width: 110px">Cancelar</a>

      
    </form>
  </div>
@endsection