@extends('layouts.app')

@section('title', 'Pedidos')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.min.css')}}">
@endsection

@section('content')


    

                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center text-black">Pedidos de los vehiculos de los usuarios</h1>
                        <div class="card">
                        
                        <a href="{{route('pedidos.create')}}" class="btn btn-primary" >
                            Agregar <i class="fas fa-plus"></i>
                        </a>
                            <hr class="bg-primary">
                            <div class="card-body">
                                <table class="table table-hover table-dark text-light " id="tablepedidos">
                                    <thead>
                                        <tr>
                                        <th scope="col" class="text-light">#ID</th>
                                        <th scope="col" class="text-light">Cliente</th>
                                        <th scope="col" class="text-light">Vehiculo</th>
                                        <th scope="col" class="text-light">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($pedidos as $pedido)
                                        <tr class="bg-dark hover">
                                            <th scope="row">{{$pedido->id}}</th>
                                            @foreach($usuarios as $usuario)
                                                @if($usuario->id == $pedido->cliente)
                                                    <td>{{$usuario->name}} {{$usuario->last_name}}</td>
                                                @endif
                                            @endforeach
                                            @foreach($vehiculos as $vehiculo)
                                                @if($vehiculo->id == $pedido->vehiculo)
                                                    <td>{{$vehiculo->id}} {{$vehiculo->nombre}}</td>
                                                @endif
                                            @endforeach
                                            <td>
                                                
                                                <form action="{{ route ('pedidos.destroy',$pedido->id) }}" method="POST" class="deletePedido">
                                                    <a href="/admin/pedidos/{{$pedido->id}}" class="btn btn-success editarbtn">Ver<i class="fas fa-eye"></i></a>
                                                    
                                                    <a href="/admin/pedidos/{{$pedido->id}}/edit" class="btn btn-info editarbtn">Editar<i class="fas fa-pen"></i></a>
                                                    
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btneliminar">Eliminar <i class="fas fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        
                                        @empty
                                        <tr class="bg-dark hover">
                                            <td colspan="5">

                                                No hay pedidos registrados, agrega uno nuevo para verlo aqui.
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
        

        $('#tableciudades').DataTable();      //Definimos la tabla como una DataTable



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