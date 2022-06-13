<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ public_path('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ public_path('assets/css/@fortawesome/fontawesome-free/css/all.css') }}" rel="stylesheet" type="text/css">
    <title>Reportes ventas</title>
</head>

<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@700&display=swap');
        body {
            padding: 0;
            margin: 0;
            font-family: "Nunito", "Segoe UI", arial;
        }

        .encabezado {
            background-color: black;
            height: 110px;
            width: 100%;
            color: white;
        }

        .img-na {
            height: 79px;
            margin-left: 24px;
            margin-top: 19px;
            display: inline;
        }

        .encabezado h2 {
            padding-top: 0px;
            font-size: 40px;
            display: inline;
        }
    </style>



<div class="encabezado bg-dark row">
        <div class="col d-inline">
            <img class="img-na " src="{{public_path('img/logorealcar1.svg')}}" alt="">
        </div>
        <div class="col d-inline">
            <h2 class="text-white font-weight-bold">Reportes de ventas</h2>
        </div>
    </div>
    <div class="body">
        <div class="row m-5">
            <h3 class="font-weight-bold">Pedidos registrados: {{$ventascant}}</h3>
        </div>
        
        
        <hr class="bg-dark">
        <div class="row m-5">
            <div class="col text-center">
            <h4 class="font-weight-bold">Proveedores con mas ventas</h4>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Proveedor</th>
                        <th scope="col">Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($proveedoresmasventas as $pmp)
                        <tr>
                            <th scope="row">{{$pmp->name}} {{$pmp->last_name}}</th>
                            <td>{{$pmp->total}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr class="bg-dark">
        <div class="row m-5">
            <div class="col text-center">
            <h4 class="font-weight-bold">Clientes con mas ventas</h4>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Cliente</th>
                        <th scope="col">Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientesmasventas as $cmp)
                        <tr>
                            <th scope="row">{{$cmp->name}} {{$cmp->last_name}}</th>
                            <td>{{$cmp->total}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr class="bg-dark">
        <div class="row m-5">
            <div class="col text-center">
            <h4 class="font-weight-bold">Marcas mas vendidas</h4>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Marcas</th>
                        <th scope="col">Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($marcasmasvendidas as $mms)
                        <tr>
                            <th scope="row">{{$mms->nombre}}</th>
                            <td>{{$mms->total}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <hr class="bg-dark">
        <div class="row m-5">
            <div class="col text-center">
            <h4 class="font-weight-bold">Ciudades con mas ventas</h4>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Ciudades</th>
                        <th scope="col">Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ciudadesmasventas as $ciump)
                        <tr>
                            <th scope="row">{{$ciump->nombre}}</th>
                            <td>{{$ciump->total}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

<script src="{{ public_path('asset/js/bootstrap.min.js') }}"></script>

</html>