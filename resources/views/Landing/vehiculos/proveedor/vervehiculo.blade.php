@extends('layouts.userapp')

@section('title', 'Vehiculos')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
@endsection

@section('content')

<style>
    .text-black{
        color: black;
    }
</style>

    

        <div class="card">
            <div class="card-body">
                <h1 class="text-center text-black">Ver vehículo</h1>
                <div class="card">
                        
                        
                    <hr class="bg-primary">
                    <div class="card-body">
                           


                        <section class="py-5 bg-dark">
                            <div class="container px-4 px-lg-5 my-5">
                                <div class="row gx-4 gx-lg-5 align-items-center">
                                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="..." /></div>
                                    <div class="col-md-6">
                                        <div class="small mb-1"> <h5>
                                            
                                                {{$marca->nombre}}
                                            
                                            </h5>
                                        </div>
                                        <h1 class="display-5 fw-bolder">{{$vehiculo->nombre}}</h1>
                                        <div class="fs-5 mb-3">
                                            <span class="text-decoration-line-through">${{$vehiculo->precio}}</span> - {{$estadovehiculo->nombre}}
                                        </div>
                                        <p class="lead">{{$vehiculo->descripcion}}</p>
                                        
                                    </div>
                                </div>
                            </div>
                        </section>

                        
                        <section class="py-5 bg-light">
                            <div class="container px-4 px-lg-5 my-5">
                                <div class="row gx-4 gx-lg-5 align-items-center">
                                    
                                    <table class="table table-bordered">
                        
                                        <thead>
                                            <tr>
                                                <th class="text-center bg-dark text-light" colspan="2">Detalles del vehiculo</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-dark">

                                            <tr class="table-dark text-dark">
                                                <th scope="row">ID del vehiculo:</th>
                                                <td>{{$vehiculo->id}}</td>
                                            </tr>

                                            <tr class="">
                                                <th scope="row">Motor:</th>
                                                <td>{{$vehiculo->motor}}</td>
                                            </tr>

                                            <tr class="table-dark text-dark">
                                                <th scope="row">Combustible:</th>
                                                    <td>{{$combustible->nombre}}</td>
                                            </tr>

                                            <tr class="">
                                                <th scope="row">Transmisión:</th>
                                                    <td>{{$tipocaja->nombre}}</td>
                                            </tr>

                                            <tr class="table-dark text-dark">
                                                <th scope="row">Modelo:</th>
                                                <td>{{$vehiculo->modelo}}</td>
                                            </tr>

                                            <tr class="">
                                                <th scope="row">Kilometraje:</th>
                                                    <td>{{$vehiculo->kilometraje}}</td>
                                            </tr>
                                            
                                            <tr class="table-dark text-dark">
                                                <th scope="row">Color del vehiculo: </th>
                                                    <td>{{$vehiculo->color}}</td>
                                            </tr>

                                            <tr class="">
                                                <th scope="row">Bolsas de aire: </th>
                                                    <td>{{$vehiculo->airbag}}</td>
                                            </tr>

                                            <tr class="table-dark text-dark">
                                                <th scope="row">Placa: </th>
                                                    <td>{{$vehiculo->placa}}</td>
                                            </tr>

                                        </tbody>
                                    </table>





                                </div>
                            </div>
                        </section>
                        



                    </div>
                </div>
            </div>                
        </div>

 
@endsection

@section('scripts')

<script src="{{ asset('assets/js/sweetalert2.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>


<script>


$('.deleteCiudad').submit(function (e) { 
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




    $(document).ready(function () {

    });
</script>




@if(session('eliminar') == 'ok')
    <script>
        Swal.fire({
                icon: 'success',
                title: 'Se ha eliminado correctamente',
                timer: 1500,
                timerProgressBar: true,
                })
    </script>
@elseif(session('actualizar') == 'ok')
    <script>
        Swal.fire({
                icon: 'success',
                title: 'Se han guardado los cambios correctamente',
                timer: 1500,
                timerProgressBar: true,
                })
    </script>
@elseif(session('agregar') == 'ok')
    <script>
        Swal.fire({
                icon: 'success',
                title: 'Se ha agregado correctamente',
                timer: 1500,
                timerProgressBar: true,
                })
    </script>
@endif



@endsection