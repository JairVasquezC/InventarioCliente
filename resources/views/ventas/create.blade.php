@extends('layouts.plantilla')
@section('titulo', 'Registrar Venta')
<script>
  window.onload = function(){
    var fecha = new Date(); //Fecha actual
    var mes = fecha.getMonth()+1; //obteniendo mes
    var dia = fecha.getDate(); //obteniendo dia
    var anio = fecha.getFullYear(); //obteniendo año

    if(dia<10)
        dia='0'+dia; //agrega cero si el menor de 10
    if(mes<10)
        mes='0'+mes //agrega cero si el menor de 10
    document.getElementById('fechaActual').value=anio+"-"+mes+"-"+dia;

    var hora = new Date(); //Hora actual
    var hrs= hora.getHours(); //Obteniendo la hora
    var min = hora.getMinutes(); //Obteniendo los minutos
    var seg = hora.getSeconds(); // Obteniendo los segundos

    if(hrs<10)
        hrs='0'+hrs; //agrega cero si el menor de 10
    if(min<10)
        min='0'+min //agrega cero si el menor de 10
    if(seg<10)
        seg='0'+seg //agrega cero si el menor de 10 
       
       document.getElementById('horaActual').value=hrs+":"+min+":"+seg;
    
  }
</script>
@section('contenido')
<br>
    <h4 style="text-align: center" class="text-primary">Registrar  Ventas</h4>
<div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-d4ebf6c5-74b4-4308-8c64-cda718c9b324" 
        id="dom-d4ebf6c5-74b4-4308-8c64-cda718c9b324" style="padding: 25px">
    <form  method="POST" action="{{route('venta.store')}}" style="padding: 5px">
        @csrf
        <div class="form-group">
            <div>
                <div class="col-md-1">
                    <label class="form-label" for="basic-form-name">FECHA:</label>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <input type="date" class="form-control @error('fecha_hora') is-invalid @enderror" name="fecha_hora" id="fechaActual" readonly onmousedown="return false;" required>
                            @error('fecha_hora')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                    </div>
                </div>
            </div><br>
                               
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <div>
                            <label for="idcliente" class="form-label" for="basic-form-name">CLIENTE:</label>
                            <select class="form-control selectpicker" style="width: 100%;" id="idcliente" name="idcliente" data-livesearch="true">
                                    <option value="0" selected disabled >- Seleccione Cliente -</option>
                                        @foreach($cliente as $itemcliente) 
                                            <option value="{{ $itemcliente->idcliente }}_{{ $itemcliente->dni }}_{{ $itemcliente->direccion }}" >
                                                {{ $itemcliente->nombres }}
                                            </option>
                                        @endforeach
                            </select>
                            {{-- <select class="form-control select2 select2- hiddenaccessible selectpicker" id="tipo_id" 
                                        name="tipo_id" onchange="mostrarTipo()">
                                <option selected disabled>Elegir Opcion</option>
                                @foreach($tipo as $itemtipo)
                                    <option value="{{$itemtipo['tipo_id']}}">
                                        {{$itemtipo['descripcion']}}</option>
                                @endforeach
                            </select> --}}
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="form-group">
                        <div>
                            <label class="form-label" for="basic-form-name">DNI:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="dni" id="dni" readonly="readonly">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div>
                            <label class="form-label" for="basic-form-name">DIRECCION:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="direccion" id="direccion" readonly="readonly">
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <br>   

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <div>
                            <label class="form-label" for="basic-form-name">TIPO_COMPROBANTE:</label>
                            <select class="form-control" id="tipo_id" name="tipo_id" onchange="mostrarTipo()">
                                <option selected disabled >- Seleccione Tipo -</option>
                                @foreach($tipo as $itemtipo)
                                    <option value="{{$itemtipo['tipo_id']}}">
                                        {{$itemtipo['descripcion']}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div>
                            <label class="form-label" for="basic-form-name">SERIE:</label>
                            <input class="form-control @error('serie_comprobante') is-invalid @enderror" type="text" id="serie_comprobante" name="serie_comprobante"/>
                                @error('serie_comprobante')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div>
                            <label class="form-label" for="basic-form-name">NÙMERO:</label>
                            <input class="form-control @error('num_comprobante') is-invalid @enderror" type="text" id="num_comprobante" name="num_comprobante"/>
                                @error('num_comprobante')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                        </div>
                    </div>
                </div>
            </div>
            <br>  


            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <div>
                            <label for="idproducto" class="form-label" for="basic-form-name">PRODUCTO:</label>
                            <select class="form-control selectpicker" style="width: 100%;" id="idproducto" name="idproducto" data-livesearch="true">
                                    <option value="0" selected disabled >- Seleccione Producto -</option>
                                        @foreach($producto as $itemproducto) 
                                            {{-- <option value="{{ $itemproducto->idproducto }}"> --}}
                                             <option value="{{ $itemproducto->idproducto }}_{{ $itemproducto->stock }}_{{ $itemproducto->precio}}">
                                                {{ $itemproducto->descripcion }}
                                            </option>
                                        @endforeach
                            </select>                       
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div>
                            <label class="form-label" for="basic-form-name">STOCK:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="stock" id="stock" readonly="readonly">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <div>
                            <label class="form-label" for="basic-form-name">PRECIO:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="precio" id="precio" readonly="readonly">
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <br>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="form-label" for="basic-form-name">CANTIDAD </label>
                        <div>
                            <input type="number"  value="1" class="form-control" name="cantidad" id="cantidad">      
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-4"style="padding-top: 34px" >                  
                            <button type="button" id="btnadddet" style="background:#21A0D7;border: #92B7DC;border-radius:5px;width: 80px" >
                                {{-- <span style="font-size: 28px;color: #303C48" class="fas fa-shopping-cart"></span> --}}
                                <span style="font-size: 23px;color: white;" class="bi bi-cart-plus"></span>
                                <strong style="padding-top: 50px;color: white;font-size: 15px">Add </strong>
                            </button>                            
                </div>

                <div class="col-md-2">
                    <input hidden type="number" class="form-control" name="stock" id="stock">
                </div>
            </div>
            <br>
            <div class="col-md-12 pt-3">
                <div class="table-responsive">
                    <table id="detalles" class="table table-striped table-bordered table-condensed ">
                        <thead class="bg-info bg-gradient text-900">
                            <th class="text-center">OPCIONES</th>
                            <th class="text-center">TIPO</th>
                            <th class="text-center">PRODUCTO</th>
                            <th class="text-center">STOCK</th>
                            <th class="text-center">CANTIDAD</th>
                            <th class="text-center">PRECIO VENTA</th>
                            <th class="text-center">SUBTOTAL</th>
                           
                        </thead>
                        <tfoot>
                        </tfoot>
                        <tbody>
                        </tbody>
                        </table>
                    </div>
            </div>                           

            <div class="row">
                <div class="col-md-8">
                </div>
                <div class="col-md-1">
                    <strong>TOTAL:</strong>
                    {{-- <label class="form-label">TOTAL : </label> --}}
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control textright" name="total" id="total" readonly="readonly">
                </div>
            </div>
            
            <div class="col-md-12 text-center">
                <div id="guardar">
                    <div class="form-group">
                        <button onclick="Prueba()" class="btn btn-primary" type="submit" id="btnRegistrar" dataloading-text="<i class='fa a-spinner fa-spin'></i> Registrando">
                        <i class='fas fa-save'></i> Registrar</button>
                        <a href="{{route('cancelarv')}}" class='btn btn-danger'><i class='fas fa-ban'></i> Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- <br>
        <button class="btn btn-primary" type="submit" style="width: 110px">Registrar</button>
       <a href="{{route('cancelarv')}}" class="btn btn-danger" style="width: 110px">Cancelar</a>
       --}}
    </form>
  </div>
@endsection
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function Prueba() {
            alert('Hola');
           
        }
    var cont = 0;
    var total = 0;
    var detalleventa = [];
    var subtotal = [];
    var controlproducto = [];
        $(document).ready(function () {
            $('#idcliente').change(function () {
                mostrarCliente();
            });
            $('#idproducto').change(function () {
                mostrarProducto();
            });
            $('#btnadddet').click(function () {
                agregarDetalle();
            });
        });

        function mostrarCliente() {
            
            datosCliente = document.getElementById('idcliente').value.split('_');
            $('#dni').val(datosCliente[1]);
            $('#direccion').val(datosCliente[2]);

            // idcliente=$("#idcliente").val();
            //     $.get('/EncontrarCliente/'+idcliente, function(data){

            //     $('input[name=dni]').val(data[0].dni);
            //     $('input[name=direccion]').val(data[0].direccion);
            // });
        }

        function mostrarProducto() {
            // alert('Se ha dado clic al botón!');
            datosProducto = document.getElementById('idproducto').value.split('_');
            $('#stock').val(datosProducto[1]);
            $('#precio').val(datosProducto[2]);

            // idproducto = $("#idproducto").val();
            //     $.get('/EncontrarProducto/' + idproducto, function (data) {
            //     $('input[name=idproducto]').val(data[0].idproducto);
            //     $('input[name=stock]').val(data[0].precio);
            //     $('input[name=precio]').val(data[0].stock);
            //     });

        }
        function mostrarMensajeError(mensaje) {
            $(".alert").css('display', 'block');
            $(".alert").removeClass("hidden");
            $(".alert").addClass("alert-danger");
            $(".alert").html("<button type='button' class='close' dataclose='alert'> ×</button>" +"<span><b>Error!</b> " + mensaje + ".</span>");
            $('.alert').delay(5000).hide(400);
        }

        function agregarDetalle() {
            nombres = $('#idcliente option:selected').text();
                if (nombres == '- Seleccione Cliente -') {
                    alert('Por favor seleccione el Cliente');
                    // mostrarMensajeError("Por favor seleccione el Cliente");
                    return false;
                    
                }
            descripcion = $('#idproducto option:selected').text();
                if (descripcion == '- Seleccione Producto -') {
                    alert("Por favor seleccione el Producto");
                    // mostrarMensajeError("Por favor seleccione el Producto");
                    return false;
                }  
            // alert('PRODUCTO2');
        
            let cantidad = parseFloat($("#cantidad").val());
            let stock = parseFloat($("#stock").val());
            if (cantidad == '' || cantidad == 0 || cantidad == null) {
                // alert('CANTIDAD1');
                mostrarMensajeError("Por favor ingrese cantidad del producto");
                return false;        
            }
            else{
                if (cantidad <= 0) {
                        mostrarMensajeError("Por favor debe escribir cantidad del producto mayor a 0 ");
                        // alert('CANTIDAD2');
                    return false;   
                }
                else
                     if (cantidad > stock) {
                        // alert('CANTIDAD6');
                            mostrarMensajeError("No se tiene tal cantidad de producto solo hay " +stock);
                    return false;
                }
            } 
                
            // alert('CANTIDAD');
        
            pventa = $("#precio").val();
            if (pventa == '' || pventa == 0) {
                alert('precio');
                mostrarMensajeError("Por favor ingrese precio de venta del producto");
                    return false;
            }
            // alert('precio1');
            
            cod_producto = $("#idproducto").val();
                /* Buscar que codigo de producto no se repita */
                var i = 0;
                var band = false;
                while (i < cont) {
                    if (controlproducto[i] == cod_producto)
                    {
                        band = true;
                    }
                    i = i + 1;
                }
                if (band == true) {
                    // alert('b1');
                    mostrarMensajeError("No puede volver a vender el mismo producto");
                return false;
                } else { 
                    // alert('b2');
                    subtotal[cont] = cantidad * pventa;
                    controlproducto[cont] = cod_producto;
                    total = total + subtotal[cont];
                    var fila = '<tr class="selected" style="text-align:center;" id="fila' + cont + '">'+
                    '<td><button  type="button" class="btn btn-warning" onclick="eliminardetalle(' + cod_producto + ',' + cont + ');"><i class="fa fa-times" ></i>&nbspEliminar</button></td>'+
                    '<td style="text-align:center;">'+ cod_producto +'</td> '+  
                    '<td style="text-align:center">' + descripcion + '</td> '+
                    '<td>' + stock + ' </td>'+
                    '<td style="textalign:right;">' + cantidad +'</td>'+
                    '<td style="textalign:right;">S/.' + pventa + '</td>'+
                    '<td style="textalign:right;">' + number_format(subtotal[cont], 2) +'</td>'+
                   
                    '</tr>';
                
                // alert('b3');
        
            
                $('#detalles').append(fila);
                    detalleventa.push
                    ({
                        codigo: cod_producto,
                        cantidad: cantidad,
                        pventa: pventa,
                        subtotal: subtotal
                    });
                    cont++;
                }
                // alert('b4');
                $('#total').val(number_format(total, 2));
                limpiar();
        }          
                
                

            function limpiar() {
                $("#cantidad").val('1');
                $("#idproducto").val("0").change();
                $("#precio").val('');
                $("#stock").val('');
                
            }

            /* Eliminar productos */
            function eliminardetalle(codigo, index) {
                total = total - subtotal[index];
                tam = detalleventa.length;
                var i = 0;
                var pos;
                while (i < tam) {
                    if (detalleventa[i].codigo == codigo)
                    {
                        pos = i;
                        break;
                    }
                    i = i + 1;
                }
                detalleventa.splice(pos, 1);
                $('#fila' + index).remove();
                controlproducto[index] = "";
                $('#total').val(number_format(total, 2));
            }


            function number_format(amount, decimals) {
                amount += ''; // por si pasan un numero en vez de un string
                amount = parseFloat(amount.replace(/[^0-9\.] /g, '')); // elimino cualquier cosa que no sea numero o punto
                decimals = decimals || 0; // por si la variable no fue fue pasada
                // si no es un numero o es igual a cero retorno el mismo cero
                if (isNaN(amount) || amount === 0)
                return parseFloat(0).toFixed(decimals);
                // si es mayor o menor que cero retorno el valor formateado como numero
                amount = '' + amount.toFixed(decimals);
                var amount_parts = amount.split('.'),
                     regexp = /(\d+)(\d{3})/;
                while (regexp.test(amount_parts[0]))
                    amount_parts[0] = amount_parts[0].replace(regexp, '$1' + ',' + '$2');
                return amount_parts.join('.');
            }
</script>









 {{-- <label class="form-label" for="basic-form-name">FECHA:</label>
            <input class="form-control @error('descripcion') is-invalid @enderror" type="date" id="fecha" name="fecha"/>
                @error('fecha')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
        </div> --}}

        {{-- <div class="form-group">
            <label class="form-label" for="basic-form-name">CLIENTE:</label>
            <select class="form-control" name="idcliente" id="idcliente">
                <option selected disabled>Elegir Opcion</option>
                @foreach($cliente as $itemcliente)
                    <option value="{{$itemcliente['idcliente']}}">
                        {{$itemcliente['nombres']}}, {{$itemcliente['apellidos']}}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label class="form-label" for="basic-form-name">PRODUCTO:</label>
            <select class="form-control" name="idproducto" id="idproducto">
                <option selected disabled>Elegir Opcion</option>
                @foreach($producto as $itemproducto)
                    <option value="{{$itemproducto['idproducto']}}">
                        {{$itemproducto['descripcion']}}
                    </option>
                @endforeach
            </select>
        </div>
    

        <div class="form-group">
            <label class="form-label" for="basic-form-name">CANTIDAD:</label>
            <input class="form-control" @error('cantidad') is-invalid @enderror" type="text" id="cantidad" name="cantidad" placeholder="Ingrese Cantidad" value=""/>
                @error('cantidad')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
        </div> --}}
        {{-- <div class="form-group">
            <label class="form-label" for="basic-form-name">PRODUCTO:</label>
            <input class="form-control @error('total') is-invalid @enderror" type="text" id="total" name="total" placeholder="Ingrese Total" value=""/>
                @error('total')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
        </div> --}}