@extends('layouts.app')

@section('title', 'vehiculos')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection

@section('content')


    

                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center text-black">Usuarios</h1>
                        <div class="card">
                        
                        <a href="{{route('usuarios.create')}}" class="btn btn-primary" >
                            Agregar nuevo usuario<i class="fas fa-plus"></i>
                        </a>
                            <hr class="bg-primary">
                            <div class="card-body">

                            @forelse($usuarios as $usuario )
                            
                            
                                <div class="card usercard mr-2">
                                    <div class="top-container"> 
                                        <figure class="avatar mr-2 bg-info  text-white img-fluid profile-image" data-initial="SA"></figure>
                                    
                                        <div class="ml-3">
                                            <h5 class="name">{{$usuario->name}} {{$usuario->last_name}}</h5>
                                            @if(!empty($usuario->getRoleNames()))
                                                @foreach($usuario->getRoleNames() as $rolName)
                                                    <p class="rol"><span class="badge bg-success">{{$rolName}}</span></p>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <span><i class="fas fa-id-card"></i>{{$usuario->document}}</span>
                                            <span class="d-block"><i class="fas fa-phone-alt"></i>{{$usuario->phone}}</span>
                                        </li>
                                        <li class="list-group-item">
                                            <span class="d-block"><a href="">Ver Catálogo</a></span>
                                            <span class="d-block"><a href="">Ver Citas</a></span>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="/usuarios/{{$usuario->id}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            <a href="/usuarios/{{$usuario->id}}/edit" class="btn btn-success"><i class="fas fa-pen"></i></a>
                                        </li>
                                    </ul>
                                    
                                </div>
                            

                            @empty


                            <h2>No se encontraron usuarios</h2>

                            @endforelse


                            
                            
                            
                           


                            </div>
                            <div class="pagination justify-content-star">
                                {!! $usuarios->links() !!}
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