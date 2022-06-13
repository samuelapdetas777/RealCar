<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ public_path('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ public_path('assets/css/@fortawesome/fontawesome-free/css/all.css') }}" rel="stylesheet" type="text/css">
    <title>Reportes usuarios</title>
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
            <h2 class="text-white font-weight-bold">Reportes de usuarios</h2>
        </div>
    </div>
    <div class="body">
        <div class="row m-5">
            <h3 class="font-weight-bold">Usuarios registrados: {{$usuarioscant-1}}</h3>
        </div>
        <hr class="bg-dark">
        <div class="row m-5">
            <div class="col text-center">
            <h4 class="font-weight-bold">Usuarios registrados por rol</h4>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Total</th>
                        <th scope="col">Administradores</th>
                        <th scope="col">Clientes</th>
                        <th scope="col">Proveedores</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{$usuarioscant-1}}</th>
                        <td>{{$ausuarios}}</td>
                        <td>{{$cusuarios}}</td>
                        <td>{{$pusuarios}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <hr class="bg-dark">
        <div class="row m-5">
            <div class="col text-center">
            <h4 class="font-weight-bold">Usuarios Habilitados/Inhabilitados</h4>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Total</th>
                        <th scope="col">Habilitados</th>
                        <th scope="col">Inhabilitados</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{$usuarioscant-1}}</th>
                        <td>{{$usuarioscanthab-1}}</td>
                        <td>{{$usuarioscantinhab}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <hr class="bg-dark">
        <div class="row m-5">
            <div class="col text-center">
            <h4 class="font-weight-bold">Usuarios por ciudad</h4>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Ciudad</th>
                        <th scope="col">Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuariosxciudad as $uxc)
                        <tr>
                            <th scope="row">{{$uxc->nombre}}</th>
                            <td>{{$uxc->total}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

<script src="{{ public_path('asset/js/bootstrap.min.js') }}"></script>

</html>