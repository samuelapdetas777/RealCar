@extends('layouts.app')

@section('title', 'Ventas')

@section('css')

@endsection

@section('content')


<div class="card">
    <div class="card-body">
            <h1 class="text-center text-black">Detalle de la venta</h1>
        <div class="card">
        
            <hr class="bg-primary">
            <a href="/admin/ventas">< Volver</a>
            <div class="card-body">
                <div class="col">

                <table class="table table-bordered">
                    
                    <thead>
                        <tr>
                            <th class="text-center bg-dark text-light" colspan="2">Venta</th>
                        </tr>
                    </thead>
                    <tbody class="text-dark">
                        <tr class="table-dark text-dark">
                            <th scope="row">ID de la venta:</th>
                            <td>{{$pedido->id}}</td>
                        </tr>
                        
                        <tr>
                            <th scope="row">ID del proveedor:</th>
                            @foreach($proveedores as $proveedor)
                                <td>{{$proveedor->id}}</td>
                            @endforeach
                        </tr>
                        <tr>
                            <th scope="row">Nombre del proveedor:</th>
                            @foreach($proveedores as $proveedor)
                                <td>{{$proveedor->name}} {{$proveedor->last_name}}</td>
                            @endforeach
                        </tr>
                        <tr class="table-dark text-dark">
                            <th scope="row">ID del cliente: </th>
                            @foreach($clientes as $cliente)
                                <td>{{$cliente->id}}</td>
                            @endforeach
                        </tr>
                        <tr class="table-dark text-dark">
                            <th scope="row">Nombre del cliente: </th>
                            @foreach($clientes as $cliente)
                                <td>{{$cliente->name}} {{$cliente->last_name}}</td>
                            @endforeach
                        </tr>
                        <tr>
                        <th scope="row">ID del vehículo: </th>
                            @foreach($vehiculos as $vehiculo)
                                <td>{{$vehiculo->id}}</td>
                            @endforeach
                        </tr>
                        <tr>
                        <th scope="row">Vehículo: </th>
                            @foreach($vehiculos as $vehiculo)
                                <td>{{$vehiculo->nombre}}</td>
                            @endforeach
                        </tr>
                        <tr class="table-dark text-dark">
                        <th scope="row">Valor: </th>
                                <td>$ {{$pedido->valor}}</td>
                        </tr>
                        <tr>
                        <th scope="row">Fecha de entrega: </th>
                                <td>{{$pedido->fechaentrega}}</td>
                        </tr>
                        
                        
                    </tbody>
                </table>

              

                
                </div>
            </div>
        </div>
    </div>

</div>



@endsection


@section('scripts')

    <script src="{{asset('assets/js/sweetalert2.js')}}"></script>


@endsection