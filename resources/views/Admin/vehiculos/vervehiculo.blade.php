@extends('layouts.app')

@section('title', 'Vehiculos')

@section('css')
<link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
<style>
    
    .imagen-activo{
        position: absolute;
        z-index: 2;
        left: 0;
    }
    .imagenvehiculo{
        width: 100%;
        min-width: 200px;
    }
    .swal-wide{
        width: 100px !important;
    }
</style>
@endsection

@section('content')


<div class="card">
    <div class="card-body">
            <h1 class="text-center text-black">Ver vehículo</h1>
        <div class="card">
        
            <hr class="bg-primary">
            <a href="/admin/vehiculos">< Volver</a>
            <div class="card-body">
                <div class="col">

                    <form action="" method="POST" class="editararVehiculo">
                        @csrf

                        <div class="row mt-5">
                            @forelse($imagenes as $i)
                                <div class="col">
                                    <img src="/imagen/{{$i->foto}}" alt="" width="150px" class="m-1 mt-2 imagenvehiculo">
                                </div>
                            @empty
                                <div class="col">
                                    <h3 class="text-muted">No hay imagenes para este vehículo</h3>
                                </div>
                            @endforelse
                        </div>

                        <div class="row mt-5">

                            <div class="col">
                            <label for="selectproveedor">Proveedor</label>
                                <select type="number" class="form-control selector @error('proveedor') is-invalid @enderror" id="selectproveedor" name="proveedor" disabled>
                                
                                    <option value="">Selecciona el dueño del vehículo</option>
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
                                <select class="form-control selector @error('marca') is-invalid @enderror" id="selectmarca" name="marca" disabled>
                                
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
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="inputnombre" placeholder="Nombre" value="{{$vehiculo->nombre}}" name="nombre" disabled>
                                @error('nombre')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-lg-6">
                                <label for="inputmodelo">Modelo</label>
                                <input type="number" class="form-control @error('modelo') is-invalid @enderror" id="inputmodelo" placeholder="Modelo" value="{{$vehiculo->modelo}}" name="modelo" disabled>
                                @error('modelo')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="inputkilometraje">Kilometraje</label>
                                <input type="number" class="form-control @error('kilometraje') is-invalid @enderror" id="inputkilometraje" placeholder="Kilometraje" value="{{$vehiculo->kilometraje}}" name="kilometraje" disabled>
                                @error('kilometraje')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-lg-6">
                                <label for="selecttipocaja">Transmisiòn: </label>
                                <select class="form-control @error('tipocaja') is-invalid @enderror" id="selecttipocaja" name="tipocaja" disabled>
                                
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
                                <input type="text" class="form-control @error('motor') is-invalid @enderror" id="inputmotor" placeholder="Motor" value="{{$vehiculo->motor}}" name="motor" disabled>
                                @error('motor')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-lg-6">
                            <label for="selectcombustible">Combustible: </label>
                                <select type="number" class="form-control @error('combustible') is-invalid @enderror" id="selectcombustible" name="combustible" disabled>
                                
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
                                <select class="form-control @error('estadovehiculo') is-invalid @enderror" id="selectestadovehiculo" name="estadovehiculo" disabled>
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
                            <div class="col-lg-6">
                                <label for="inputcolor">Color</label>
                                <input type="text" class="form-control @error('color') is-invalid @enderror" id="inputcolor" placeholder="Color" value="{{$vehiculo->color}}" name="color" disabled>
                                @error('color')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="inputplaca">Placa</label>
                                <input type="text" class="form-control @error('placa') is-invalid @enderror" id="inputplaca" placeholder="placa" value="{{$vehiculo->placa}}" name="placa" disabled>
                                @error('placa')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            
                        </div>


                        <div class="row mt-5">
                            <div class="col-lg-6">
                                <label for="inputairbag">Bolsas de aire</label>
                                <input type="number" class="form-control @error('airbag') is-invalid @enderror" id="inputairbag" placeholder="Airbags" value="{{$vehiculo->airbag}}" name="airbag" disabled>
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
                                    <input type="number" class="form-control @error('precio') is-invalid @enderror" name="precio" value="{{$vehiculo->precio}}" aria-label="Amount (to the nearest dollar) " disabled>
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
                                <select class="form-control  @error('estadoaplicativo') is-invalid @enderror" id="selectestadoaplicativo" name="estadoaplicativo" disabled>
                                
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
                                <textarea class="form-control @error('descripcion') is-invalid @enderror" id="textareadescripcion" placeholder="Descripcion..." name="descripcion" rows="3" disabled>{{$vehiculo->descripcion}}</textarea>
                                @error('descripcion')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            </div>

                        
                            
                        <div class="row mt-5">
                            <a href="/admin/vehiculos/{{$vehiculo->id}}/edit"  class="btn btn-info">Editar</a>
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



            $('.imagenvehiculo').click(function (e) { 
                console.log(this.src);
                e.preventDefault();
                Swal.fire({
                    imageUrl: this.src,
                    showConfirmButton: false,
                    showCancelButton: false,
                    width: '800px',
                })
            });





        });
    </script>







@endsection