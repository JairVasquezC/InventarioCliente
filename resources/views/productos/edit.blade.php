@extends('layouts.plantilla')
@section('titulo', 'Editar Producto')

@section('contenido')
<div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-d4ebf6c5-74b4-4308-8c64-cda718c9b324"
 id="dom-d4ebf6c5-74b4-4308-8c64-cda718c9b324" style="padding: 25px">
    <form method="POST" action="{{route('producto.update',$producto->idproducto)}}"> 
        @method('put')
    @csrf
        <div class="mb-3">
            <label class="form-label" for="basic-form-name">CODIGO:</label>
            <input class="form-control" type="text" placeholder="id" id="id" name="id" value="{{$producto->idproducto}}" disabled/>

            <label class="form-label" for="basic-form-name">NOMBRE:</label>
            <input class="form-control" @error('descripcion') is-invalid @enderror type="text" placeholder="Ingrese descripcion" id="descripcion" name="descripcion" value="{{$producto->descripcion}}"/>
                @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror

            <label class="form-label" for="basic-form-name">CATEGORIA:</label>
                <select class="form-control" name="idcategoria" id="idcategoria">
                    <option selected disabled>Elegir Opcion</option>
                    @foreach($categoria as $itemcategoria)
                        <option value="{{$itemcategoria['idcategoria']}}" {{$itemcategoria->idcategoria == $producto->idcategoria ? 'selected':''}}>
                            {{$itemcategoria['descripcion']}}
                        </option>
                    @endforeach
                </select>
            
            <label class="form-label" for="basic-form-name">PRECIO:</label>
            <input class="form-control" @error('precio') is-invalid @enderror type="text" placeholder="Ingrese Precio" id="precio" name="precio" value="{{$producto->precio}}"/>
                @error('precio')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            
            <label class="form-label" for="basic-form-name">STOCK:</label>
            <input class="form-control" @error('stock') is-invalid @enderror type="text" placeholder="Ingrese Stock" id="stock" name="stock" value="{{$producto->stock}}"/>
                @error('stock')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            
            {{-- <label class="form-label" for="basic-form-name">Imagen:</label>
            <input class="form-control" @error('imagen') is-invalid @enderror type="file" placeholder="Ingrese Imagen" id="imagen" name="stock" value="{{$producto->stock}}"/>
                @error('imagen')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror --}}
            <div class="form-group">
                <label class="form-label" for="basic-form-name">IMAGEN:</label>
                <input class="form-control" @error('imagen') is-invalid @enderror type="file" id="imagen" name="imagen" value="{{$producto->imagen}}"/>
                    @error('imagen')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </div>
       
          


      </div>
      
      <button class="btn btn-primary" type="submit" style="width: 130px">Actualizar</button>
      <a href="{{route('cancelarp')}}" class="btn btn-danger" style="width: 110px">Cancelar</a>


      
    </form>
  </div>
@endsection
