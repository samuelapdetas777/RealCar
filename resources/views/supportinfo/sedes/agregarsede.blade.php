@extends('layouts.app')

@section('title', 'Sedes')

@section('css')
<link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>

@endsection

@section('content')


<div class="card">
    <div class="card-body">
            <h1 class="text-center text-black">Agregar sede de RealCar</h1>
        <div class="card">
        
            <hr class="bg-primary">
            <a href="/sede">< Volver</a>
            <div class="card-body">
                <div class="col">
                    <form action="{{route('sede.store')}}" method="POST" class="formAgregarSede">
                    <div class="form-outline">
                        @csrf
                        @method('POST')
                        
                        <label class="mt-4" for="inputNombre">Nombre</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="inputNombre" placeholder="Nombre" value="{{old('nombre')}}" name="nombre" required>
                        @error('nombre')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror

                        <label class="mt-4" for="inputTelefono">Teléfono</label>
                        <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="inputTelefono" placeholder="Teléfono" value="{{old('telefono')}}" name="telefono" required>
                        @error('telefono')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror

                        <label class="mt-4" for="inputCorreo">Correo</label>
                        <input type="text" class="form-control @error('correo') is-invalid @enderror" id="inputCorreo" placeholder="Correo" value="{{old('correo')}}" name="correo" required>
                        @error('correo')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror

                        <label class="mt-4" for="inputDireccion">Dirección</label>
                        <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="inputDireccion" placeholder="Direccion" value="{{old('direccion')}}" name="direccion" required>
                        @error('direccion')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror

                        <label class="mt-4" for="selectCiudad">Ciudad</label>
                        <select class="custom-select form-control selectCiudad" id="selectCiudad" name="ciudad" required>
                            <option selected>Selecciona la ciudad...</option>
                            @foreach($ciudades as $ciudad)
                            <option value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
                            @endforeach
                        </select>
                        @error('ciudad')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror

                    </div>
                    <button type="submit" class="btn btn-success mt-2">Agregar</button>
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
            $('.selectCiudad').select2();

            $('.formAgregarSede').submit(function (e) { 
                e.preventDefault();

                

                //Se lanza una alerta antes de enviar el formulario para confirmar el envio
                Swal.fire({
                title: '¿Seguro que quieres agregar esta nueva sede?',  //Se hace la confirmacion de si se quiere agregar el campo
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