@extends('layouts.app')

@section('title', 'vehículos')

@section('css')
<link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

<style>

.upload{
        width: 100px;
        position: relative;
        display: block;
    }
    #div-imgprofile{
      position: absolute;
      width: 170px;
      height: 110px;
      line-height: 33px;
      text-align: center;
      overflow: hidden;
      border-radius: 20px;
      border: dotted 5px black;
      margin: pointer ;
    }
    #div-imgprofile:hover{
      background-color: rgba(255, 0, 0);
    }
    #inputprofileimg{
        cursor: pointer;
        position: absolute;
        transform: scale(4.7);
        opacity: 0;
    }
    #inputprofileimg::-webkit-file-upload-button{
        cursor: pointer;

    }

    #iconoinput{
        margin-top: 12%;
        font-size: 500%;
        color: black;
    }

    #btn-submit{
        margin-top:  110px;
    }

</style>





<div class="card">
    <div class="card-body">
            <h1 class="text-center text-black">Agregar un nuevo vehículo</h1>
        <div class="card">
        
            <hr class="bg-primary">
            <a href="/admin/vehiculos">< Volver</a>
            <div class="card-body">
                <div class="col">

                    <form action="{{route('vehiculos.store')}}" method="POST" class="agregarVehiculo" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-5">

                            <div class="col">
                            <label for="selectproveedor">Proveedor</label>
                                <select type="number" class="form-control selector @error('proveedor') is-invalid @enderror" id="selectproveedor" name="proveedor" required>
                                
                                    <option value="">Selecciona el dueño del vehículo</option>
                                    @foreach($usuarios as $usuario)
                                        <option value="{{$usuario->id}}">{{$usuario->name}} {{$usuario->last_name}}</option>
                                    @endforeach
                                </select>
                                @error('proveedor')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            
                        </div>

                        <div class="row mt-5">
                            <div class="col-lg-6">
                            <label for="selectmarca">Marca: </label>
                                <select class="form-control selector @error('marca') is-invalid @enderror" id="selectmarca" name="marca" required>
                                
                                    <option value="">Selecciona la marca del vehículo</option>
                                    @foreach($marcas as $marca)
                                        <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                                    @endforeach
                                </select>
                                @error('marca')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="inputnombre">Nombre del vehículo</label>
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
                                
                                    <option value="">Selecciona la transmisiòn del vehículo</option>
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
                                
                                <option value="">Seleccione el combustible del vehículo</option>
                                @foreach($combustibles as $combustible)
                                    <option value="{{$combustible->id}}">{{$combustible->nombre}}</option>
                                @endforeach
                                </select>
                                @error('combustible')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="selectestadovehiculo">Estado del vehículo</label>
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
                            <div class="col-lg-4">
                            <label for="selectestadoaplicativo">Estado del aplicativo:</label>
                                <select class="form-control  @error('estadoaplicativo') is-invalid @enderror" id="selectestadoaplicativo" name="estadoaplicativo" required>
                                
                                    <option value="">Estado en el aplicativo</option>
                                    @foreach($estadoaplicativos as $estadoaplicativo)
                                        <option value="{{$estadoaplicativo->id}}">{{$estadoaplicativo->nombre}}</option>
                                    @endforeach
                                </select>
                                @error('estadoaplicativo')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            

                            <div class="col-lg-8">
                                <label for="textareadescripcion">Descripciòn</label>
                                <textarea class="form-control @error('descripcion') is-invalid @enderror" id="textareadescripcion" placeholder="Descripcion..." value="{{old('descripcion')}}" name="descripcion" rows="3" required></textarea>
                                @error('descripcion')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            </div>

                        
                            <div class="upload mt-3">
                                
                                <div class="" id="div-imgprofile">
                                    <input type="file" name="imagenes[]" id="inputprofileimg" accept="image/png, .jpeg, .jpg" multiple>
                                    <i class="fas fa-camera" id="iconoinput"></i>
                                </div>
                            </div>
                            @error('imagenes[]')
                                <div class="text-danger">{{$message}}</div>
                            @enderror

                            

                        <div class="row mt-5">
                            <button type="submit" class="btn btn-success" id="btn-submit">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection


@section('scripts')

    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{asset('assets/js/sweetalert2.js')}}"></script>

    <script>

        $(document).ready(function () {

            $('.selector').select2();
            $('#selectestado').select2();
            $('#selectciudad').select2();
            

            $('.agregarVehiculo').submit(function (e) { 
                e.preventDefault();


                //Se lanza una alerta antes de enviar el formulario para confirmar el envio
                Swal.fire({
                title: '¿Seguro que quieres agregar este nuevo vehículo?',  //Se hace la confirmacion de si se quiere agregar el campo
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',                      //Se lanza una alerta para confirmar si se quiere enviar
                confirmButtonText: 'Si, agregar',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {       //Se hace un condicional, de si la alerta a sido confirmaba
                    this.submit();      //Si se confirma el envio realiza el submit del formulario
                }
                })
            });
        });
    </script>







@endsection