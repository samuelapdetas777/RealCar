@extends('layouts.app')

@section('title', 'Sedes')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.min.css')}}">
@endsection

@section('content')
                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center text-black">Sedes de RealCar</h1>
                        <div class="card">
                        <a href="/admin/sede/create" class="btn btn-dark">
                            Agregar  <i class="fas fa-plus"></i>
                        </a>
                            <hr class="bg-primary">
                            <div class="card-body">
                                <table class="table table-hover table-dark text-light" id="tablesedes">
                                    <thead>
                                        <tr>
                                        <th scope="col" class="text-light">#ID</th>
                                        <th scope="col" class="text-light">Nombre</th>
                                        <th scope="col" class="text-light">Ciudad</th>
                                        <th scope="col" class="text-light">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($sedes as $sede)
                                        <tr class="bg-dark hover">
                                            <th scope="row">{{$sede->id}}</th>
                                            <td>{{$sede->nombre}}</td>

                                            @foreach($ciudades as $ciudad)
                                                @if($sede->ciudades_id == $ciudad->id)
                                                <td>{{$ciudad->nombre}}</td>
                                                @endif
                                            @endforeach
                                            <td>
                                                <form action="{{ route ('sede.destroy',$sede->id) }}" method="POST" class="deleteSede">
                                                    <a href="/admin/sede/{{$sede->id}}/edit" id="sedeeditarbtn" class="btn btn-info editarbtn">Editar <i class="fas fa-pen"></i></a>
                                                    <a href="/admin/sede/{{$sede->id}}" id="sededetallebtn" class="btn btn-success mostrarbtn">Mostrar <i class="fas fa-eye"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Eliminar <i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        
                                        @empty
                                        <tr class="bg-dark hover">
                                            <td colspan="6">
                                                No hay sedes registradas, agrega uno nuevo para verlos aqui.
                                            </td>
                                        </tr>
                                        @endforelse
                                        

                                    </tbody>
                                </table>

                                
                            </div>
                        </div>
                        </div>
                    </div>


@endsection

@section('scripts')

<script src="{{ asset('assets/js/sweetalert2.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>



<script>
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
    $(document).ready(function () {
        $('#tablesedes').DataTable();
    });
</script>




@if(session('eliminar') == 'ok')
    <script>
        Swal.fire({
                icon: 'success',
                title: 'Se ha eliminado correctamente',
                timer: 1500,
                timerProgressBar: true,
                })
    </script>
@elseif(session('actualizar') == 'ok')
    <script>
        Swal.fire({
                icon: 'success',
                title: 'Se han guardado los cambios correctamente',
                timer: 1500,
                timerProgressBar: true,
                })
    </script>
@elseif(session('agregar') == 'ok')
    <script>
        Swal.fire({
                icon: 'success',
                title: 'Se ha agregado correctamente',
                timer: 1500,
                timerProgressBar: true,
                })
    </script>
@endif


@endsection