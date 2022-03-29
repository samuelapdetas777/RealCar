@extends('layouts.app')

@section('title', 'Roles')

@section('css')

@endsection

@section('content')


<div class="card">
    <div class="card-body">
            <h1 class="text-center text-black">Agregar un nuevo rol</h1>
        <div class="card">
        
            <hr class="bg-primary">
            <a href="/roles">< Volver</a>
            <div class="card-body">
                <div class="col">
                    <form action="{{route('roles.store')}}" method="POST" class="formAgregarRol">
                    <div class="form-outline">
                        @csrf
                        
                        <label for="inputMarca">Marca</label>
                        <input type="text" class="form-control " id="inputNombreRol" placeholder="Rol" value="{{old('name')}}" name="name" required>
                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        <br>

                        <label for="permisos">Permisos para este rol:</label>
                        @foreach($permisos as $permiso)
                        <label class="form-check-label  d-block" for="{{$permiso->name}}">
                            <input class="form-check-input checkpermisos" type="checkbox" value="{{$permiso->id}}" id="{{$permiso->name}}" name="permission[]">
                            {{$permiso->name}}
                        </label>

                        @endforeach

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

            let checkbox = $('.checkpermisos');
            $('.checkpermisos').click(function (e) { 
                let permission = [];




                
            });
            
            $('.formAgregarMarca').submit(function (e) { 
                e.preventDefault();

                let inputMarca = $('#inputMarca').val();
                

                //Se lanza una alerta antes de enviar el formulario para confirmar el envio
                Swal.fire({
                title: '¿Seguro que quieres agregar "'+inputMarca+'" como nueva marca?',  //Se hace la confirmacion de si se quiere agregar el campo
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