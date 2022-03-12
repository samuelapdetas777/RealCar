@extends('layouts.app')

@section('title', 'Estados en el aplicativo')



@section('content')

                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center text-black">Agregar estados de los vehículos en el aplicativo</h1>
                        <div class="card">
                            <hr class="bg-primary">
                            <a href="/estadoaplicativo">< Volver</a>
                            <div class="card-body">
                                <div class="col">
                                    <form action="{{route('estadoaplicativo.store')}}" method="POST" class="formAgregarEstado">
                                    <div class="form-outline">
                                        @csrf
                                        
                                        <label for="inputEstadoAplicativo">Estado</label>
                                        <input type="text" class="form-control " id="inputEstadoAplicativo" placeholder="Estado" value="{{old('nombreEstadoAplicativo')}}" name="nombre" required>
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

@endsection

@section('scripts')
<script src="{{ asset('assets/js/sweetalert2.js') }}"></script>

<script>
    
    $(document).ready(function () {

        let nuevoEstadoForm = $('.formAgregarEstado');       //definimos una variable que contenga el formulario
        let inputEstado = $('#inputEstadoAplicativo');      //definimos una variable que contenga el input
        
        nuevoEstadoForm.submit(function (e) {       //Generamos una fucnion cuando el formulario sea enviado (submit)
            e.preventDefault();
            
            //desplegamos una alerta
            Swal.fire({
            title: '¿Seguro que quieres agregar "'+inputEstado.val()+'" como nuevo estado?',  //Se hace la confirmacion de si se quiere agregar el campo
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
        

@if($errors->any())  {{--Detectamos si llega algun error desde el controlador--}}
    <script>
        $(document).ready(function () {
            $('#inputEstadoAplicativo').addClass('is-invalid');     //Agregamos una calse al input, para mostrar el error
        });
    </script>
@endif

@endsection