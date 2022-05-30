@extends('layouts.app')

@section('title', 'Citas')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.min.css')}}">
@endsection

@section('content')


    

                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center text-black">Citas</h1>
                        <div class="card">
                        
                        <a href="{{route('citas.create')}}" class="btn btn-dark" >
                            Agregar <i class="fas fa-plus"></i>
                        </a>
                            <hr class="bg-primary">
                            <div class="card-body">
                                <table class="table table-hover table-dark text-light " id="tablepedidos">
                                    <thead>
                                        <tr>
                                        <th scope="col" class="text-light">#ID</th>
                                        <th scope="col" class="text-light">Fecha</th>
                                        <th scope="col" class="text-light">Asunto</th>
                                        <th scope="col" class="text-light">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($citas as $cita)
                                        <tr class="bg-dark hover">
                                            <td scope="row">{{$cita->id}}</td>
                                            <td scope="row">{{$cita->fecha}} {{$cita->hora}}</td>
                                            <td scope="row">{{$cita->asunto}}</td>
                                            
                                            <td>
                                                
                                                <form action="{{ route ('citas.destroy',$cita->id) }}" method="POST" class="deleteCita">
                                                    <a href="/admin/citas/{{$cita->id}}" class="btn btn-success editarbtn">Ver <i class="fas fa-eye"></i></a>
                                                    
                                                    <a href="/admin/citas/{{$cita->id}}/edit" class="btn btn-info editarbtn">Agendar <i class="fas fa-check"></i></a>
                                                    
                                                    @csrf
                                                    @method('DELETE')
                                                    {{--<button type="submit" class="btn btn-danger btneliminar">Eliminar <i class="fas fa-trash"></i></button>--}}
                                                </form>
                                            </td>
                                        </tr>
                                        
                                        @empty
                                        <tr class="bg-dark hover">
                                            <td colspan="4">

                                                No hay citas registradas, agrega una nuevo para verla aquí.
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


$('.deleteCiudad').submit(function (e) { 
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
        

        $('#tablepedidos').DataTable();      //Definimos la tabla como una DataTable



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