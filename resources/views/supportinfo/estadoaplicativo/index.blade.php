@extends('layouts.app')

@section('title', 'Estados en el aplicativo')



@section('content')


    

                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center text-black">Estados de los vehículos en el apicativo</h1>
                        <div class="card">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalformagregar">
                            Agregar <i class="fas fa-plus"></i>
                        </button>
                            <hr class="bg-primary">
                            <div class="card-body">
                                <table class="table table-hover table-dark text-light" >
                                    <thead class="bg-dark">
                                        <tr>
                                        <th scope="col" class="text-light">#ID</th>
                                        <th scope="col" class="text-light">Nombre</th>
                                        <th scope="col" class="text-light">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($estados as $estado)
                                        <tr>
                                            <th scope="row">{{$estado->id}}</th>
                                            <td>{{$estado->nombre}}</td>
                                            <td>
                                                <form action="{{ route ('estadoaplicativo.destroy',$estado->id) }}" method="POST" class="deleteestadoaplicativo">
                                                    <button type="button" href="#modalformeditar{{$estado->id}}" value="{{$estado->id}}" class="btn btn-info editarbtn" data-toggle="modal" data-target="#modalformeditar{{$estado->id}}">Editar<i class="fas fa-pen"></i></button>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Eliminar <i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        {{-- Modal Editar--}}
                                        @include('supportinfo.estadoaplicativo.layouts.modaleditar')
                                        
                                        
                                        
                                        @empty
                                            No hay Estados registrados, agrega uno nuevo para verlos aqui.
                                        @endforelse
                                        

                                    </tbody>
                                </table>

                                <div class="d-flex justify-content-center">
                                    {{ $estados->links() }}
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
            
                                    {{-- Modal Agregar--}}    
                                    @include('supportinfo.estadoaplicativo.layouts.modalagregar'); 



@endsection

@section('scripts')

<script src="{{ asset('assets/js/sweetalert2.js') }}"></script>

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
        Swal.fire(
                'Agregado!',
                'El campo fue agregado correctamente',
                'success'
                )
    </script>
@endif



<script>
    
    $(document).ready(function () {

        var ideditar = $('.editarbtn').val();
        
        
        
        $('.deleteestadoaplicativo').submit(function (e) { 
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
    @if($errors->nombreEstadoAplicativo)
        <script>
            $(document).ready(function(){
                $('#modalformagregar').modal('show')
            })
        </script>
    @else
        <script>
            $(document).ready(function(){
                $('#modalformeditar18').modal('show');
            })
        </script>
    @endif
@endif

@endsection