@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/style.css')}}">

@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dashboard</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card-counter primary">
                                            <i class="fa fa-users"></i>
                                            <span class="count-numbers">@php use App\Models\User; echo User::count(); @endphp</span>
                                            <span class="count-name">Usuarios</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-counter info">
                                            <i class="fa fa-car"></i>
                                            <span class="count-numbers">@php use App\Models\Vehiculo; echo Vehiculo::count(); @endphp</span>
                                            <span class="count-name">Vehiculos</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    

                                    <div class="col-md-3">
                                        <div class="card-counter success">
                                            <i class="fa fa-database"></i>
                                            <span class="count-numbers">@php use App\Models\Cita; echo Cita::count(); @endphp</span>
                                            <span class="count-name">citas</span>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="card-counter info">
                                            <i class="fa fa-users"></i>
                                            <span class="count-numbers">@php use Spatie\Permission\Models\Role; echo Role::count(); @endphp</span>
                                            <span class="count-name">Roles</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card-counter danger">
                                            <i class="fa fa-cars"></i>
                                            <span class="count-numbers">23</span>
                                            <span class="count-name">Notificaciones</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="card-counter info">
                                            <i class="fa fa-users"></i>
                                            <span class="count-numbers">@php use App\Models\Marca; echo Marca::count(); @endphp</span>
                                            <span class="count-name">Marcas</span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script src="{{ asset('assets/js/sweetalert2.js') }}"></script>
@if(session('edicionperfil') == 'ok')
    <script>
        Swal.fire({
                icon: 'success',
                title: 'Se ha editado tu perfil',
                timer: 1500,
                timerProgressBar: true,
                })
    </script>
@endif
@endsection