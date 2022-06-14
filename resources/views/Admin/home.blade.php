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
                                            <i class="fa fa-user"></i>
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
                                    

                                    <div class="col-md-4">
                                        <div class="card-counter success">
                                            <i class="fa fa-database"></i>
                                            <span class="count-numbers">@php use App\Models\Cita; echo Cita::count(); @endphp</span>
                                            <span class="count-name">citas</span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="card-counter info">
                                            <i class="fa fa-users"></i>
                                            <span class="count-numbers">@php use Spatie\Permission\Models\Role; echo Role::count(); @endphp</span>
                                            <span class="count-name">Roles</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card-counter danger">
                                            <i class="fa fa-tag"></i>
                                            <span class="count-numbers">@php use App\Models\Marca; echo Marca::count(); @endphp</span>
                                            <span class="count-name">Marcas</span>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card-counter info">
                                            <i class="fa fa-list-alt"></i>
                                            <span class="count-numbers">@php use App\Models\Pedido; echo Pedido::where('estado', 0)->count(); @endphp</span>
                                            <span class="count-name">Pedidos</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card-counter danger">
                                            <i class="fa fa-list-alt"></i>
                                            <span class="count-numbers">@php echo Pedido::where('estado', 1)->count(); @endphp</span>
                                            <span class="count-name">Ventas</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card-counter primary">
                                            <i class="fa fa-shopping-cart"></i>
                                            <span class="count-numbers">@php use App\Models\Compra; echo Compra::count(); @endphp</span>
                                            <span class="count-name">Compras</span>
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