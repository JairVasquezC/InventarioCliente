@extends('layouts.plantilla')
@section('titulo', 'Eliminar Producto')

@section('contenido')
<div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-d4ebf6c5-74b4-4308-8c64-cda718c9b324"
 id="dom-d4ebf6c5-74b4-4308-8c64-cda718c9b324" style="padding: 25px">
        <div class="mb-3">
            <label class="form-label" for="basic-form-name">CODIGO:</label>
            <input class="form-control" type="text" placeholder="{{$producto->idproducto}}"  disabled/>
            

            <label class="form-label" for="basic-form-name">NOMBRE:</label>
            <input class="form-control" @error('descripcion') is-invalid @enderror type="text" placeholder="{{$producto->descripcion}}" disabled/>
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
            <input class="form-control" @error('precio') is-invalid @enderror type="text" placeholder="{{$producto->precio}}" disabled/>
                @error('precio')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
           
            <label class="form-label" for="basic-form-name">STOCK:</label>
            <input class="form-control" @error('stock') is-invalid @enderror type="text" placeholder="{{$producto->stock}}" disabled/>
                @error('stock')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
                <br>
            
            <label class="form-label" for="basic-form-name">IMAGEN:</label>
            <input class="form-control" @error('imagen') is-invalid @enderror type="text" placeholder="{{$producto->imagen}}" disabled/>
                @error('imagen')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
                <br>
            <form method="POST"  action="{{route('producto.destroy',$producto->idproducto)}}">
                @method('delete')
                @csrf
                <button class="btn btn-danger" type="submit" style="width: 110px">Eliminar</button>
                <a href="{{route('cancelarp')}}" class="btn btn-warning" style="width: 110px">Cancelar</a>
               
                
            </form>        
      </div>
  </div>
@endsection