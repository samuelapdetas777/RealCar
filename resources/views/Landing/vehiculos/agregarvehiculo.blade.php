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
                                        <div class="container-fluid d-flex justify-content-center">
                                            <div class="row mt-5">




                                                <form action="/vehiculos/guardar" method="POST" class="agregarVehiculo">
                                                    @csrf
                                                    <div class="row mt-5">
                                                        <div class="col-lg-6">
                                                        <label for="selectmarca">Marca: </label>
                                                            <select class="form-control selector @error('marca') is-invalid @enderror" id="selectmarca" name="marca" required>
                                                            
                                                                <option value="">Selecciona la marca del vehiculo</option>
                                                                @foreach($marcas as $marca)
                                                                    <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('marca')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="inputnombre">Nombre del vehiculo</label>
                                                            <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="inputnombre" placeholder="Nombre" value="{{old('nombre')}}" name="nombre" required>
                                                            @error('nombre')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row mt-5">
                                                        <div class="col-lg-6">
                                                            <label for="inputmodelo">Modelo</label>
                                                            <input type="number" class="form-control @error('modelo') is-invalid @enderror" id="inputmodelo" placeholder="Modelo" value="{{old('modelo')}}" name="modelo" required>
                                                            @error('modelo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="inputkilometraje">Kilometraje</label>
                                                            <input type="number" class="form-control @error('kilometraje') is-invalid @enderror" id="inputkilometraje" placeholder="Kilometraje" value="{{old('kilometraje')}}" name="kilometraje" required>
                                                            @error('kilometraje')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row mt-5">
                                                        <div class="col-lg-6">
                                                            <label for="selecttipocaja">Transmisiòn: </label>
                                                            <select class="form-control @error('tipocaja') is-invalid @enderror" id="selecttipocaja" name="tipocaja" required>
                                                            
                                                                <option value="">Selecciona la transmisiòn del vehiculo</option>
                                                                @foreach($tipocajas as $tipocaja)
                                                                    <option value="{{$tipocaja->id}}">{{$tipocaja->nombre}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('tipocaja')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-lg-6">
                                                        <label for="inputmotor">Motor</label>
                                                            <input type="text" class="form-control @error('motor') is-invalid @enderror" id="inputmotor" placeholder="Motor" value="{{old('motor')}}" name="motor" required>
                                                            @error('motor')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row mt-5">
                                                        <div class="col-lg-6">
                                                        <label for="selectcombustible">Combustible: </label>
                                                            <select type="number" class="form-control @error('combustible') is-invalid @enderror" id="selectcombustible" name="combustible" required>
                                                            
                                                            <option value="">Seleccione el combustible del vehiculo</option>
                                                            @foreach($combustibles as $combustible)
                                                                <option value="{{$combustible->id}}">{{$combustible->nombre}}</option>
                                                            @endforeach
                                                            </select>
                                                            @error('combustible')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="selectestadovehiculo">Estado del vehiculo</label>
                                                            <select class="form-control @error('estadovehiculo') is-invalid @enderror" id="selectestadovehiculo" name="estadovehiculo" required>
                                                                <option value="">Selecciona un estado</option>
                                                                @foreach($estadovehiculos as $estadovehiculo)
                                                                    <option value="{{$estadovehiculo->id}}">{{$estadovehiculo->nombre}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('estadovehiculo')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror

                                                        </div>
                                                    </div>



                                                    <div class="row mt-5">
                                                        <div class="col-lg-4">
                                                            <label for="inputcolor">Color</label>
                                                            <input type="text" class="form-control @error('color') is-invalid @enderror" id="inputcolor" placeholder="Color" value="{{old('color')}}" name="color" required>
                                                            @error('color')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <label for="inputplaca">Placa <small> (Solo el ultimo numero de la placa</small></label>
                                                            <input type="number" class="form-control @error('placa') is-invalid @enderror" id="inputplaca" placeholder="placa" value="{{old('placa')}}" name="placa" required>
                                                            @error('placa')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-4">
                                                        <label for="selectcplaca">Ciudad de la placa:</label>
                                                            <select class="form-control selector @error('cplaca') is-invalid @enderror" id="selectcplaca" name="cplaca" required>
                                                            
                                                                <option value="">Ciudad de la placa</option>
                                                                @foreach($ciudades as $ciudad)
                                                                    <option value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
                                                                @endforeach
                                                            </select>
                                                            @error('cplaca')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="row mt-5">
                                                        <div class="col-lg-6">
                                                            <label for="inputairbag">Bolsas de aire</label>
                                                            <input type="number" class="form-control @error('airbag') is-invalid @enderror" id="inputairbag" placeholder="Airbags" value="{{old('airbag')}}" name="airbag" required>
                                                            @error('airbag')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="inputprecio">Precio</label>
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text">$</span>
                                                                </div>
                                                                <input type="number" class="form-control @error('precio') is-invalid @enderror" name="precio" value="{{old('precio')}}" aria-label="Amount (to the nearest dollar)">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text">.00</span>
                                                                </div>
                                                                @error('precio')
                                                                <div class="invalid-feedback">{{$message}}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-5">
                                                        
                                                        <div class="col">
                                                            <label for="textareadescripcion">Descripciòn</label>
                                                            <textarea class="form-control @error('descripcion') is-invalid @enderror" id="textareadescripcion" placeholder="Descripcion..." value="{{old('descripcion')}}" name="descripcion" rows="3" required></textarea>
                                                            @error('descripcion')
                                                            <div class="invalid-feedback">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                        </div>

                                                    
                                                        <div class="row mt-5">
                                                            <div class="col">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" value="Elegir" id="customFile">
                                                                    <label class="custom-file-label" for="customFile">Elegir un archivo</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <div class="row mt-5">
                                                        <button type="submit" class="btn btn-success">Agregar</button>
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