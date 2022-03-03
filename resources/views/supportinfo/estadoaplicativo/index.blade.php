@extends('layouts.app')

@section('title')
Estados en el aplicativo
@endsection

@section('content')


    {{--<div class="section-header">
        <h3 class="page__heading text-light">Estados del vehículo en el aplicativo</h3>
    </div>--}}
    
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Estados del vehículo en el aplicativo</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
                        <div class="card">
                            <a href="{{route('indexEstadoAplicativo')}}" class="btn btn-primary col-2">Agregar <i class="fas fa-plus"></i></a>
                            <hr class="bg-primary">
                            <div class="card-body">
                                <table class="table table-hover table-dark text-light" >
                                    <thead class="bg-dark">
                                        <tr>
                                        <th scope="col" class=" text-light">#ID</th>
                                        <th scope="col" class=" text-light">Nombre</th>
                                        <th scope="col" class=" text-light">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($estados as $estado)
                                        <tr>
                                        <th scope="row">{{$estado->id}}</th>
                                        <td>{{$estado->nombre}}</td>
                                        <td>
                                            <a href="" class="btn btn-info">Editar<i class="fas fa-pen"></i></a>
                                            <a href="" class="btn btn-danger">Eliminar <i class="fas fa-trash"></i></a>
                                        </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection