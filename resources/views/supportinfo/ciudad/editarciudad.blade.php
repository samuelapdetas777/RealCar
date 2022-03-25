@extends('layouts.app')

@section('title', 'Ciudades')

@section('css')

@endsection

@section('content')


<div class="card">
    <div class="card-body">
            <h1 class="text-center text-black">Editar ciudad de Colombia</h1>
        <div class="card">
        
            <hr class="bg-primary">
            <a href="/ciudad">< Volver</a>
            <div class="card-body">
                <div class="col">
                    <form action="/ciudad/{{$ciudad->id}}" method="POST" class="formEditarCiudad">
                    <div class="form-outline">
                        @csrf
                        @method('PUT')
                        
                        <label for="inputCiudad">Ciudad</label>
                        <input type="text" class="form-control " id="inputCiudad" placeholder="Ciudad" value="{{$ciudad->nombre}}" name="nombre" required>
                        @error('nombre')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror

                    </div>
                    <button type="submit" class="btn btn-success mt-2">Editar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection


@section('scripts')

    <script src="{{asset('assets/js/sweetalert2.js')}}"></script>

    <script>
        $(document).ready(function () {

            let inputCiudadAnt = $('#inputCiudad').val();

            $('.formEditarCiudad').submit(function (e) { 
                e.preventDefault();

                let inputCiudad = $('#inputCiudad').val();
                

                //Se lanza una alerta antes de enviar el formulario para confirmar el envio
                Swal.fire({
                title: '¿Seguro que quieres cambiar "'+inputCiudadAnt+'" por "'+inputCiudad+'"?',  //Se hace la confirmacion de si se quiere agregar el campo
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',                      //Se lanza una alerta para confirmar si se quiere enviar
                confirmButtonText: 'Si, cambiar',
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
            $('#inputCiudad').addClass('is-invalid');
        </script>
@endif


@endsection