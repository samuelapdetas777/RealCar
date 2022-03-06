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
                                                    <a href="#modalformeditar{{$estado->id}}" value="{{$estado->id}}" class="btn btn-info editarbtn" data-toggle="modal" data-target="#modalformeditar{{$estado->id}}">Editar<i class="fas fa-pen"></i></a>
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

<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script>

    $(document).ready(function () {

        $(".deleteestadoaplicativo").submit(function (e) { 
            e.preventDefault();
            
            alert ("sadfasda");

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
                })

        });


       
    });
</script>
@endsection