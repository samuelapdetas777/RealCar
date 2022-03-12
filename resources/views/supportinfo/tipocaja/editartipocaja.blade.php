@extends('layouts.app')

@section('title', 'Transmisiones')

@section('css')

@endsection

@section('content')


<div class="card">
    <div class="card-body">
            <h1 class="text-center text-black">Agregar transmisiones de los vehículos en el aplicativo</h1>
        <div class="card">
        
            <hr class="bg-primary">
            <a href="/tipocaja">< Volver</a>
            <div class="card-body">
                <div class="col">
                    <form action="/tipocaja/{{$tipocaja->id}}" method="POST" class="formEditaTipoCaja">
                    <div class="form-outline">
                        @csrf
                        @method('PUT')

                        <label for="inputTipoCaja">Transmisión</label>
                        <input type="text" class="form-control " id="inputTipoCaja" placeholder="Transmisión" value="{{$tipocaja->nombre}}" name="nombre" required>
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

            let inputTipoCajaAnt = $('#inputTipoCaja').val();

            $('.formEditaTipoCaja').submit(function (e) { 
                e.preventDefault();

                let inputTipoCaja = $('#inputTipoCaja').val();
                

                //Se lanza una alerta antes de enviar el formulario para confirmar el envio
                Swal.fire({
                title: '¿Seguro que quieres cambiar "'+inputTipoCajaAnt+'" por "'+inputTipoCaja+'"?',  //Se hace la confirmacion de si se quiere agregar el campo
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',                      //Se lanza una alerta para confirmar si se quiere enviar
                confirmButtonText: 'Si, editar',
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
            $('#inputTipoCaja').addClass('is-invalid');
        </script>
@endif


@endsection