@extends('layouts.app')

@section('title', 'Compras')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.min.css')}}">
@endsection

@section('content')


    

                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center text-black">Compras de la empresa</h1>
                        <div class="card">
                        
                        <a href="{{route('compras.create')}}" class="btn btn-dark" >
                            Agregar <i class="fas fa-plus"></i>
                        </a>
                            <hr class="bg-primary">
                            <div class="rounded-lg p-2" style="background-color: gray;">
                                <form action="/admin/reportes/compras" class="row text-center">
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
                                <table class="table table-hover table-dark text-light " id="tablepedidos">
                                    <thead>
                                        <tr>
                                        <th scope="col" class="text-light">#ID</th>
                                        <th scope="col" class="text-light">Veh??culo</th>
                                        <th scope="col" class="text-light">Valor ($)</th>
                                        <th scope="col" class="text-light">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($compras as $compra)
                                        <tr class="bg-dark hover">
                                            <th scope="row">{{$compra->id}}</th>
                                            @foreach($vehiculos as $vehiculo)
                                                @if($vehiculo->id == $compra->vehiculo)
                                                    <td>{{$vehiculo->id}} {{$vehiculo->nombre}}</td>
                                                @endif
                                            @endforeach
                                                <td>$ {{$compra->valor}}</td>
                                            <td>
                                                
                                                    <a href="/admin/compras/{{$compra->id}}" class="btn btn-success editarbtn">Ver<i class="fas fa-eye"></i></a>
                                                    
                                                    
                                            </td>
                                        </tr>
                                        
                                        @empty
                                        <tr class="bg-dark hover">
                                            <td colspan="5">

                                                No hay compras registradas, agrega uno nuevo para verlo aqui.
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


    $(document).ready(function () {
        

        $('#tablepedidos').DataTable();      //Definimos la tabla como una DataTable



});
</script>


@if(!empty($e))
    @if($e == 1)
        <script>
            
            Swal.fire({
                    icon: 'error',
                    title: 'Esta compra no existe'
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