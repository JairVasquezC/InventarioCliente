@extends('layouts.plantilla')
@section('titulo', 'Lista de  Producto')

@section('contenido')
    {{-- <div class="card mb-3">
        <div class="card-body">
        <div class="row flex-between-center">
            <div class="col-sm-auto mb-2 mb-sm-0">
            <h6 class="mb-0">Showing 1-24 of 205 Products</h6>
            </div>
            <div class="col-sm-auto">
            <div class="row gx-2 align-items-center">
                <div class="col-auto">
                <form class="row gx-2">
                    <div class="col-auto"><small>Sort by:</small></div>
                    <div class="col-auto">
                    <select class="form-select form-select-sm" aria-label="Bulk actions">
                        <option selected="">Best Match</option>
                        <option value="Refund">Newest</option>
                        <option value="Delete">Price</option>
                    </select>
                    </div>
                </form>
                </div>
                <div class="col-auto pe-0"> <a class="text-600 px-1" href="../../../app/e-commerce/product/product-list.html" data-bs-toggle="tooltip" data-bs-placement="top" title="Product List"><span class="fas fa-list-ul"></span></a></div>
            </div>
            </div>
        </div>
        </div>
    </div> --}}
    <br>
    <h4 style="text-align: center">Lista de Productos</h4><br>
        <div class="card-body">
            <form class="d-flex" role="search"  method="GET">
                <select class="form-control" id="idcategoria" name="idcategoria">
                    <option value="-1" selected>Todos</option> 
                    @foreach($categoria as $itemcategoria)
                        <option value="{{$itemcategoria['idcategoria']}}" 
                            {{ $itemcategoria['idcategoria'] == $idCategoria ? 'selected' : '' }}
                        >{{$itemcategoria['descripcion']}}</option>                   
                    @endforeach
                </select>
                <button class="btn btn-primary shadow-md mr-2">Buscar</button> 
            </form> <br>
            <div class="row">
                @if (count($producto) > 0)
                    @foreach($producto as $itemproducto)
                        <div class="mb-4 col-md-3">
                            
                                <div class="border rounded-1 h-30 d-flex flex-column justify-content-between pb-3">
                                    <div class="overflow-hidden">
                                        <div class="position-relative rounded-top overflow-hidden" style="text-align: center">
                                            <a class="d-block" href=".">
                                                <img src="images/{{$itemproducto->imagen}}" alt="" width="200px">
                                            </a>
                                        </div>
                                        <div class="p-3">                            
                                            <h5 class="fs-0">
                                                <a class="text-dark" href="·">{{$itemproducto->descripcion}}</a>
                                            </h5>
                                            <p class="fs--1 mb-3">
                                                <a class="text-500" href=".">{{$itemproducto->categoria->descripcion}}</a>
                                            </p>
                                            <h5 class="fs-md-2 text-warning  d-flex align-items-center "> S/. {{$itemproducto->precio}}.00
                                            </h5>                             
                                        </div>
                                    </div>
                                    {{-- <div class="d-flex flex-between-center px-3">
                                        <div class="center" style=";padding-left: 35px">
                                            <button class="btn btn-warning mr-2" type="submit" style="width: 125px">Agregar&nbsp;<span class="fas fa-cart-plus"></span></button><br>
                                           
                                        </div>
                                    </div> --}}
                                </div><br>
                        
                        </div>
                    @endforeach
                @else 
                    <div class="mb-4 col-md-12">
                        <p style="text-align: center">No hay Registros</p>
                    </div>
                @endif
            </div>
           
        </div>
        
@endsection

