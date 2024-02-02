@extends('layouts.plantilla')
@section('titulo', 'Edit Categoria')

@section('contenido')
<div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-d4ebf6c5-74b4-4308-8c64-cda718c9b324"
 id="dom-d4ebf6c5-74b4-4308-8c64-cda718c9b324" style="padding: 25px">
    <form method="POST" action="{{route('categoria.update',$categoria->idcategoria)}}"> 
        @method('put')
    @csrf
        <div class="mb-3">
            <label class="form-label" for="basic-form-name">Codigo:</label>
            <input class="form-control" type="text" placeholder="id" id="id" name="id" value="{{$categoria->idcategoria}}" disabled/>

            <label class="form-label" for="basic-form-name">Descripcion:</label>
            <input class="form-control" @error('descripcion') is-invalid @enderror type="text" placeholder="Ingrese descripcion" id="descripcion" name="descripcion" value="{{$categoria->descripcion}}"/>
                @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
      </div>
      
      <button class="btn btn-primary" type="submit" style="width: 130px">Actualizar</button>
      <a href="{{route('cancelar')}}" class="btn btn-danger" style="width: 110px">Cancelar</a>

      
    </form>
</div>
@endsection
