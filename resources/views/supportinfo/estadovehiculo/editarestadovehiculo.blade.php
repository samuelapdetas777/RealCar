@extends('layouts.app')

@section('title', 'Estado de los vehiculos')

@section('css')

@endsection

@section('content')


<div class="card">
    <div class="card-body">
            <h1 class="text-center text-black">Editar un estado de los vehículos</h1>
        <div class="card">
        
            <hr class="bg-primary">
            <a href="/admin/estadovehiculo">< Volver</a>
            <div class="card-body">
                <div class="col">
                    <form action="/estadovehiculo/{{$estadov->id}}" method="POST" class="formEditarEstadoVehiculo">
                    <div class="form-outline">
                        @csrf
                        @method('PUT')
                        
                        <label for="inputEstadoVehiculo">Estado</label>
                        <input type="text" class="form-control " id="inputEstadoVehiculo" placeholder="Estado" value="{{$estadov->nombre}}" name="nombre" required>
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

            let inputEstadoVehiculoAnt = $('#inputEstadoVehiculo').val();


            $('.formEditarEstadoVehiculo').submit(function (e) { 
                e.preventDefault();

                let inputEstadoVehiculo = $('#inputEstadoVehiculo').val();
                

                //Se lanza una alerta antes de enviar el formulario para confirmar el envio
                Swal.fire({
                title: '¿Seguro que quieres cambiar "'+inputEstadoVehiculoAnt+'" por "'+inputEstadoVehiculo+'"?',  //Se hace la confirmacion de si se quiere agregar el campo
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
            $('#inputEstadoVehiculo').addClass('is-invalid');
        </script>
@endif


@endsection