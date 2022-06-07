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
                            <h1 class="text-center text-black">Vehículos</h1>
                        <div class="card">
                        
                        
                            <hr class="bg-primary">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <input type="search" class="form-control" placeholder="Buscar">
                                    </div>
                                    <div class="col-sm-2">

                                        <button class="btn btn-primary">Buscar</button>
                                    </div>
                                </div>

                                <a class="btn btn-outline-dark" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    <i class="fas fa-filter"></i> Filtros
                                </a>
                                <div class="collapse" id="collapseExample">
                                    <div class="card card-body">
                                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                    </div>
                                </div>
                                
                            <div class="container-fluid d-flex justify-content-center">
                                <div class="row mt-5">






                                
                            @forelse($vehiculos as $vehiculo )
                                    <div class="col-sm-4">
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

                                                <div class="d-flex flex-row justify-content-between  px-3 mt-1"> 
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
                                                    @foreach($estadoaplicativo as $ea)
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
                                                    @foreach($estadovehiculo as $ev)
                                                        @if($ev->id == $vehiculo->estadovehiculo_id)
                                                            <span class="badge text-black {{$ev->nombre == "Nuevo"? 'bg-info' : ($ev->nombre == "Usado"? 'bg-light': 'bg-light')}}">
                                                                {{$ev->nombre}}
                                                            </span>
                                                        @endif
                                                    @endforeach
                                                    
                                                </div>
                                                <div class="d-flex flex-row justify-content-between p-3 mid">
                                                    <div class="d-flex flex-column"><small class="text-muted mb-2">Motor</small>
                                                        <div class="d-flex flex-row">
                                                        <h6 class="ml-1">{{$vehiculo->motor}}</h6>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column"><small class="text-muted mb-2">Kilometraje</small>
                                                        <div class="d-flex flex-row">
                                                            <h6 class="ml-1">{{$vehiculo->kilometraje}} Km</h6>
                                                        </div>
                                                    </div>
                                                </div> 
                                                    
                                                        @foreach($usuarios as $usuario)
                                                            @if($vehiculo->user_id == $usuario->id)
                                                            <a class="text-info" href="/catalogo/{{$vehiculo->user_id}}">
                                                                {{$usuario->name}} {{$usuario->name}}
                                                            </a>
                                                            @endif
                                                        @endforeach
                                                    
                                                <div class="mx-3 mt-3 mb-2">
                                                    <a href="/catalogo/vehiculo/{{$vehiculo->id}}" type="button" class="btn btn-outline-dark btn-block">
                                                        <small>Ver más</small>
                                                    </a>
                                                    <a href="/cita/{{$vehiculo->id}}/nueva" type="button" class="btn btn-dark btn-block">
                                                        <small>Agendar cita</small>
                                                    </a>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>
                                


                            @empty


                            <h2>No se encontraron Vehiculos</h2>

                            @endforelse


                            </div>
                            </div>
                            
                            
                           


                            </div>
                            <div class="pagination justify-content-star">
                                {!! $vehiculos->links() !!}
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














{{--
<div class="col-sm-4">
                                        <div class="card"> <img src="{{asset('img/img-landing/mazda.jpg')}}" class="card-img-top" width="100%">
                                            <div class="card-body pt-0 px-0">

                                                <div class="d-flex flex-row justify-content-between  px-3 mt-1"> 
                                                        @foreach($marcas as $marca)
                                                            <p class="d-inline"> <bold>{{$marca->id == $vehiculo->marcas_id? $marca->nombre : ''}}</bold></p>
                                                        @endforeach
                                                        {{$vehiculo->nombre}}
                                                </div>

                                                <div class="d-flex flex-row justify-content-between mb-0 px-3 mt-1 mid"> 
                                                    
                                                        Precio
                                                        <h6>&dollar;{{$vehiculo->precio}}</h6>
                                                     
                                                </div>
                                                <hr class="mt-2 mx-3">
                                                <div class="d-flex flex-row justify-content-between px-3 pb-4">
                                                    <div class="d-flex flex-column"><span class="text-muted">Fuel Efficiency</span><small class="text-muted">L/100KM&ast;</small></div>
                                                    <div class="d-flex flex-column">
                                                        <h5 class="mb-0">8.5/7.1</h5><small class="text-muted text-right">(city/Hwy)</small>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row justify-content-between p-3 mid">
                                                    <div class="d-flex flex-column"><small class="text-muted mb-1">ENGINE</small>
                                                        <div class="d-flex flex-row"><i class="fas fa-tachometer"></i>
                                                            <div class="d-flex flex-column ml-1"><small class="ghj">1.4L MultiAir</small><small class="ghj">16V I-4 Turbo</small></div>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex flex-column"><small class="text-muted mb-2">HORSEPOWER</small>
                                                        <div class="d-flex flex-row"><img src="https://imgur.com/J11mEBq.png">
                                                            <h6 class="ml-1">135 hp&ast;</h6>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <small class="text-muted key pl-3">Standard key Features</small>
                                                <div class="mx-3 mt-3 mb-2">
                                                    <button type="button" class="btn btn-danger btn-block">
                                                        <small>Ver más</small>
                                                    </button>
                                                </div> <small class="d-flex justify-content-center text-">*Legal Disclaimer</small>
                                            </div>
                                        </div>
                                     </div> --}}