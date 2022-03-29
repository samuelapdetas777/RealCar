@extends('layouts.app')

@section('title', 'Usuarios')

@section('css')
<link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')


<div class="card">
    <div class="card-body">
            <h1 class="text-center text-black">Ver informacion de los usuarios</h1>
        <div class="card">
        
            <hr class="bg-primary">
            <a href="/usuarios">< Volver</a>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                            <div class="row mt-5">

                                <div class="col-lg-6">
                                    <label for="inputnombre">Nombre</label>
                                    <input type="text" class="form-control " id="inputnombre" placeholder="Nombre" value="{{$usuario->name}}" name="nombre" readonly>
                                    
                                </div>
                                <div class="col-lg-6">
                                    <label for="inputapellido">Apellido</label>
                                    <input type="text" class="form-control " id="inputapellido" placeholder="Apellido" value="{{$usuario->last_name}}" name="apellido" readonly>
                                    
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-lg-6">
                                    <label for="inputdocumento">Documento</label>
                                    <input type="number" class="form-control " id="inputdocumento" placeholder="Documento" value="{{$usuario->document}}" name="documento" readonly>
                                    
                                </div>
                                <div class="col-lg-6">
                                    <label for="inputcorreo">Correo</label>
                                    <input type="email" class="form-control " id="inputcorreo" placeholder="Correo electrónico" value="{{$usuario->email}}" name="email" readonly>
                                    
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-lg-6">
                                    <label for="inputcelular">Celular</label>
                                    <input type="number" class="form-control " id="inputcelular" placeholder="Celular" value="{{$usuario->phone}}" name="celular" readonly>
                                    
                                </div>
                                <div class="col-lg-6">
                                    <label for="selectciudad">Ciudad de residencia</label>
                                    <select type="number" class="form-control " id="selectciudad" name="ciudad" disabled>
                                    
                                    <option value="">Selecciona la ciudad de residencia</option>
                                    @foreach($ciudades as $ciudad)
                                        <option  {{$usuario->city_id == $ciudad->id? 'selected' : ''}}>{{$ciudad->nombre}}</option>
                                    @endforeach
                                    </select>
                                    
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-lg-6">
                                    <label for="inputdireccion">Direccion de residencia</label>
                                    <input type="text" class="form-control " id="inputdireccion" placeholder="Direccion" value="{{$usuario->address}}" name="direccion" readonly>
                                    
                                </div>
                                <div class="col-lg-6">
                                    <label for="selectrol">Rol</label>
                                    <select class="form-control" id="selectrol" name="rol" disabled>
                                        @foreach($usuario->getRoleNames() as $rol)
                                            {{--<option {{$usuario->role_id == $rol->id? 'selected' : ''}}>{{$rol->name}}</option>--}}
                                            <option value="">{{$rol}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-lg-6">
                                    <label for="selectestado">Estado</label>
                                        <select class="form-control " id="selectestado" name="estado" disabled>
                                            
                                            <option>{{$usuario->state == 1? 'Activo' : $usuario->state == 0? 'Inactivo' : 'No existe'}}</option>
                                        </select>
                                    
                                </div>
                                
                            </div>
                            <div class="row mt-5">
                                <a href="/usuarios/{{$usuario->id}}/edit" class="btn btn-success">Editar</a>
                            </div>
                    </div>
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

            $('#selectrol').select2();
            $('#selectestado').select2();
            $('#selectciudad').select2();
            

            $('.agregarUsuario').submit(function (e) { 
                e.preventDefault();


                //Se lanza una alerta antes de enviar el formulario para confirmar el envio
                Swal.fire({
                title: '¿Seguro que quieres agregar este nuevo usuario?',  //Se hace la confirmacion de si se quiere agregar el campo
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




@if($errors->any())
        <script>
            $('#inputnombre').addClass('is-invalid');
        </script>
@endif


@endsection