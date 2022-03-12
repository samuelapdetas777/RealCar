@extends('layouts.app')

@section('title', 'Estados en el aplicativo')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.min.css')}}">
@endsection

@section('content')


    

                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center text-black">Estados de los vehículos en el aplicativo</h1>
                        <div class="card">
                        {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalformagregar">
                            Agregar <i class="fas fa-plus"></i>
                        </button>--}}
                        <a href="{{route('estadoaplicativo.create')}}" class="btn btn-primary" >
                            Agregar <i class="fas fa-plus"></i>
                        </a>
                            <hr class="bg-primary">
                            <div class="card-body">
                                <table class="table table-hover table-dark text-light " id="tabletransmision">
                                    <thead>
                                        <tr>
                                        <th scope="col" class="text-light">#ID</th>
                                        <th scope="col" class="text-light">Nombre</th>
                                        <th scope="col" class="text-light">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($estados as $estado)
                                        <tr class="bg-dark hover">
                                            <th scope="row">{{$estado->id}}</th>
                                            <td>{{$estado->nombre}}</td>
                                            <td>
                                                
                                                <form action="{{ route ('estadoaplicativo.destroy',$estado->id) }}" method="POST" class="deleteEstadoAplicativo">
                                                    <a href="/estadoaplicativo/{{$estado->id}}/edit" class="btn btn-info editarbtn">Editar<i class="fas fa-pen"></i></a>
                                                    {{--{{route('estadoaplicativo.index')}}--}}
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Eliminar <i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        {{-- Modal Editar--}}
                                        {{--@include('supportinfo.estadoaplicativo.layouts.modaleditar')--}}
                                        
                                        
                                        
                                        @empty
                                            No hay Estados registrados, agrega uno nuevo para verlos aqui.
                                        @endforelse
                                        

                                    </tbody>
                                </table>

                                {{-- <div class="d-flex justify-content-center">
                                    {{ $estados->links() }}
                                </div> --}}
                            </div>
                        </div>
                        </div>
                    </div>
            
                                    {{-- Modal Agregar--}}    
                                    @include('supportinfo.estadoaplicativo.layouts.modalagregar'); 



@endsection

@section('scripts')

<script src="{{ asset('assets/js/sweetalert2.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>

<script>
    $(document).ready(function () {

        $('#tabletransmision').DataTable();      //Definimos la tabla como una DataTable

                
        $('.deleteEstadoAplicativo').submit(function (e) { 
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
        Swal.fire(
                'Eliminado!',
                'El campo fue eliminado permanentemente',
                'success'
                )
    </script>
@elseif(session('actualizar') == 'ok')
    <script>
        Swal.fire(
                'Actualizado!',
                'El campo fue actualizado correctamente',
                'success'
                )
    </script>
@elseif(session('agregar') == 'ok')
    <script>
        Swal.fire({
                icon: 'success',
                title: 'Se ha guardado correctamente',
                timer: 1000,
                timerProgressBar: true,
                })
    </script>
@endif


@endsection