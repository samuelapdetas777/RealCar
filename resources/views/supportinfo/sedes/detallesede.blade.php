@extends('layouts.app')

@section('title', 'Sede')

@section('css')

@endsection

@section('content')


<div class="card">
    <div class="card-body">
            <h1 class="text-center text-black">Detalle de sede RealCar</h1>
        <div class="card">
        
            <hr class="bg-primary">
            <a href="/admin/sede">< Volver</a>
            <div class="card-body">
                <div class="col">

                <table class="table table-bordered">
                    <tbody>
                    <thead>
                        <tr>
                            <th class="text-center" colspan="2">Sede RealCar</th>
                        </tr>
                    </thead>
                        <tr>
                        <th scope="row">ID:</th>
                        <td>{{$sede->id}}</td>
                        </tr>
                        <tr>
                        <th scope="row">Nombre: </th>
                        <td>{{$sede->nombre}}</td>
                        </tr>
                        <tr>
                        <th scope="row">Teléfono: </th>
                        <td>{{$sede->telefono}}</td>
                        </tr>
                        <tr>
                        <th scope="row">Correo: </th>
                        <td>{{$sede->correo}}</td>
                        </tr>
                        <tr>
                        <th scope="row">Ciudad:</th>
                        @foreach($ciudades as $ciudad)
                            @if($sede->ciudades_id == $ciudad->id)
                            <td>{{$ciudad->nombre}}</td>
                            @endif
                        @endforeach
                        </tr>
                        <tr>
                        <th scope="row">Acciones: </th>
                        <td>
                            <form action="{{ route ('sede.destroy',$sede->id) }}" method="POST" class="deleteSede">
                                <a href="/admin/sede/{{$sede->id}}/edit" id="sedeeditarbtn" class="btn btn-info editarbtn">Editar<i class="fas fa-pen"></i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar <i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                        </tr>
                        
                    </tbody>
                </table>

              

                
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
            $('.deleteSede').submit(function (e) { 
            e.preventDefault();
    
            Swal.fire({
                title: '¿Seguro quieres eliminar este campo?',
                text: "No puedes revertir este cambio",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0fbd37',
                cancelButtonColor: '#fd3328',
                confirmButtonText: 'Si, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
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