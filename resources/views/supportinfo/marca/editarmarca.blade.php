@extends('layouts.app')

@section('title', 'Marcas')

@section('css')

@endsection

@section('content')


<div class="card">
    <div class="card-body">
            <h1 class="text-center text-black">Editar una marca</h1>
        <div class="card">
        
            <hr class="bg-primary">
            <a href="/admin/marca">< Volver</a>
            <div class="card-body">
                <div class="col">
                    <form action="/marca/{{$marca->id}}" method="POST" class="formEditarMarca">
                    <div class="form-outline">
                        @csrf
                        @method('PUT')
                        
                        <label for="inputMarca">Marca</label>
                        <input type="text" class="form-control " id="inputMarca" placeholder="Marca" value="{{$marca->nombre}}" name="nombre" required>
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

            let inputMarcaAnt = $('#inputMarca').val();


            $('.formEditarMarca').submit(function (e) { 
                e.preventDefault();

                let inputMarca = $('#inputMarca').val();
                

                //Se lanza una alerta antes de enviar el formulario para confirmar el envio
                Swal.fire({
                title: '¿Seguro que quieres cambiar "'+inputMarcaAnt+'" por '+inputMarca+ '"?',  //Se hace la confirmacion de si se quiere agregar el campo
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
            $('#inputMarca').addClass('is-invalid');
        </script>
@endif


@endsection