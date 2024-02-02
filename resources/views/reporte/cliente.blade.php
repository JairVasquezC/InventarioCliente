<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
    <h4 style="color:#2C7BE5 ;font-weight: bold; font-family: Georgia, 'Times New Roman', Times, serif;font-size: 25px;text-align: center">REPORTE DE CLIENTES</h4>
    <p class="text-center"></p>
    <table border="1" class="table table-striped table-primary" style="font-family: Arial, Helvetica, sans-serif;font-size: 12px">
        <thead >
            <tr>
                <th scope="col" border="1" class="text-center">CÓDIGO</th>
                <th scope="col" border="1" class="text-center">DNI</th>
                <th scope="col" border="1" class="text-center">NOMBRES</th>
                <th scope="col" border="1" class="text-center">APELLIDOS</th>
                <th scope="col" border="1" class="text-center">DIRECCION</th>
                <th scope="col" border="1" class="text-center">TELEFONO</th>
            </tr>
        </thead>
        <tbody>
            <th scope="row"></th>
            @foreach($cliente as $itemcliente)
            <tr>
                <td class="text-center">{{$itemcliente->idcliente}}</td>
                <td class="text-center">{{$itemcliente->dni}}</td>
                <td class="text-center">{{$itemcliente->nombres}}</td>
                <td class="text-center">{{$itemcliente->apellidos}}</td>
                <td class="text-center">{{$itemcliente->direccion}}</td>
                <td class="text-center">{{$itemcliente->telefono}}</td>
                
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>