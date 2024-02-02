@extends('layouts.plantilla')
@section('titulo', 'Registrar Producto')

@section('contenido')

<div class="table-responsive scrollbar">

    <div id="bulk-select-replace-element" style="padding: 25px">
        <a href="{{route('producto.create')}}"><button class="btn btn-outline-primary me-1 mb-1" type="button"><span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span><span class="ms-1">Nuevo Registro</span></button></a>
        <a href="{{route('descargarPDFP')}}"><button class="btn btn-outline-danger me-1 mb-1" type="button"><span class="bi bi-filetype-pdf" data-fa-transform="shrink-3 down-2"></span><span class="ms-1">Generar Reporte</span></button></a>
      </div>

    <table class="table  overflow-hidden">
      <thead class="text-center table-primary" style="color: #2C7BE5;background-color: cadetblue">
        <tr>
            <th style="font-size: 14px" scope="col">CÓDIGO</th>
            <th style="font-size: 14px" scope="col">NOMBRE</th>
            <th style="font-size: 14px" scope="col">CATEGORIA</th>
            <th style="font-size: 14px" scope="col">PRECIO</th>
            <th style="font-size: 14px" scope="col">STOCK</th>
            <th style="font-size: 14px" scope="col">IMAGEN</th>
            <th style="font-size: 14px" scope="col">OPCIONES</th>
        </tr>
      </thead>
      <tbody class="text-center">
        @if (count($producto)<=0)
            <tr>
            <td colspan="8">No hay registros</td>
            </tr>
        @else
            @foreach($producto as $itemproducto)
            <tr>
                <td style="padding-top: 70px">{{$itemproducto->idproducto}}</td>
                <td style="padding-top: 70px">{{$itemproducto->descripcion}}</td>
                <td style="padding-top: 70px">{{$itemproducto->categoria->descripcion}}</td>
                <td style="padding-top: 70px">S/. {{$itemproducto->precio}}.0</td>
                <td style="padding-top: 70px">{{$itemproducto->stock}}</td>
                <td>
                  <img src="images/{{$itemproducto->imagen}}" alt="" width="150px">
                </td>
                <td class="text-center" style="padding-top: 70px">
                    
                    <a href="{{route('producto.edit',$itemproducto->idproducto)}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square" style="font-size: 18px"></i></a>
                    <a href="{{route('producto.confirmar',$itemproducto->idproducto)}}" class="btn btn-danger btn-sm"><i class="bi-x-square" style="font-size: 18px"></i></a>
                </td>
            </tr>
            @endforeach
         @endif 
      </tbody>
    </table>
    <div class="pagination justify-content-center">
      {{$producto->links()}}
    </div>
   
</div>

@endsection