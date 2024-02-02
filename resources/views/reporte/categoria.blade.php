<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Categorias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
    <h3 style="color:#2C7BE5 ;font-weight: bold; font-family: Georgia, 'Times New Roman', Times, serif;text-align: center">REPORTE DE CATEGORIAS</h3>
    <p class="text-center"></p>
    <table border="1" class="table table-striped table-primary" style="font-family: Arial, Helvetica, sans-serif;font-size: 12px">
        <thead>
          <tr>
            <th scope="col" border="1"class="text-center">#</th>
            <th scope="col" border="1" class="text-center">DESCRIPCION</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row"></th>
                @foreach($categoria as $itemcategoria)
                    <tr class="intro-x">
                        <td class="text-center">{{$itemcategoria->idcategoria}}</td>
                        <td class="text-center">{{$itemcategoria->descripcion}}</td>                        
                    </tr>
                @endforeach
          </tr>
        </tbody>
    </table>
    {{-- <table class="table border-1">
        <thead class="table-dark">
            <tr>
                <th class="text-center" style="color:black; font-weight: bold ; font-family: Georgia, 'Times New Roman', Times, serif" class="text-center">CÓDIGO</th>
                <th class="text-center" style="color:black; font-weight: bold ; font-family: Georgia, 'Times New Roman', Times, serif" class="text-center">DESCRIPCION</th>
            </tr>
        </thead>
        <tbody>
           
           
            @foreach($categoria as $itemcategoria)
                    <tr class="intro-x">
                        <td class="text-center" style="color:black; font-family: Georgia, 'Times New Roman', Times, serif" class="text-center">{{$itemcategoria->idcategoria}}</td>
                        <td class="text-center" style="color:black; font-family: Georgia, 'Times New Roman', Times, serif" class="text-center">{{$itemcategoria->descripcion}}</td>                        
                    </tr>
                @endforeach
            
        </tbody>
    </table> --}}
</body>
</html>