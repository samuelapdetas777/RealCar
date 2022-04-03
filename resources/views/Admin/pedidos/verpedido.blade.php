@extends('layouts.app')

@section('title', 'Pedidos')

@section('css')

@endsection

@section('content')


<div class="card">
    <div class="card-body">
            <h1 class="text-center text-black">Detalle del pedido</h1>
        <div class="card">
        
            <hr class="bg-primary">
            <a href="/admin/pedidos">< Volver</a>
            <div class="card-body">
                <div class="col">

                <table class="table table-bordered">
                    
                    <thead>
                        <tr>
                            <th class="text-center bg-dark text-light" colspan="2">Pedido</th>
                        </tr>
                    </thead>
                    <tbody class="text-dark">
                        <tr class="table-dark text-dark">
                            <th scope="row">ID del pedido:</th>
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
                        <th scope="row">ID del vehiculo: </th>
                            @foreach($vehiculos as $vehiculo)
                                <td>{{$vehiculo->id}}</td>
                            @endforeach
                        </tr>
                        <tr>
                        <th scope="row">Vehiculo: </th>
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
                        
                        <tr class="table-dark text-dark">
                        <th scope="row">Acciones: </th>
                        <td>
                            <form action="{{ route ('pedidos.destroy',$pedido->id) }}" method="POST" class="deletePedido">
                                <a href="/admin/pedidos/{{$pedido->id}}/edit" id="sedeeditarbtn" class="btn btn-info editarbtn">Editar<i class="fas fa-pen"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar <i class="fas fa-trash"></i></button>
                            </form>
                        </td>
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

    <script>
        $(document).ready(function () {
            $('.deleteSede').submit(function (e) { 
            e.preventDefault();
    
            Swal.fire({
                title: '¿Seguro quieres eliminar este campo?',
                text: "No puedes revertir este cambio",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0fbd37',
                cancelButtonColor: '#fd3328',
                confirmButtonText: 'Si, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
            })
            
        });
        });
    </script>




@if($errors->any())
        <script>
            $('#inputTipoCaja').addClass('is-invalid');
        </script>
@endif


@endsection