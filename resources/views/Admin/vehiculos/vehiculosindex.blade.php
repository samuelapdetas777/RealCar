@extends('layouts.app')

@section('title', 'Vehiculos')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection

@section('content')


    

                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center text-black">Vehiculos</h1>
                        <div class="card">
                        
                        <a href="{{route('vehiculos.create')}}" class="btn btn-primary" >
                            Agregar nuevo usuario<i class="fas fa-plus"></i>
                        </a>
                            <hr class="bg-primary">
                            <div class="card-body">







                            <div class="container-fluid d-flex justify-content-center">
    <div class="row mt-5">
        
        <div class="col-sm-4">
            <div class="card"> <img src="{{asset('img/img-landing/mazda.jpg')}}" class="card-img-top" width="100%">
                <div class="card-body pt-0 px-0">
                    <div class="d-flex flex-row justify-content-between mb-0 px-3"> <small class="text-muted mt-1">STARTING AT</small>
                        <h6>&dollar;22,495&ast;</h6>
                    </div>
                    <hr class="mt-2 mx-3">
                    <div class="d-flex flex-row justify-content-between px-3 pb-4">
                        <div class="d-flex flex-column"><span class="text-muted">Fuel Efficiency</span><small class="text-muted">L/100KM&ast;</small></div>
                        <div class="d-flex flex-column">
                            <h5 class="mb-0">8.5/7.1</h5><small class="text-muted text-right">(city/Hwy)</small>
                        </div>
                    </div>
                    <div class="d-flex flex-row justify-content-between p-3 mid">
                        <div class="d-flex flex-column"><small class="text-muted mb-1">ENGINE</small>
                            <div class="d-flex flex-row"><i class="fas fa-tachometer"></i>
                                <div class="d-flex flex-column ml-1"><small class="ghj">1.4L MultiAir</small><small class="ghj">16V I-4 Turbo</small></div>
                            </div>
                        </div>
                        <div class="d-flex flex-column"><small class="text-muted mb-2">HORSEPOWER</small>
                            <div class="d-flex flex-row"><img src="https://imgur.com/J11mEBq.png">
                                <h6 class="ml-1">135 hp&ast;</h6>
                            </div>
                        </div>
                    </div> <small class="text-muted key pl-3">Standard key Features</small>
                    <div class="mx-3 mt-3 mb-2"><button type="button" class="btn btn-danger btn-block"><small>BUILD & PRICE</small></button></div> <small class="d-flex justify-content-center text-muted">*Legal Disclaimer</small>
                </div>
            </div>
        </div>
    </div>
</div>


















{{--
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
                                            <a href="/admin/usuarios/{{$usuario->id}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                            <a href="/admin/usuarios/{{$usuario->id}}/edit" class="btn btn-success"><i class="fas fa-pen"></i></a>
                                        </li>
                                    </ul>
                                    
                                </div>
                            

                            @empty


                            <h2>No se encontraron usuarios</h2>

                            @endforelse


                            
                            
                            
                           


                            </div>
                            <div class="pagination justify-content-star">
                                {!! $usuarios->links() !!}
                            </div>--}}
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