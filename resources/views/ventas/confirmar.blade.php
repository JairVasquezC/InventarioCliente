@extends('layouts.plantilla')
@section('titulo', 'Eliminar Venta')

@section('contenido')
<div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-d4ebf6c5-74b4-4308-8c64-cda718c9b324"
 id="dom-d4ebf6c5-74b4-4308-8c64-cda718c9b324" style="padding: 25px">
     <div class="mb-3">
        <label class="form-label" for="basic-form-name">CODIGO:</label>
        <input class="form-control" type="text" placeholder="{{$venta->idventa}}"  disabled/>

        <label class="control-label">FECHA:</label>
        <input class="form-control @error('fecha') is-invalid @enderror" type="text"  placeholder="{{$venta->fecha}}" />
            @error('fecha')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            </span>
            @enderror

        <label class="form-label" for="basic-form-name">CLIENTE:</label>
            <select class="form-control" name="idcliente" id="idcliente">
                <option selected disabled>Elegir Opcion</option>
                @foreach($cliente as $itemcliente)
                    <option value="{{$itemcliente['idcliente']}}" {{$itemcliente->idcliente == $venta->idcliente ? 'selected':''}}>
                        {{$itemcliente['nombres']}}, {{$itemcliente['apellidos']}}
                    </option>
                @endforeach
            </select>
        
        <label class="form-label" for="basic-form-name">PRODUCTO:</label>
        <select class="form-control" name="idproducto" id="idproducto">
            <option selected disabled>Elegir Opcion</option>
            @foreach($producto as $itemproducto)
                <option value="{{$itemproducto['idproducto']}}" {{$itemproducto->idproducto == $venta->idproducto ? 'selected':''}}>
                    {{$itemproducto['descripcion']}}
                </option>
            @endforeach
        </select>
        
        <label class="form-label" for="basic-form-name">CANTIDAD:</label>
        <input class="form-control" @error('cantidad') is-invalid @enderror type="text" placeholder="{{$venta->cantidad}}"/>
            @error('cantidad')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        <br>        
        <form method="POST"  action="{{route('venta.destroy',$venta->idventa)}}">
            @method('delete')
            @csrf
            <button class="btn btn-danger" type="submit" style="width: 110px">Eliminar</button>
            <a href="{{route('cancelarv')}}" class="btn btn-warning" style="width: 110px">Cancelar</a>
        </form>        
      </div>
  </div>
@endsection