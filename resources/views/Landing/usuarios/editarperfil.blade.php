@extends('layouts.userapp')

@section('title', 'Usuarios')

@section('css')
<link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')


<style>
    .upload{
        width: 100px;
        position: relative;
        margin: auto;
    }
    #imgprofile{
        border-radius: 50%;
        border: 3px solid #c70000;
    }
    #div-imgprofile{
      position: absolute;
      bottom: 0;
      right: 0%;
      width: 32px;
      height: 32px;
      line-height: 33px;
      text-align: center;
      overflow: hidden;
      border-radius: 50%;
    }
    #inputprofileimg{
        cursor: pointer;
        position: absolute;
        transform: scale(2);
        opacity: 0;
    }
    #inputprofileimg::-webkit-file-upload-button{
        cursor: pointer;

    }
    
</style>

<div class="card">
    <div class="card-body">
            <h1 class="text-center text-black">Editar perfil</h1>
        <div class="card">
        
            <hr class="bg-primary">
            <div class="card-body">
                <div class="col">

                    <form action="/perfil/guardar" method="POST" class="editararUsuario" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="upload">
                            @if($usuario->photo != null)
                            <img src="/imagen/{{$usuario->photo}}" width="100" height="100" alt="" id="imgprofile">
                            @else
                            <img src="{{asset('img/no-profile-img.jpg')}}" width="100" height="100" alt="" id="imgprofile">
                            @endif
                            <div class="btn-danger" id="div-imgprofile">
                                <input type="file" name="imagen" id="inputprofileimg" accept="image/png, .jpeg, .jpg">
                                <i class="fas fa-camera"></i>
                            </div>
                        </div>
                        @error('imagen')
                            <div class="text-danger">{{$message}}</div>
                        @enderror

                        <div class="row mt-5">

                            <div class="col-lg-6">
                                <label for="inputnombre">Nombre *</label>
                                <input type="text" class="form-control " id="inputnombre" placeholder="Nombre" value="{{$usuario->name}}" name="nombre" required>
                                @error('nombre')name
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="inputapellido">Apellido *</label>
                                <input type="text" class="form-control " id="inputapellido" placeholder="Apellido" value="{{$usuario->last_name}}" name="apellido" required>
                                @error('apellido')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-lg-6">
                                <label for="inputdocumento">Documento *</label>
                                <input type="number" class="form-control " id="inputdocumento" placeholder="Documento" value="{{$usuario->document}}" name="documento" required>
                                @error('documento')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="inputcorreo">Correo *</label>
                                <input type="email" class="form-control " id="inputcorreo" placeholder="Correo electrónico" value="{{$usuario->email}}" name="email" required>
                                @error('email')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-lg-6">
                                <label for="inputcelular">Celular *</label>
                                <input type="number" class="form-control " id="inputcelular" placeholder="Celular" value="{{$usuario->phone}}" name="celular" required>
                                @error('celular')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <label for="selectciudad">Ciudad de residencia *</label>
                                <select type="number" class="form-control " id="selectciudad" name="ciudad" required>
                                
                                <option value="">Selecciona la ciudad de residencia</option>
                                @foreach($ciudades as $ciudad)
                                    <option value="{{$ciudad->id}}" {{$usuario->city_id == $ciudad->id? 'selected' : ''}}>{{$ciudad->nombre}}</option>
                                @endforeach
                                </select>
                                @error('ciudad')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-5">
                            <div class="col-lg-6">
                                <label for="inputdireccion">Dirección de residencia *</label>
                                <input type="text" class="form-control " id="inputdireccion" placeholder="Dirección" value="{{$usuario->address}}" name="direccion" required>
                                @error('direccion')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
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
            
            $('#inputprofileimg').change(function(){
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#imgprofile').attr('src', e.target.result);
                    
                }
                reader.readAsDataURL(this.files[0]);
            });

            $('#imgprofile').click(function (e) { 
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