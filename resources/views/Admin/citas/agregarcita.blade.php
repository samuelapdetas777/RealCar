@extends('layouts.app')

@section('title', 'citas')

@section('css')
<link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')


<div class="card">
    <div class="card-body">
            <h1 class="text-center text-black">Agregar una nueva cita</h1>
        <div class="card">
        
            <hr class="bg-primary">
            <a href="/admin/citas">< Volver</a>
            <div class="card-body">
                <div class="col">

                    <form action="{{route('citas.store')}}" method="POST" class="agregarCita">
                        @csrf
                        <div class="row mt-5">
                            <div class="col">
                                <label for="inputasunto">Asunto: *</label>
                                <input type="text" class="form-control @error('asunto') is-invalid @enderror" id="inputasunto" value="{{old('asunto')}}" placeholder="Asunto..." name="asunto" required>
                                @error('asunto')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col">
                                <label for="selectvehiculo">Vehículo: </label>
                                <select  class="form-control selector @error('vehiculo') is-invalid @enderror" id="selectvehiculo" name="vehiculo" >
                                
                                <option value="">Selecciona el vehículo</option>
                                @foreach($vehiculos as $vehiculo)
                                    <option value="{{$vehiculo->id}}"> Id Proeedor: {{$vehiculo->user_id}} ---  Id Vehículo {{$vehiculo->id}} - {{$vehiculo->nombre}}</option>
                                @endforeach
                                </select>
                                @error('vehiculo')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row mt-5">
                            <div class="col">
                                <label for="selectproveedor">Proveedor: </label>
                                <select  class="form-control selector @error('proveedor') is-invalid @enderror" id="selectproveedor" name="proveedor" >
                                
                                <option value="">Selecciona el Proveedor</option>
                                @foreach($pusuarios as $usuario)
                                    <option value="{{$usuario->id}}">{{$usuario->id}} - {{$usuario->name}} {{$usuario->last_name}}</option>
                                @endforeach
                                </select>
                                @error('proveedor')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col">
                                <label for="selectcliente">Cliente: </label>
                                <select  class="form-control selector @error('cliente') is-invalid @enderror" id="selectcliente" name="cliente" >
                                
                                <option value="">Selecciona el Cliente</option>
                                @foreach($cusuarios as $usuario)
                                    <option value="{{$usuario->id}}">{{$usuario->id}} - {{$usuario->name}} {{$usuario->last_name}}</option>
                                @endforeach
                                </select>
                                @error('proveedor')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col">
                                <label for="inputfecha">Fecha de la cita: *</label>
                                <div class="input-group date" >
                                    <input type="date" class="form-control @error('fecha') is-invalid @enderror" id="inputfecha" name="fecha" value="{{old('fecha')}}"  min="<?= date('Y-m-d'); ?>">
                                    
                                    @error('fecha')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label for="inputhora">Hora de la cita: *</label>
                                <div class="input-group " >
                                    <input type="time" class="form-control @error('hora') is-invalid @enderror" id="inputhora" name="hora" value="{{old('hora')}}" min="8:00:00">
                                    
                                    @error('hora')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col">
                                <label for="selectsede">Sede: *</label>
                                <select  class="form-control selector @error('sede') is-invalid @enderror" id="selectsede" name="sede" required>
                                
                                <option value="">Selecciona la sede</option>
                                @foreach($sedes as $sede)
                                    <option value="{{$sede->id}}">{{$sede->nombre}} - {{$sede->correo}} - {{$sede->telefono}}</option>
                                @endforeach
                                </select>
                                @error('sede')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col">
                                <label for="inputcomentario">Comentarios: *</label>
                                <textarea  class="form-control  @error('comentario') is-invalid @enderror" placeholder="Comentario..." id="inputcomentario" name="comentario" required></textarea>
                                @error('comentario')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="row mt-5">
                            <button type="submit" class="btn btn-success">Agregar</button>
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

            $('.selector').select2();
            $('#selectvehiculo').select2();
            
            

            $('.agregarCita').submit(function (e) { 
                e.preventDefault();


                //Se lanza una alerta antes de enviar el formulario para confirmar el envio
                Swal.fire({
                title: '¿Seguro que quieres agregar esta nueva cita?',  //Se hace la confirmacion de si se quiere agregar el campo
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