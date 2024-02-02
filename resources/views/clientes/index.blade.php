@extends('layouts.plantilla')
@section('titulo', 'Registrar Cliente')

@section('contenido')

<div class="table-responsive scrollbar">

    <div id="bulk-select-replace-element" style="padding: 25px">
        <a href="{{route('cliente.create')}}"><button class="btn btn-outline-primary me-1 mb-1" type="button"><span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span><span class="ms-1">Nuevo Registro</span></button></a>
        <a href="{{route('descargarPDFC')}}"><button class="btn btn-outline-danger me-1 mb-1" type="button"><span class="bi bi-filetype-pdf" data-fa-transform="shrink-3 down-2"></span><span class="ms-1">Generar Reporte</span></button></a>
      </div>

    <table class="table table-hover table-striped overflow-hidden">
      <thead class="text-center table-primary">
        <tr>
            <th style="font-size: 14px" scope="col">CÓDIGO</th>
            <th style="font-size: 14px" scope="col">DNI</th>
            <th style="font-size: 14px" scope="col">NOMBRES</th>
            <th style="font-size: 14px" scope="col">APELLIDOS</th>
            <th style="font-size: 14px" scope="col">DIRECCION</th>
            <th style="font-size: 14px" scope="col">TELEFONO</th>
            <th style="font-size: 14px" scope="col">OPCIONES</th>
        </tr>
      </thead>
      <tbody class="text-center">
        @if (count($cliente)<=0)
            <tr>
            <td colspan="8">No hay registros</td>
            </tr>
        @else
            @foreach($cliente as $itemcliente)
            <tr>
                <td>{{$itemcliente->idcliente}}</td>
                <td>{{$itemcliente->dni}}</td>
                <td>{{$itemcliente->nombres}}</td>
                <td>{{$itemcliente->apellidos}}</td>
                <td>{{$itemcliente->direccion}}</td>
                <td>{{$itemcliente->telefono}}</td>
                <td class="text-center">
                    {{-- <a href="" class="btn btn-info btn-sm"><i class="bi bi-eye" style="font-size: 18px"></i></a> --}}
                    <a href="{{route('cliente.edit',$itemcliente->idcliente)}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square" style="font-size: 18px"></i></a>
                    <a href="{{route('cliente.confirmar',$itemcliente->idcliente)}}" class="btn btn-danger btn-sm"><i class="bi-x-square" style="font-size: 18px"></i></a>
                </td>
            </tr>
            @endforeach
         @endif 
      </tbody>
    </table>
    <div class="pagination justify-content-center">
      {{$cliente->links()}}
    </div>
   
</div>

@endsection