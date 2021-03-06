@extends('layouts.app')

@section('title', 'Usuarios')

@section('css')
<link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')


<div class="card">
    <div class="card-body">
            <h1 class="text-center text-black">Agregar un nuevo usuario</h1>
        <div class="card">
        
            <hr class="bg-primary">
            <a href="/admin/usuarios">< Volver</a>
            <div class="card-body">
                <div class="col">

                    <form action="{{route('usuarios.store')}}" method="POST" class="agregarUsuario">
                        @csrf
                        <div class="row mt-5">

                            <div class="col-lg-6">
                                <label for="inputnombre">Nombre *</label>
                                <input type="text" class="form-control @error('nombre') is-invald @enderror" id="inputnombre" placeholder="Nombre" value="{{old('nombre')}}" name="nombre" required>
                                @error('nombre')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="inputapellido">Apellido *</label>
                                <input type="text" class="form-control @error('apellido') is-invalid @enderror" id="inputapellido" placeholder="Apellido" value="{{old('apellido')}}" name="apellido" required>
                                @error('apellido')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-lg-6">
                                <label for="inputdocumento">Documento *</label>
                                <input type="number" class="form-control @error('documento') is-invalid @enderror" id="inputdocumento" placeholder="Documento" value="{{old('documento')}}" name="documento" required>
                                @error('documento')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="inputcorreo">Correo *</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputcorreo" placeholder="Correo electr??nico" value="{{old('email')}}" name="email" required>
                                @error('email')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-lg-6">
                                <label for="inputpassword">Contrase??a *</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="inputpassword" placeholder="Contrase??a" value="{{old('password')}}" name="password" required>
                                @error('password')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="inputconfcontrase??a">Confirmaci??n de contrase??a *</label>
                                <input type="password" class="form-control @error('confirmacion_de_password') is-invalid @enderror" id="inputconfcontrase??a" placeholder="Confirmaci??n de la contrase??a" value="{{old('confirmacion_de_password')}}" name="confirmacion_de_password" required>
                                @error('confirmacion_de_password')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-lg-6">
                                <label for="inputcelular">Celular *</label>
                                <input type="number" class="form-control @error('celular') is-invalid @enderror" id="inputcelular" placeholder="Celular" value="{{old('celular')}}" name="celular" required>
                                @error('celular')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="selectciudad">Ciudad de residencia *</label>
                                <select type="number" class="form-control @error('ciudad') is-invalid @enderror" id="selectciudad" name="ciudad" required>
                                
                                <option value="">Selecciona la ciudad de residencia</option>
                                @foreach($ciudades as $ciudad)
                                    <option value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
                                @endforeach
                                </select>
                                @error('ciudad')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-lg-6">
                                <label for="inputdireccion">Direcci??n de residencia *</label>
                                <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="inputdireccion" placeholder="Direccion" value="{{old('direccion')}}" name="direccion" required>
                                @error('direccion')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="selectrol">Rol *</label>
                                <select class="form-control @error('roles') is-invalid @enderror" id="selectrol" name="roles" required>
                                    <option value="">Selecciona un rol</option>
                                    @foreach($roles as $rol)
                                        <option value="{{$rol->id}}">{{$rol->name}}</option>
                                    @endforeach
                                </select>
                                @error('roles')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror




                                {{--<label for="selectrol">Rol *</label>
                                <select class="form-control" id="selectrol" name="rol" required>
                                    <option value="">Selecciona un rol</option>
                                    @foreach($roles as $rol)
                                        <option value="">{{$rol}}</option>
                                    @endforeach
                                </select>--}}

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
                title: '??Seguro que quieres agregar este nuevo usuario?',  //Se hace la confirmacion de si se quiere agregar el campo
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