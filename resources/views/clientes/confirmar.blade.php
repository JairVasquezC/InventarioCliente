@extends('layouts.plantilla')
@section('titulo', 'Eliminar Clientes')

@section('contenido')
<div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-d4ebf6c5-74b4-4308-8c64-cda718c9b324"
 id="dom-d4ebf6c5-74b4-4308-8c64-cda718c9b324" style="padding: 25px">
    @csrf
        <div class="mb-3">
            <label class="form-label" for="basic-form-name">CODIGO:</label>
            <input class="form-control" type="text" placeholder="{{$cliente->idcliente}}"  disabled/>
            

            <label class="form-label" for="basic-form-name">DNI:</label>
            <input class="form-control" @error('dni') is-invalid @enderror type="text" placeholder="{{$cliente->dni}}" disabled/>
                @error('dni')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            
            <label class="form-label" for="basic-form-name">NOMBRES:</label>
            <input class="form-control" @error('nombres') is-invalid @enderror type="text" placeholder="{{$cliente->nombres}}" disabled/>
                @error('nombres')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
           
            <label class="form-label" for="basic-form-name">APELLIDOS:</label>
            <input class="form-control" @error('apellidos') is-invalid @enderror type="text" placeholder="{{$cliente->apellidos}}" disabled/>
                @error('apellidos')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
                <br>
            
            <label class="form-label" for="basic-form-name">DIRECCION:</label>
            <input class="form-control" @error('direccion') is-invalid @enderror type="text" placeholder="{{$cliente->direccion}}" disabled/>
                @error('direccion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
                <br>
            
            <label class="form-label" for="basic-form-name">TELEFONO:</label>
            <input class="form-control" @error('telefono') is-invalid @enderror type="text" placeholder="{{$cliente->telefono}}" disabled/>
                @error('telefono')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
                <br>
                
            <form method="POST"  action="{{route('cliente.destroy',$cliente->idcliente)}}">
                @method('delete')
                @csrf
                <button class="btn btn-danger" type="submit" style="width: 110px">Eliminar</button>
                <a href="{{route('cancelarc')}}" class="btn btn-warning" style="width: 110px">Cancelar</a>
                
            </form>        
        </div>
      
    

      
    </form>
  </div>
@endsection