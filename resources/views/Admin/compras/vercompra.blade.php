@extends('layouts.app')

@section('title', 'Compras')

@section('css')

@endsection

@section('content')


<div class="card">
    <div class="card-body">
            <h1 class="text-center text-black">Detalle de la compra</h1>
        <div class="card">
        
            <hr class="bg-primary">
            <a href="/admin/compras">< Volver</a>
            <div class="card-body">
                <div class="col">

                <table class="table table-bordered">
                    
                    <thead>
                        <tr>
                            <th class="text-center bg-dark text-light" colspan="2">Compra</th>
                        </tr>
                    </thead>
                    <tbody class="text-dark">
                        <tr class="table-dark text-dark">
                            <th scope="row">ID de la compra:</th>
                            <td>{{$compra->id}}</td>
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
                                <td>$ {{$compra->valor}}</td>
                        </tr>
                        <tr>
                        <th scope="row">Fecha de expedición: </th>
                                <td>{{$compra->created_at}}</td>
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