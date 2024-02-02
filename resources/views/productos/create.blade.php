@extends('layouts.plantilla')
@section('titulo', 'Registrar Categoria')

@section('contenido')
<div class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-d4ebf6c5-74b4-4308-8c64-cda718c9b324" 
        id="dom-d4ebf6c5-74b4-4308-8c64-cda718c9b324" style="padding: 25px">
    <form  method="POST" action="{{route('producto.store')}}" style="padding: 5px">
        @csrf
        <div class="form-group">
            <label class="form-label" for="basic-form-name">NOMBRE:</label>
            <input class="form-control @error('descripcion') is-invalid @enderror" type="text" placeholder="Ingrese descripcion" id="descripcion" name="descripcion"/>
                @error('descripcion')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
        </div>
        <div class="form-group">
            <label class="form-label" for="basic-form-name">CATEGORIA:</label>
            <select class="form-control" name="idcategoria" id="idcategoria">
                <option selected disabled>Elegir Opcion</option>
                @foreach($categoria as $itemcategoria)
                    <option value="{{$itemcategoria['idcategoria']}}">{{$itemcategoria['descripcion']}}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label class="form-label" for="basic-form-name">PRECIO:</label>
            <input class="form-control @error('precio') is-invalid @enderror" type="text" id="precio" name="precio" placeholder="Ingrese Precio" value=""/>
                @error('precio')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
        </div>
        <div class="form-group">
            <label class="form-label" for="basic-form-name">STOCK:</label>
            <input class="form-control @error('stock') is-invalid @enderror" type="text" id="stock" name="stock" placeholder="Ingrese Stock" value=""/>
                @error('stock')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
        </div>
        
        {{-- <div class="form-group">
            <label class="form-label" for="basic-form-name">Imagen:</label>
            <div class="card border-primary">
                <div class="card-body">
                    <label for="imagen" id="icon.image" class="btn btn-primary"><i class="fas fa-image"></i></label>
                    <input class="form-control d-none" type="file" id="imagen" name="imagen" 
                        placeholder="Seleccione Archivo" >
                        <img  id="imagenSeleccionada" style="max-height: 300px">  

                </div>
                
            </div>             
        </div> --}}
        <div class="form-group">
            <label class="form-label" for="basic-form-name">IMAGEN:</label>
            <input class="form-control @error('imagen') is-invalid @enderror" type="file" id="imagen" name="imagen" placeholder="Ingrese Imagen" value=""/>
                @error('imagen')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror
        </div>

        <br>
        <button class="btn btn-primary" type="submit" style="width: 110px">Registrar</button>
       <a href="{{route('cancelarp')}}" class="btn btn-danger" style="width: 110px">Cancelar</a>
      
    </form>
  </div>
  
  {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function(e){
        $('#imagen').change(function(){
            let reader =  new FileReader();
            reader.onload = (e) => {
                $('#imagenSeleccionada').attr('src',e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        })
    })
    function preview(e){
        const url = e.target.files[0];
        const urlTmp = URL.createObjectURL(url);
        document.getElementById("img-preview").src = urlTmp;
        document.getElementById("icon.image").classList.add("d-none");
        document.getElementById("icon-cerrar").innerHTML = `
        <button class="btn btn-danger" onclick="deleteImg(event)"><i class="fas fa-times"></i></button>
        ${url['name']}`;
    }
    function deleteImg(e){
        document.getElementById("icon-cerrar").innerHTML = '';
        document.getElementById("icon.image").classList.remove("d-none");
        document.getElementById("img-preview").src = 'urlTmp';
        
    }
  </script> --}}
@endsection

