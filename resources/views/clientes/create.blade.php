@extends('layouts.plantilla')
@section('titulo', 'Registrar Cliente')

@section('contenido')
<div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-d4ebf6c5-74b4-4308-8c64-cda718c9b324" 
        id="dom-d4ebf6c5-74b4-4308-8c64-cda718c9b324" style="padding: 25px">
    <form  method="POST" action="{{route('cliente.store')}}" style="padding: 5px">
        @csrf
        <div class="form-group">
            <label class="form-label" for="basic-form-name">DNI:</label>
            <input class="form-control @error('dni') is-invalid @enderror" type="text" placeholder="Ingrese DNI" id="dni" name="dni"/>
                @error('dni')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
        </div>
        
        <div class="form-group">
            <label class="form-label" for="basic-form-name">NOMBRES:</label>
            <input class="form-control @error('nombres') is-invalid @enderror" type="text" id="nombres" name="nombres" placeholder="Ingrese Nombre">
                @error('nombres')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
        </div>
        <div class="form-group">
            <label class="form-label" for="basic-form-name">APELLIDOS:</label>
            <input class="form-control @error('apellidos') is-invalid @enderror" type="text" id="apellidos" name="apellidos" placeholder="Ingrese Apellidos" value=""/>
                @error('apellidos')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="basic-form-name">DIRECCION:</label>
            <input class="form-control @error('direccion') is-invalid @enderror" type="text" id="direccion" name="direccion" placeholder="Ingrese Direccion" value=""/>
                @error('direccion')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
        </div>

        <div class="form-group">
            <label class="form-label" for="basic-form-name">TELEFONO:</label>
            <input class="form-control @error('telefono') is-invalid @enderror" type="text" id="telefono" name="telefono" placeholder="Ingrese Telefono" value=""/>
                @error('telefono')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
        </div>
      
        <br>
        <button class="btn btn-primary" type="submit" style="width: 110px">Registrar</button>
        <a href="{{route('cancelarc')}}" class="btn btn-danger" style="width: 110px">Cancelar</a>
      
    </form>
</div>
  
@endsection

