@extends('layouts.plantilla')
@section('titulo', 'Lista de  Ventas')

@section('contenido')
    <br>
    <h4 style="text-align: center" class="text-secondary">Listado de Ventas</h4>
<div class="table-responsive scrollbar">

    <div id="bulk-select-replace-element" style="padding: 25px">
        <a href="{{route('venta.create')}}"><button class="btn btn-outline-primary me-1 mb-1" type="button"><span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span><span class="ms-1">Nuevo Registro</span></button></a>
        {{-- <a href=""><button class="btn btn-outline-danger me-1 mb-1" type="button"><span class="bi bi-filetype-pdf" data-fa-transform="shrink-3 down-2"></span><span class="ms-1">Generar Reporte</span></button></a> --}}
    </div>
    {{-- <div class="w-10 relative text-slate-500">
        <form class="d-flex" role="search"  method="GET">
            <input name="buscarpor" type="text" class="form-control" placeholder="Buscar por Codigo" value="{{$buscarpor}}">
            <button class="btn btn-primary shadow-md mr-2" >Buscar</button> 
        </form>  
        <br>
    </div> --}}
    <table class="table table-hover table-striped overflow-hidden">
      <thead class="text-center table-primary">
        <tr>
            <th style="font-size: 14px" scope="col">CÓDIGO</th>
            <th style="font-size: 14px" scope="col">TIPO</th>
            <th style="font-size: 14px" scope="col">FECHA</th>
            <th style="font-size: 14px" scope="col">CLIENTE</th>  
            <th style="font-size: 14px" scope="col">DNI</th>         
            <th style="font-size: 14px" scope="col">TOTAL</th>
            {{-- <th style="font-size: 14px" scope="col">OPCIONES</th> --}}
        </tr>
      </thead>
      <tbody class="text-center">
        @if (count($venta)<=0)
            <tr>
            <td colspan="8">No hay registros</td>
            </tr>
        @else
            @foreach($venta as $itemventa)
            <tr>
                <td>{{$itemventa->idventa}}</td>
                <td>{{$itemventa->fecha}}</td>
                <td>{{$itemventa->tipo->descripcion}}</td>
                <td>{{$itemventa->cliente->nombres}}</td>
                <td>{{$itemventa->cliente->dni}}</td>              
                <td>{{$itemventa->total}}</td>
                <td class="text-center">
                    {{-- <a href="" class="btn btn-info btn-sm"><i class="bi bi-eye" style="font-size: 18px"></i></a> --}}
                    <a href="{{route('venta.edit',$itemventa->idventa)}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square" style="font-size: 18px"></i></a>
                    <a href="{{route('venta.confirmar',$itemventa->idventa)}}" class="btn btn-danger btn-sm"><i class="bi-x-square" style="font-size: 18px"></i></a>
                </td>
            </tr>
            @endforeach
         @endif 
      </tbody>
    </table>
    <div class="pagination justify-content-center">
        {{$venta->links()}}
      </div>
@endsection
