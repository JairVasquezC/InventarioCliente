@extends('layouts.plantilla')
@section('titulo', 'Registrar Categoria')

@section('contenido')

<div class="table-responsive scrollbar">

    <div id="bulk-select-replace-element" style="padding: 25px">
        <a href="{{route('categoria.create')}}"><button class="btn btn-outline-primary me-1 mb-1" type="button"><span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span><span class="ms-1">Nuevo Registro</span></button></a>
        <a href="{{route('descargarPDF')}}"><button class="btn btn-outline-danger me-1 mb-1" type="button"><span class="bi bi-filetype-pdf" data-fa-transform="shrink-3 down-2"></span><span class="ms-1">Generar Reporte</span></button></a>
      </div>
    
    <table class="table table-hover overflow-hidden">
      <thead class="text-center table-primary">
        <tr >
          <th style="font-size: 14px" scope="col">CÒDIGO</th>
          <th style="font-size: 14px" scope="col">DESCRIPCIÒN</th>
          <th style="font-size: 14px" scope="col">OPCIONES</th>
        </tr>
      </thead>
      <tbody class="text-center">
        @if (count($categoria)<=0)
            <tr>
            <td colspan="3">No hay registros</td>
            </tr>
        @else
            @foreach($categoria as $itemcategoria)
            <tr>
                <td>{{$itemcategoria->idcategoria}}</td>
                <td>{{$itemcategoria->descripcion}}</td>
                <td class="text-center">
                    {{-- <a href="" class="btn btn-primary btn-sm"><i class="bi bi-eye" style="font-size: 15px"></i></a> --}}
                    <a href="{{route('categoria.edit',$itemcategoria->idcategoria)}}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square" style="font-size: 15px"></i></a>
                    <button onclick="confirmar_eliminar({{$itemcategoria->idcategoria}},'{{$itemcategoria->descripcion}}')" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirm-delete-modal"><i class="bi-x-square" style="font-size: 15px"></i></button>
                </td>
            </tr>
            @endforeach
         @endif 
      </tbody>
    </table>
    <div class="pagination justify-content-center">
      {{$categoria->links()}}
    </div>
    
</div>
<script >

  var idselected = null
  function confirmar_eliminar(id,descripcion){
    var codigoText = document.getElementById('confirm-delete-modal_codigo')
    var descripcionText = document.getElementById('confirm-delete-modal_descripcion')
    codigoText.innerHTML=id
    descripcionText.innerHTML=descripcion
    idselected = id
  }
  function eliminar(){
  $.ajax({url: "{{route('categoria.index')}}/eliminar/"+idselected, method: 'DELETE', success: function(result){
    location.reload()
  }});

  }
</script>


<div class="modal fade" id="confirm-delete-modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
    <div class="modal-content position-relative">
      <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
        <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0">
        <div class="p-4 pb-0">
          <h5> ¿ Desea eliminar registro ?</h5>
          <div><strong>Codigo:</strong> <span id="confirm-delete-modal_codigo"></span></div>
          <div><strong>Descripción:</strong> <span id="confirm-delete-modal_descripcion"></span></div>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cerrar</button>
        <button class="btn btn-danger" type="button" onclick="eliminar()">Eliminar </button>
      </div>
    </div>
  </div>
</div>
@endsection