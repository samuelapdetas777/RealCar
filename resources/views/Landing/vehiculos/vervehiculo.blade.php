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
                           


                        <section class="py-5 bg-light">
                            <div class="container px-4 px-lg-5 my-5">
                                <div class="row gx-4 gx-lg-5 align-items-center">
                                    <div class="col-md-6">
                                        @forelse($imagenesVehiculo as $iv)
                                        @if($iv->prioridad == 1)
                                            <img src="/imagen/{{$iv->foto}}" class="img-main" width="100%">
                                        @endif
                                        @empty
                                        <img src="{{asset('img/no-image.jpg')}}" class="" width="100%">
                                        @endforelse
                                    </div>
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
                                        <div class="d-flex">
                                            <a href="/cita/{{$vehiculo->id}}/nueva" class="btn btn-outline-dark">
                                                <i class="fas fa-calendar-check me-1"></i>
                                                Agendar una cita
                                            </a>
                                        </div>
                                    </div>


                                    <div class="pl-4 row">
                                        @foreach($imagenesVehiculo as $iv)
                                            <img src="/imagen/{{$iv->foto}}" class="img-imagenes mr-1 mt-1" style="height:12vh">
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="py-5 bg-dark">
                            <div class="container px-4 px-lg-5 my-5">
                                <div class="row gx-4 gx-lg-5 justify-content-center">
                                    <h2 class="fw-bolder mb-4">Información del proveedor</h2>
                                </div>
                            <div class="row text-center">
                                <div class="col-sm-6 mt-4">
                                    <h6>Nombre:  </h6>   {{$proveedor->name}} {{$proveedor->name}}
                                </div>
                                <div class="col-sm-6 mt-4">
                                    <h6>Celular:  </h6>   {{$proveedor->phone}}
                                </div>
                                <div class="col-sm-6 mt-4">
                                    <h6>Ciudad:  </h6>   {{$ciudadProveedor->nombre}}
                                </div>
                                <div class="col-sm-6 mt-4">
                                    <h6>Catalogo:  </h6>   <a href="/catalogo/{{$vehiculo->user_id}}">{{$proveedor->name}} {{$proveedor->name}}</a>
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
                                                <th class="text-center bg-dark text-light" colspan="2">Detalles del vehículo</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-dark">

                                            <tr class="table-dark text-dark">
                                                <th scope="row">ID del vehículo:</th>
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
                                                <th scope="row">Color del vehículo: </th>
                                                    <td>{{$vehiculo->color}}</td>
                                            </tr>

                                            <tr class="">
                                                <th scope="row">Bolsas de aire: </th>
                                                    <td>{{$vehiculo->airbag}}</td>
                                            </tr>

                                            <tr class="">
                                                <th scope="row">Placa: </th>
                                                    <td>{{$vehiculo->placa}}</td>
                                            </tr>

                                        </tbody>
                                    </table>





                                </div>
                            </div>
                        </section>
                        <section class="py-5 bg-dark">
                            <div class="container px-4 px-lg-4 mt-2">
                                <h2 class="fw-bolder mb-4">Vehículos similares</h2>
                                <div class="row justify-content-center">
                                    


                            @foreach($vehiculosSimilares as $vehiculo)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="card shadow" > 
                                        @php
                                            $x = 1;
                                                foreach($imagenes as $i){

                                                    if($x != count($imagenes)){
                                                        if($i->idvehiculo == $vehiculo->id){
                                                            echo '<img src="/imagen/'.$i->foto.'" class="card-img-top" width="100%">';
                                                            break; 
                                                        }    
                                                    }else{
                                                        if($i->idvehiculo == $vehiculo->id){
                                                            echo '<img src="/imagen/'.$i->foto.'" class="card-img-top" width="100%">';
                                                            break; 
                                                        }else{
                                            @endphp
                                                            <img src="{{asset('img/no-image.jpg')}}" class="card-img-top" width="100%">
                                            @php
                                                            break;
                                                        }
                                                    }
                                                    $x++;
                                                } 

                                                
                                                

                                            @endphp
                                            <div class="card-body pt-0 px-0">

                                                <div class="d-flex flex-row justify-content-between  px-2 mt-1"> 
                                                        @foreach($marcas as $marca)
                                                            @if($marca->id == $vehiculo->marcas_id)
                                                                <p class="d-inline"> <bold>{{$marca->nombre}}</bold></p>
                                                            @endif
                                                        @endforeach
                                                        {{$vehiculo->nombre}}
                                                </div>

                                                <div class="d-flex flex-row justify-content-between mb-0 px-3 mt-1 mid"> 
                                                    
                                                        Precio
                                                        <h6>&dollar;{{$vehiculo->precio}}</h6>
                                                     
                                                </div>
                                                <hr class="mt-2 mx-3">
                                                <div class="d-flex flex-row justify-content-between px-3 pb-4">
                                                    @foreach($estadoaplicativos as $ea)
                                                        @if($ea->id == $vehiculo->estadoaplicativo_id)
                                                            <span class="badge text-black {{$ea->nombre == "Registrado"? 'bg-info' : 
                                                                ($ea->nombre == "Disponible"? 'bg-success' : 
                                                                ($ea->nombre == "Vendido"? 'bg-light' : 
                                                                ($ea->nombre == "No Disponible"? 'bg-danger': 
                                                                ($ea->nombre == "En revisión"? 'bg-warning': ''))))}}">
                                                                {{$ea->nombre}}
                                                            </span>
                                                        @endif
                                                    @endforeach
                                                    @foreach($estadovehiculos as $ev)
                                                        @if($ev->id == $vehiculo->estadovehiculo_id)
                                                            <span class="badge text-black {{$ev->nombre == "Nuevo"? 'bg-info' : ($ev->nombre == "Usado"? 'bg-light': 'bg-light')}}">
                                                                {{$ev->nombre}}
                                                            </span>
                                                        @endif
                                                    @endforeach
                                                    
                                                </div>
                                                <div class="d-flex flex-row justify-content-between p-3 mid">
                                                    <div class="d-flex flex-column">Motor
                                                        <div class="d-flex flex-row">
                                                            <h6 class="ml-1">{{$vehiculo->motor}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column">Kilometraje
                                                        <div class="d-flex flex-row">
                                                            <h6 class="ml-1">{{$vehiculo->kilometraje}} Km</h6>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="mx-3 mt-3 mb-2">
                                                    <a href="/catalogo/vehiculo/{{$vehiculo->id}}" type="button" class="btn btn-outline-dark btn-block">
                                                        <small>Ver más</small>
                                                    </a>
                                                    <a href="/admin/vehiculos/{{$vehiculo->id}}/edit" type="button" class="btn btn-dark btn-block">
                                                        <small>Agendar cita</small>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            
                            </div>


<hr class="bg-light mx-5">

                            <div class="container px-4 px-lg-4 mt-5">
                                <h2 class="fw-bolder mb-4">Otros vehículos del proveedor</h2>
                                <div class="row justify-content-center">
                                    


                            @foreach($vehiculosProveedor as $vehiculo)
                                <div class="col-lg-3 col-md-6 col-sm-12">
                                        <div class="card shadow" > 
                                        @php
                                            $x = 1;
                                                foreach($imagenes as $i){

                                                    if($x != count($imagenes)){
                                                        if($i->idvehiculo == $vehiculo->id){
                                                            echo '<img src="/imagen/'.$i->foto.'" class="card-img-top" width="100%">';
                                                            break; 
                                                        }    
                                                    }else{
                                                        if($i->idvehiculo == $vehiculo->id){
                                                            echo '<img src="/imagen/'.$i->foto.'" class="card-img-top" width="100%">';
                                                            break; 
                                                        }else{
                                            @endphp
                                                            <img src="{{asset('img/no-image.jpg')}}" class="card-img-top" width="100%">
                                            @php
                                                            break;
                                                        }
                                                    }
                                                    $x++;
                                                } 

                                                
                                                

                                            @endphp
                                            <div class="card-body pt-0 px-0">

                                                <div class="d-flex flex-row justify-content-between  px-2 mt-1"> 
                                                        @foreach($marcas as $marca)
                                                            @if($marca->id == $vehiculo->marcas_id)
                                                                <p class="d-inline"> <bold>{{$marca->nombre}}</bold></p>
                                                            @endif
                                                        @endforeach
                                                        {{$vehiculo->nombre}}
                                                </div>

                                                <div class="d-flex flex-row justify-content-between mb-0 px-3 mt-1 mid"> 
                                                    
                                                        Precio
                                                        <h6>&dollar;{{$vehiculo->precio}}</h6>
                                                     
                                                </div>
                                                <hr class="mt-2 mx-3">
                                                <div class="d-flex flex-row justify-content-between px-3 pb-4">
                                                    @foreach($estadoaplicativos as $ea)
                                                        @if($ea->id == $vehiculo->estadoaplicativo_id)
                                                            <span class="badge text-black {{$ea->nombre == "Registrado"? 'bg-info' : 
                                                                ($ea->nombre == "Disponible"? 'bg-success' : 
                                                                ($ea->nombre == "Vendido"? 'bg-light' : 
                                                                ($ea->nombre == "No Disponible"? 'bg-danger': 
                                                                ($ea->nombre == "En revisión"? 'bg-warning': ''))))}}">
                                                                {{$ea->nombre}}
                                                            </span>
                                                        @endif
                                                    @endforeach
                                                    @foreach($estadovehiculos as $ev)
                                                        @if($ev->id == $vehiculo->estadovehiculo_id)
                                                            <span class="badge text-black {{$ev->nombre == "Nuevo"? 'bg-info' : ($ev->nombre == "Usado"? 'bg-light': 'bg-light')}}">
                                                                {{$ev->nombre}}
                                                            </span>
                                                        @endif
                                                    @endforeach
                                                    
                                                </div>
                                                <div class="d-flex flex-row justify-content-between p-3 mid">
                                                    <div class="d-flex flex-column">Motor
                                                        <div class="d-flex flex-row">
                                                        <h6 class="ml-1">{{$vehiculo->motor}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column">Kilometraje
                                                        <div class="d-flex flex-row">
                                                            <h6 class="ml-1">{{$vehiculo->kilometraje}} Km</h6>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="mx-3 mt-3 mb-2">
                                                    <a href="/catalogo/vehiculo/{{$vehiculo->id}}" type="button" class="btn btn-outline-dark btn-block">
                                                        <small>Ver más</small>
                                                    </a>
                                                    <a href="/admin/vehiculos/{{$vehiculo->id}}/edit" type="button" class="btn btn-dark btn-block">
                                                        <small>Agendar cita</small>
                                                    </a>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <a href="/catalogo/{{$vehiculo->user_id}}">Ver más vehiculos de {{$proveedor->name}} {{$proveedor->name}}...</a>





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
        $('.img-imagenes').click(function () { 
            var linkclick = $(this).attr('src');
            $('.img-main').attr('src', linkclick);            
        });
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