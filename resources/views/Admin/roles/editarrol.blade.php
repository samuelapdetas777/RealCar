@extends('layouts.app')

@section('title', 'Roles')

@section('css')

@endsection

@section('content')


<div class="card">
    <div class="card-body">
            <h1 class="text-center text-black">Editar un rol</h1>
        <div class="card">
        
            <hr class="bg-primary">
            <a href="/admin/roles">< Volver</a>
            <div class="card-body">
                <div class="col">
                    <form action="/admin/roles/{{$rol->id}}" method="POST" class="formEditarRol">
                    <div class="form-outline">
                        @csrf
                        @method('PUT')
                        
                        <label for="inputNombreRol">Nombre del rol: </label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="inputNombreRol" placeholder="Rol" value="{{$rol->name}}" name="nombre" required>
                        @error('nombre')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        <br>

                        
                        <label for="permisos">Permisos para este rol:</label>
                        @foreach($permisos as $permiso)
                        <label class="form-check-label  d-block" for="{{$permiso->name}}">
                            <input class="form-check-input @error('permission[]') is-invalid @enderror" type="checkbox" value="{{$permiso->id}}" id="{{$permiso->name}}" name="permission[]" @foreach($rolesPermisos as $index){{$index->permission_id == $permiso->id? 'checked' : ''}} @endforeach>
                            {{$permiso->name}}
                            @error('permission[]') 
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
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