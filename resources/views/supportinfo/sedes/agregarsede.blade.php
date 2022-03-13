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
                    <form action="{{route('tipocaja.store')}}" method="POST" class="formAgregarTipoCaja">
                    <div class="form-outline">
                        @csrf
                        
                        <label for="inputTipoCaja">Transmisión</label>
                        <input type="text" class="form-control " id="inputTipoCaja" placeholder="Transmisión" value="{{old('nombre')}}" name="nombre" required>
                        @error('nombre')
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

    <script src="{{asset('assets/js/sweetalert2.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('.formAgregarTipoCaja').submit(function (e) { 
                e.preventDefault();

                let inputTipoCaja = $('#inputTipoCaja').val();
                

                //Se lanza una alerta antes de enviar el formulario para confirmar el envio
                Swal.fire({
                title: '¿Seguro que quieres agregar "'+inputTipoCaja+'" como nueva transmisión?',  //Se hace la confirmacion de si se quiere agregar el campo
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
            $('#inputTipoCaja').addClass('is-invalid');
        </script>
@endif


@endsection