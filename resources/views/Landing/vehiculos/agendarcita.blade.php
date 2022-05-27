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
            <h1 class="text-center text-black">Agregar una nueva cita</h1>
        <div class="card">
        
            <hr class="bg-primary">
            <a href="/catalogo">< Volver</a>
            <div class="card-body">
                <div class="col">
                    <div class="row">    
                        <div class="col-lg-4">
                            <div class="card shadow" > <img src="{{asset('img/no-image.jpg')}}" class="card-img-top" width="100%">
                                <div class="card-body pt-0 px-0">
                                    <div class="d-flex flex-row justify-content-between  px-3 mt-1"> 
                                        <p class="d-inline"> <bold>{{$marca->nombre}}</bold></p>        
                                        {{$vehiculo->nombre}}
                                    </div>
                                    <div class="d-flex flex-row justify-content-between mb-0 px-3 mt-1 mid"> 
                                        Precio
                                        <h6>&dollar;{{$vehiculo->precio}}</h6>        
                                    </div>
                                    <hr class="mt-2 mx-3">
                                    <div class="d-flex flex-row justify-content-between px-3 pb-4">
                                        <span class="badge text-black {{$estadoaplicativo->nombre == "Registrado"? 'bg-info' : 
                                            ($estadoaplicativo->nombre == "Disponible"? 'bg-success' : 
                                            ($estadoaplicativo->nombre == "Vendido"? 'bg-light' : 
                                            ($estadoaplicativo->nombre == "No Disponible"? 'bg-danger': 
                                            ($estadoaplicativo->nombre == "En revisión"? 'bg-warning': ''))))}}">
                                            {{$estadoaplicativo->nombre}}
                                        </span>
                                        <span class="badge text-black {{$estadovehiculo->nombre == "Nuevo"? 'bg-info' : ($estadovehiculo->nombre == "Usado"? 'bg-light': 'bg-light')}}">
                                            {{$estadovehiculo->nombre}}
                                        </span>
                                    </div>
                                    <div class="d-flex flex-row justify-content-between p-3 mid">
                                        <div class="d-flex flex-column"><small class="mb-2">Motor</small>
                                            <div class="d-flex flex-row">
                                            <h6 class="ml-1">{{$vehiculo->motor}}</h6>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column"><small class="mb-2">Kilometraje</small>
                                            <div class="d-flex flex-row">
                                                <h6 class="ml-1">{{$vehiculo->kilometraje}} Km</h6>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="mx-3 mt-3 mb-2">
                                        <a href="/catalogo/vehiculo/{{$vehiculo->id}}" type="button" class="btn btn-info btn-block">
                                            <small>Ver mas</small>
                                        </a>
                                    </div> 
                                </div>
                            </div>
                        </div>




                                        





                        <div class="col-md-8">
                            <form action="/cita/{{$vehiculo->id}}/guardar" method="POST" class="agregarCita">
                                @csrf
                                <div class="row mt-5">
                                    <div class="col">
                                        <label for="inputfecha">Fecha tentativa de la cita: </label>
                                        <div class="input-group date" >
                                            <input type="date" class="form-control @error('fecha') is-invalid @enderror" id="inputfecha" name="fecha" value="{{old('fecha')}}"  min="<?= date('Y-m-d'); ?>">
                                            
                                            @error('fecha')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label for="inputhora">Hora tentativa de la cita: </label>
                                        <div class="input-group " >
                                            <input type="time" class="form-control @error('hora') is-invalid @enderror" id="inputhora" name="hora" value="{{old('hora')}}" min="8:00:00">
                                            
                                            @error('hora')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col">
                                        <label for="selectsede">Sede: </label>
                                        <select  class="form-control selector @error('sede') is-invalid @enderror" id="selectsede" name="sede" required>
                                        
                                        <option value="">Selecciona la sede</option>
                                        @foreach($sedes as $sede)
                                            <option value="{{$sede->id}}">{{$sede->nombre}} - {{$sede->correo}} - {{$sede->telefono}}</option>
                                        @endforeach
                                        </select>
                                        @error('sede')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="alert alert-warning mt-5" role="alert">
                                    La solicitud de tu cita quedará sujeta a cambios, será revisada, y agendada de acuerdo a la disponibilidad de la sede.
                                </div>

                                
                                <div class="row mt-5">
                                    <button type="submit" class="btn btn-success">Agendar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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

