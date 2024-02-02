<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
    <h2 style="color:#2C7BE5 ;font-weight: bold; font-family: Georgia, 'Times New Roman', Times, serif;font-size: 25px;text-align: center">REPORTE DE PRODUCTOS</h2>
    <p class="text-center"></p>
    <table class="table">
        <thead class="table table-striped table-primary" style="font-family: Arial, Helvetica, sans-serif;font-size: 12px">
            <tr>
                <th scope="col" border="1" class="text-center">CÓDIGO</th>
                <th scope="col" border="1" class="text-center">NOMBRE</th>
                <th scope="col" border="1" class="text-center">CATEGORIA</th>
                <th scope="col" border="1" class="text-center">PRECIO</th>
                <th scope="col" border="1" class="text-center">STOCK</th>
                <th scope="col" border="1" class="text-center">IMAGEN</th>
            </tr>
        </thead>
        <tbody>
            <th scope="row"></th>
            @foreach($producto as $itemproducto)
            <tr>
                <td class="text-center">{{$itemproducto->idproducto}}</td>
                <td class="text-center">{{$itemproducto->descripcion}}</td>
                <td class="text-center">{{$itemproducto->categoria->descripcion}}</td>
                <td class="text-center">S/. {{$itemproducto->precio}}.0</td>
                <td class="text-center">{{$itemproducto->stock}}</td>
                <td>
                  <img src="images/{{$itemproducto->imagen}}" alt="" width="120px">
                </td>                
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>