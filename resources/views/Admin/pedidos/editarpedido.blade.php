@extends('layouts.app')

@section('title', 'Pedidos')

@section('css')
<link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')


<div class="card">
    <div class="card-body">
            <h1 class="text-center text-black">Editar pedido</h1>
        <div class="card">
        
            <hr class="bg-primary">
            <a href="/admin/pedidos">< Volver</a>
            <div class="card-body">
                <div class="col">

                    <form action="/admin/pedidos/{{$pedido->id}}" method="POST" class="editarPedido">
                        @csrf
                        @method('PUT')
                        
                        <div class="row mt-5">
                            <div class="col">
                                <label for="selectvehiculo">Vehículo: *</label>
                                
                                    @foreach($vehiculos as $vehiculo)
                                        @if($pedido->vehiculo == $vehiculo->id)
                                            <p>{{$vehiculo->id}} - {{$vehiculo->nombre}} - ${{$vehiculo->precio}}</p>
                                        @endif
                                    @endforeach
                                
                            </div>
                        </div>
                        
                        <div class="row mt-5">
                            <div class="col">
                                <label for="selectvalor">Valor: *</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="number" class="form-control @error('valor') is-invalid @enderror" name="valor" aria-label="Amount (to the nearest dollar)" value="{{$pedido->valor}}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                    @error('valor')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col">
                                <label for="fecha">Fecha de entrega: *</label>
                                <div class="input-group date" data-provide="datepicker">
                                    <input type="text" name="fecha" class="form-control @error('fecha') is-invalid @enderror" value="{{$fecha}}">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                    @error('fecha')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col">
                                <label for="estadopedido">Estado del pedido: *</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="estado" id="estadopedido1" value="0" checked>
                                    <label class="form-check-label" for="estadopedido1">
                                        Pedido
                                    </label>
                                </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="estado" id="estadopedido2" value="1">
                                    <label class="form-check-label" for="estadopedido2">
                                        Venta
                                    </label>
                                </div>
                                @error('estado')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="row mt-5">
                            <button type="submit" class="btn btn-success">Editar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection


@section('scripts')

    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{asset('assets/js/sweetalert2.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap-datepicker.min.js')}}"></script>

    <script>

        $(document).ready(function () {

            $('#selectcliente').select2();
            $('#selectvehiculo').select2();
            
            

            $('.agregarPedido').submit(function (e) { 


                //Se lanza una alerta antes de enviar el formulario para confirmar el envio
                Swal.fire({
                title: '¿Seguro que quieres agregar este nuevo pedido?',  //Se hace la confirmacion de si se quiere agregar el campo
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