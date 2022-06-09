@extends('layouts.userapp')

@section('title', 'Citas')

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/fullcalendar-main.min.css')}}">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection

@section('content')

<style>
    .text-black {
        color: black;
    }
</style>



<div class="card">
    <div class="card-body">
        <h1 class="text-center text-black">Citas</h1>
        <div class="card">
            <hr class="bg-primary">
            <div class="card-body">
                <a href="/citas">< Volver</a>

                <table class="table table-bordered">
                    
                    <thead>
                        <tr>
                            <th class="text-center bg-dark text-light" colspan="2">Cita</th>
                        </tr>
                    </thead>
                    <tbody class="text-dark">

                        <tr class="table-dark text-dark">
                            <th scope="row">ID de la cita:</th>
                            <td>{{$cita->id}}</td>
                        </tr>

                        <tr class="table-dark text-dark">
                            <th scope="row">Asunto de la cita:</th>
                            <td>{{$cita->asunto}}</td>
                        </tr>

                        <tr class="">
                            <th scope="row">Sede de la cita:</th>
                            @foreach($sedes as $sede)
                                <td>{{$sede->id}}</td>
                            @endforeach
                        </tr>
                        <tr class="">
                            <th scope="row">Sede de la cita:</th>
                            @foreach($sedes as $sede)
                                <td>{{$sede->nombre}}</td>
                            @endforeach
                        </tr>
                        
                        <tr class="table-dark text-dark">
                            <th scope="row">ID del proveedor:</th>
                            @foreach($proveedores as $proveedor)
                                <td>{{$proveedor->id}}</td>
                            @endforeach
                        </tr>
                        <tr class="table-dark text-dark">
                            <th scope="row">Nombre del proveedor:</th>
                            @foreach($proveedores as $proveedor)
                                <td>{{$proveedor->name}} {{$proveedor->last_name}}</td>
                            @endforeach
                        </tr>
                        
                        <tr class="">
                            <th scope="row">ID del cliente: </th>
                            @foreach($clientes as $cliente)
                                <td>{{$cliente->id}}</td>
                            @endforeach
                        </tr>
                        <tr class="">
                            <th scope="row">Nombre del cliente: </th>
                            @foreach($clientes as $cliente)
                                <td>{{$cliente->name}} {{$cliente->last_name}}</td>
                            @endforeach
                        </tr>

                        <tr class="table-dark text-dark">
                            <th scope="row">ID del vendedor: </th>
                            @foreach($vendedores as $vendedor)
                                <td>{{$vendedor->id}}</td>
                            @endforeach
                        </tr>
                        <tr class="table-dark text-dark">
                            <th scope="row">Nombre del vendedor: </th>
                            @foreach($vendedores as $vendedor)
                                <td>{{$vendedor->name}} {{$vendedor->last_name}}</td>
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
                        <th scope="row">Fecha de la cita: </th>
                                <td>{{$cita->fecha}}</td>
                        </tr>
                        <tr class="table-dark text-dark">
                        <th scope="row">Hora de la cita: </th>
                                <td>{{$cita->hora}}</td>
                        </tr>

                        <tr>
                        <th scope="row">Comentarios de la cita: </th>
                                <td>{{$cita->comentario}}</td>
                        </tr>
                        
                        
                        
                    </tbody>
                </table>


                </div>
        </div>
    </div>
</div>
@endsection