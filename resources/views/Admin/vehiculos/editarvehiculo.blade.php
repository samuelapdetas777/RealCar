@extends('layouts.app')

@section('title', 'Vehiculos')

@section('css')
<link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')


<div class="card">
    <div class="card-body">
            <h1 class="text-center text-black">Editar el vehiculo</h1>
        <div class="card">
            
        
            <hr class="bg-primary">
            <a href="/admin/vehiculos">< Volver</a>
            <div class="card-body">
                <div class="col">
                        <p class="text-center text-primary">Para aprobar un vehículo cambia el campo de Estado del aplicativo</p>
                    

                    <form action="{{route('vehiculos.update', $vehiculo->id)}}" method="POST" class="editararVehiculo">
                        @csrf
                        @method('PUT')
                        <div class="row mt-5">

                            <div class="col">
                            <label for="selectproveedor">Proveedor</label>
                                <select type="number" class="form-control selector @error('proveedor') is-invalid @enderror" id="selectproveedor" name="proveedor" required>
                                
                                    <option value="">Selecciona el dueño del vehiculo</option>
                                    @foreach($usuarios as $usuario)
                                        <option value="{{$usuario->id}}" {{$vehiculo->user_id == $usuario->id? 'selected' : ''}}>{{$usuario->name}} {{$usuario->last_name}}</option>
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
                                
                                    <option value="">Selecciona la marca del vehiculo</option>
                                    @foreach($marcas as $marca)
                                        <option value="{{$marca->id}}" {{$vehiculo->marcas_id == $marca->id? 'selected' : ''}}>{{$marca->nombre}}</option>
                                    @endforeach
                                </select>
                                @error('marca')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="inputnombre">Nombre del vehiculo</label>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="inputnombre" placeholder="Nombre" value="{{$vehiculo->nombre}}" name="nombre" required>
                                @error('nombre')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-lg-6">
                                <label for="inputmodelo">Modelo</label>
                                <input type="number" class="form-control @error('modelo') is-invalid @enderror" id="inputmodelo" placeholder="Modelo" value="{{$vehiculo->modelo}}" name="modelo" required>
                                @error('modelo')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="inputkilometraje">Kilometraje</label>
                                <input type="number" class="form-control @error('kilometraje') is-invalid @enderror" id="inputkilometraje" placeholder="Kilometraje" value="{{$vehiculo->kilometraje}}" name="kilometraje" required>
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
                                        <option value="{{$tipocaja->id}}" {{$vehiculo->tipocaja_id == $tipocaja->id? 'selected' : ''}}>{{$tipocaja->nombre}}</option>
                                    @endforeach
                                </select>
                                @error('tipocaja')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                            <label for="inputmotor">Motor</label>
                                <input type="text" class="form-control @error('motor') is-invalid @enderror" id="inputmotor" placeholder="Motor" value="{{$vehiculo->motor}}" name="motor" required>
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
                                    <option value="{{$combustible->id}}" {{$vehiculo->combustibles_id == $combustible->id? 'selected' : ''}}>{{$combustible->nombre}}</option>
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
                                        <option value="{{$estadovehiculo->id}}" {{$vehiculo->estadovehiculo_id == $estadovehiculo->id? 'selected' : ''}}>{{$estadovehiculo->nombre}}</option>
                                    @endforeach
                                </select>
                                @error('estadovehiculo')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror

                            </div>
                        </div>



                        <div class="row mt-5">
                            <div class="col">
                                <label for="inputcolor">Color</label>
                                <input type="text" class="form-control @error('color') is-invalid @enderror" id="inputcolor" placeholder="Color" value="{{$vehiculo->color}}" name="color" required>
                                @error('color')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            
                        </div>


                        <div class="row mt-5">
                            <div class="col-lg-6">
                                <label for="inputairbag">Bolsas de aire</label>
                                <input type="number" class="form-control @error('airbag') is-invalid @enderror" id="inputairbag" placeholder="Airbags" value="{{$vehiculo->airbag}}" name="airbag" required>
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
                                    <input type="number" class="form-control @error('precio') is-invalid @enderror" name="precio" value="{{$vehiculo->precio}}" aria-label="Amount (to the nearest dollar)">
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
                                        <option value="{{$estadoaplicativo->id}}" {{$vehiculo->estadoaplicativo_id == $estadoaplicativo->id? 'selected' : ''}}>{{$estadoaplicativo->nombre}}</option>
                                    @endforeach
                                </select>
                                @error('estadoaplicativo')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            

                            <div class="col-lg-8">
                                <label for="textareadescripcion">Descripciòn</label>
                                <textarea class="form-control @error('descripcion') is-invalid @enderror" id="textareadescripcion" placeholder="Descripcion..." name="descripcion" rows="3" required>{{$vehiculo->descripcion}}</textarea>
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
                            <button type="submit" class="btn btn-success">Editar</button>
                            
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
                title: '¿Seguro que quieres agregar este nuevo vehiculo?',  //Se hace la confirmacion de si se quiere agregar el campo
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