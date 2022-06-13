@extends('layouts.app')

@section('title', 'Usuarios')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection

@section('content')


                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center text-black">Usuarios</h1>
                        <div class="card">
                            <div class="justify-content-end text-end">

                                <i class="fas fa-user"></i> 
                                @php 
                                    use App\Models\User;
                                    echo User::count();
                                @endphp
                            </div>
                        
                        <a href="{{route('usuarios.create')}}" class="btn btn-dark" >
                            Agregar nuevo usuario<i class="fas fa-plus"></i>
                        </a>
                            <hr class="bg-primary">
                            <div class="rounded-lg p-2" style="background-color: gray;">
                                <form action="/admin/reportes/usuarios" class="row text-center">
                                    {{--<div class="col-sm-5">
                                        <label class="text-black" for="inputfechai">Fecha inicio</label>
                                        <input type="date" class="form-control" id="inputfechai" name="fechainicio" value="{{old('fecha')}}"  min="" max="<?= date('Y-m-d'); ?>">
                                    </div>
                                    
                                    <div class="col-sm-5">
                                        <label class="text-black" for="inputfechaf">Fecha fin</label>
                                        <input type="date" class="form-control d-inline" id="inputfechaf" name="fechafin" value="{{old('fecha')}}" min=""  max="<?= date('Y-m-d'); ?>">
                                    </div>--}}
                                    <div class="col">

                                        <button class="btn btn-primary mt-0" type="submit">Generar PDF</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">
                            <div class="d-block">
                                    <form action="/admin/usuarios" class="row " method="get">
                                        @csrf
                                        <div class="col-sm-10">
                                            <input type="search" class="form-control" placeholder="Buscar" value="{{$texto}}" name="texto">
                                        </div>
                                        <div class="col-sm-2">

                                            <button class="btn btn-primary" type="submit">Buscar</button>
                                        </div>
                                    </form>
                                </div>

                                @if(!empty($texto))

                                    <h5 class="mt-2 text-muted">Resultados para "{{$texto}}"</h5>
                                @endif

                            @forelse($usuarios as $usuario )
                            
                            
                                <div class="card usercard mr-2" style="height: 400px;">
                                    <div class="top-container"> 
                                        <div class="">
                                            @if($usuario->photo != null)
                                                <img src="/imagen/{{$usuario->photo}}" class="rounded-circle mr-1 thumbnail-rounded user-thumbnail" width="100" height="100" alt="">
                                            @else
                                                <img src="{{asset('img/no-profile-img.jpg')}}" class="rounded-circle mr-1 thumbnail-rounded user-thumbnail" width="100" height="100" alt="">
                                            @endif
                                        </div>
                                    
                                        <div class="col-9">
                                            <div class="ml-1">
                                                
                                            
                                            <a href="/admin/usuarios/{{$usuario->id}}" class="btn btn-info" style="padding: 2px 7px"><i class="fas fa-eye"></i></a>
                                            <a href="/admin/usuarios/{{$usuario->id}}/edit" class="btn btn-success" style="padding: 2px 7px"><i class="fas fa-pen"></i></a>

                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">

                                                    


                                            <span>{{$usuario->name}}</span>
                                            <span class="d-block">{{$usuario->last_name}}</span>
                                            @if(!empty($usuario->getRoleNames()))
                                                    @foreach($usuario->getRoleNames() as $rolName)
                                                        <p class="rol"><span class="badge bg-success">{{$rolName}}</span></p>
                                                    @endforeach
                                                @endif

                                            <span><i class="fas fa-id-card"></i>{{$usuario->document}}</span>
                                            <span class="d-block"><i class="fas fa-phone-alt"></i>{{$usuario->phone}}</span>
                                        </li>
                                        
                                            @foreach($usuario->getRoleNames() as $rolName)
                                                @if($rolName == 'Proveedor')
                                                <li class="list-group-item">
                                                    <span class="d-block"><a class="text-info" href="/admin/catalogo/{{$usuario->id}}">Ver Catálogo</a></span>
                                                    <span class="d-block"><a class="text-info" href="/admin/citas/{{$usuario->id}}">Ver Citas</a></span>
                                                </li>
                                                @elseif($rolName == 'Cliente')
                                                <li class="list-group-item">
                                                    <span class="d-block"><a class="text-info" href="/admin/citas/cliente/{{$usuario->id}}">Ver Citas</a></span>
                                                </li>
                                                @else

                                                @endif
                                            @endforeach
                                        
                                        
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
        $('#inputfechai').change(function (e) { 
            e.preventDefault();
            var fechamin = $('#inputfechai').val();
            $('#inputfechaf').attr('min', fechamin);
        });
        $('#inputfechaf').change(function (e) { 
            e.preventDefault();
            var fechamax = $('#inputfechaf').val();
            $('#inputfechai').attr('max', fechamax);
        });
    });

</script>



@if(!empty($e))
    @if($e == 1)
    <script>
        Swal.fire({
                icon: 'error',
                title: 'Este usuario no existe'
                })
    </script>
    @endif
@endif


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