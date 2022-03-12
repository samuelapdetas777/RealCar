@extends('layouts.app')

@section('title', 'Transmisiones')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.min.css')}}">
@endsection

@section('content')
                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center text-black">Tipos de cajas de los vehículos</h1>
                        <div class="card">
                        <a href="/tipocaja/create" class="btn btn-primary">
                            Agregar  <i class="fas fa-plus"></i>
                        </a>
                            <hr class="bg-primary">
                            <div class="card-body">
                                <table class="table table-hover table-dark text-light " id="tabletipocaja">
                                    <thead>
                                        <tr>
                                        <th scope="col" class="text-light">#ID</th>
                                        <th scope="col" class="text-light">Nombre</th>
                                        <th scope="col" class="text-light">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($tipos as $tipo)
                                        <tr class="bg-dark hover">
                                            <th scope="row">{{$tipo->id}}</th>
                                            <td>{{$tipo->nombre}}</td>
                                            <td>
                                                <form action="{{ route ('tipocaja.destroy',$tipo->id) }}" method="POST" class="deleteTipoCaja">
                                                    <a href="/tipocaja/{{$tipo->id}}/edit" id="tipocajaeditarbtn" class="btn btn-info editarbtn">Editar<i class="fas fa-pen"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Eliminar <i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        
                                        @empty
                                            No hay Estados registrados, agrega uno nuevo para verlos aqui.
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
    $(document).ready(function () {
        $('#tabletipocaja').DataTable();
        $('.deleteTipoCaja').submit(function (e) { 
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