@extends('layouts.app')

@section('title', 'Reportes')

@section('css')
<link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.min.css')}}">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection

@section('content')


<div class="card">
    <div class="card-body">
            <h1 class="text-center text-black">Reportes</h1>
        <div class="card">
        <div class="row mt">
            <div class="col-md-6">

        {{--AQUI EMPIEZA REPORTE DE CITAS--}}
                <h3>Citas de este mes</h3>
                <div class="card-counter primary">
                    <i class="fa fa-users"></i>
                    <span class="count-numbers">@php use App\Models\Cita; 
                        echo Cita::count(); 
                        @endphp</span>
                    <span class="count-name">Citas</span>
                </div>
            </div>
        </div>
        <h3 class="mt-4">Proveedores con mas ventas</h3>
            <table class="table table-hover table-dark text-light tabla-datatable" id="tabla">
                <thead>
                    <tr>
                    <th scope="col" class="text-light">Nombre del proveedor</th>
                    <th scope="col" class="text-light">Numero de ventas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                        @foreach($proveedoresmasventas as $pcmv)
                            @if($usuario->id == $pcmv->proveedor)
                                <tr class="bg-dark hover">
                                    <th scope="row">{{$usuario->name}} {{$usuario->last_name}}</th>
                                    <td>{{$pcmv->total}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                    

                </tbody>
            </table>

            <h3 class="mt-4">Vehiculos mas registrados</h3>
            <table class="table table-hover table-dark text-light tabla-datatable" id="tabla">
                <thead>
                    <tr>
                    <th scope="col" class="text-light">Nombre de la marca</th>
                    <th scope="col" class="text-light">Numero de ventas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($marcas as $marca)
                        @foreach($vehiculosmasregistrados as $vmr)
                            @if($marca->id == $vmr->marcas_id)

                                <tr class="bg-dark hover">
                                    <th scope="row">{{$marca->nombre}}</th>
                                    <td>{{$vmr->total}}</td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                    

                </tbody>
            </table>

            <h3 class="mt-4">Vehiculos con mas ventas</h3>
            <table class="table table-hover table-dark text-light tabla-datatable" id="tabla">
                <thead>
                    <tr>
                    <th scope="col" class="text-light">Nombre de la marca</th>
                    <th scope="col" class="text-light">Numero de ventas</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($vehiculosmasventas as $vcmv)

                                <tr class="bg-dark hover">
                                    <th scope="row">{{$vcmv->nombre}}</th>
                                    <td>{{$vcmv->total}}</td>
                                </tr>
                            
                        @endforeach
                    
                    

                </tbody>
            </table>


            <h3 class="mt-4">Lugares con mas ventas</h3>
            <table class="table table-hover table-dark text-light tabla-datatable" id="tabla">
                <thead>
                    <tr>
                    <th scope="col" class="text-light">Nombre de la ciudad</th>
                    <th scope="col" class="text-light">Numero de ventas en la ciudad</th>
                    </tr>
                </thead>
                <tbody>
                    
                        @foreach($lugaresmasventas as $lcmv)
                                <tr class="bg-dark hover">
                                    <th scope="row">{{$lcmv->nombre}}</th>
                                    <th scope="row">{{$lcmv->total}}</th>
                                </tr>
                        @endforeach
                    

                </tbody>
            </table>


        </div>
    </div>

</div>



@endsection


@section('scripts')

    <script src="{{asset('assets/js/sweetalert2.js')}}"></script>
    
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>

    <script>

        $(document).ready(function () {

            $('.tabla-datatable').DataTable();
            

            $('.agregarUsuario').submit(function (e) { 
                e.preventDefault();


                //Se lanza una alerta antes de enviar el formulario para confirmar el envio
                Swal.fire({
                title: '¿Seguro que quieres agregar este nuevo usuario?',  //Se hace la confirmacion de si se quiere agregar el campo
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',                      //Se lanza una alerta para confirmar si se quiere enviar
                confirmButtonText: 'Si, agregar',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {       //Se hace un condicional, de si la alerta a sido confirmaba
                    this.submit();      //Si se confirma el envio realiza el submit del formulario
                }
                })
            });
        });
    </script>




@if($errors->any())
        <script>
            $('#inputnombre').addClass('is-invalid');
        </script>
@endif


@endsection