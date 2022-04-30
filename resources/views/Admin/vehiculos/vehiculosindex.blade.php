@extends('layouts.app')

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
                            <h1 class="text-center text-black">{{$titulo}}</h1>
                        <div class="card">
                        
                        <a href="{{route('vehiculos.create')}}" class="btn btn-primary" >
                            Agregar nuevo vehiculo<i class="fas fa-plus"></i>
                        </a>
                            <hr class="bg-primary">
                            <div class="card-body">


                            <div class="container-fluid d-flex justify-content-center">
                                <div class="row mt-5">
                                    

                                
                            @forelse($vehiculos as $vehiculo )
                                    <div class="col-sm-4">
                                        <div class="card shadow" > <img src="{{asset('img/img-landing/mazda.jpg')}}" class="card-img-top" width="100%">
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
                                                    <a href="/admin/vehiculos/{{$vehiculo->id}}" type="button" class="btn btn-danger btn-block">
                                                        <small>Ver mas</small>
                                                    </a>
                                                    <a href="/admin/vehiculos/{{$vehiculo->id}}/edit" type="button" class="btn btn-danger btn-block">
                                                        <small>Editar</small>
                                                    </a>
                                                </div> <small class="d-flex justify-content-center text-">*Legal Disclaimer</small>
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













