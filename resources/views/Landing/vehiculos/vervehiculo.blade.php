@extends('layouts.userapp')

@section('title', 'Vehiculos')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
@endsection

@section('content')

<style>
    .text-black{
        color: black;
    }
</style>

    

        <div class="card">
            <div class="card-body">
                <h1 class="text-center text-black">Ver vehiculo</h1>
                <div class="card">
                        
                        
                    <hr class="bg-primary">
                    <div class="card-body">
                           


                        <section class="py-5 bg-light">
                            <div class="container px-4 px-lg-5 my-5">
                                <div class="row gx-4 gx-lg-5 align-items-center">
                                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="..." /></div>
                                    <div class="col-md-6">
                                        <div class="small mb-1"> <h5>
                                            
                                                {{$marca->nombre}}
                                            
                                            </h5>
                                        </div>
                                        <h1 class="display-5 fw-bolder">{{$vehiculo->nombre}}</h1>
                                        <div class="fs-5 mb-3">
                                            <span class="text-decoration-line-through">${{$vehiculo->precio}}</span> {{$estadovehiculo->nombre}}
                                        </div>
                                        <p class="lead">{{$vehiculo->descripcion}}</p>
                                        <div class="d-flex">
                                            <a href="" class="btn btn-outline-primary">
                                                <i class="fas fa-calendar-check me-1"></i>
                                                Agendar una cita
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="py-5 bg-dark">
                            <div class="container px-4 px-lg-5 my-5">
                                <div class="row gx-4 gx-lg-5 justify-content-center">
                                    <h2 class="fw-bolder mb-4">Información del proveedor</h2>
                                </div>
                            <div class="row text-center">
                                <div class="col-sm-6 mt-4">
                                    <h6>Nombre:  </h6>   {{$proveedor->name}} {{$proveedor->name}}
                                </div>
                                <div class="col-sm-6 mt-4">
                                    <h6>Celular:  </h6>   {{$proveedor->phone}}
                                </div>
                                <div class="col-sm-6 mt-4">
                                    <h6>Ciudad:  </h6>   {{$ciudadProveedor->nombre}}
                                </div>
                                <div class="col-sm-6 mt-4">
                                    <h6>Catalogo:  </h6>   <a href="/catalogo/{{$vehiculo->user_id}}">{{$proveedor->name}} {{$proveedor->name}}</a>
                                </div>
                            </div>
                            </div>
                        </section>
                        <section class="py-5 bg-light">
                            <div class="container px-4 px-lg-5 my-5">
                                <div class="row gx-4 gx-lg-5 align-items-center">
                                    



                                <table class="table table-bordered">
                    
                    <thead>
                        <tr>
                            <th class="text-center bg-dark text-light" colspan="2">Detalles del vehiculo</th>
                        </tr>
                    </thead>
                    <tbody class="text-dark">

                        <tr class="table-dark text-dark">
                            <th scope="row">ID del vehiculo:</th>
                            <td>{{$vehiculo->id}}</td>
                        </tr>

                        <tr class="">
                            <th scope="row">Motor:</th>
                            <td>{{$vehiculo->motor}}</td>
                        </tr>

                        <tr class="table-dark text-dark">
                            <th scope="row">Combustible:</th>
                                <td>{{$combustible->nombre}}</td>
                        </tr>

                        <tr class="">
                            <th scope="row">Transmisión:</th>
                                <td>{{$tipocaja->nombre}}</td>
                        </tr>

                        <tr class="table-dark text-dark">
                            <th scope="row">Modelo:</th>
                            <td>{{$vehiculo->modelo}}</td>
                        </tr>

                        <tr class="">
                            <th scope="row">Kilometraje:</th>
                                <td>{{$vehiculo->kilometraje}}</td>
                        </tr>
                        
                        <tr class="table-dark text-dark">
                            <th scope="row">Color del vehiculo: </th>
                                <td>{{$vehiculo->color}}</td>
                        </tr>

                        <tr class="">
                            <th scope="row">Bolsas de aire: </th>
                                <td>{{$vehiculo->airbag}}</td>
                        </tr>

                        <tr class="">
                            <th scope="row">Placa: </th>
                                <td>{{$vehiculo->placa}}</td>
                        </tr>

                    </tbody>
                </table>





                                </div>
                            </div>
                        </section>
                        <section class="py-5 bg-dark">
                            <div class="container px-4 px-lg-5 mt-5">
                                <h2 class="fw-bolder mb-4">Related products</h2>
                                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                                    <div class="col mb-5">
                                        <div class="card h-100">
                                            <!-- Product image-->
                                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                                            <!-- Product details-->
                                            <div class="card-body p-4">
                                                <div class="text-center">
                                                    <!-- Product name-->
                                                    <h5 class="fw-bolder">Fancy Product</h5>
                                                    <!-- Product price-->
                                                    $40.00 - $80.00
                                                </div>
                                            </div>
                                            <!-- Product actions-->
                                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mb-5">
                                        <div class="card h-100">
                                            <!-- Sale badge-->
                                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                                            <!-- Product image-->
                                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                                            <!-- Product details-->
                                            <div class="card-body p-4">
                                                <div class="text-center">
                                                    <!-- Product name-->
                                                    <h5 class="fw-bolder">Special Item</h5>
                                                    <!-- Product reviews-->
                                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                                        <div class="bi-star-fill"></div>
                                                        <div class="bi-star-fill"></div>
                                                        <div class="bi-star-fill"></div>
                                                        <div class="bi-star-fill"></div>
                                                        <div class="bi-star-fill"></div>
                                                    </div>
                                                    <!-- Product price-->
                                                    <span class="text-muted text-decoration-line-through">$20.00</span>
                                                    $18.00
                                                </div>
                                            </div>
                                            <!-- Product actions-->
                                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mb-5">
                                        <div class="card h-100">
                                            <!-- Sale badge-->
                                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                                            <!-- Product image-->
                                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                                            <!-- Product details-->
                                            <div class="card-body p-4">
                                                <div class="text-center">
                                                    <!-- Product name-->
                                                    <h5 class="fw-bolder">Sale Item</h5>
                                                    <!-- Product price-->
                                                    <span class="text-muted text-decoration-line-through">$50.00</span>
                                                    $25.00
                                                </div>
                                            </div>
                                            <!-- Product actions-->
                                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col mb-5">
                                        <div class="card h-100">
                                            <!-- Product image-->
                                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                                            <!-- Product details-->
                                            <div class="card-body p-4">
                                                <div class="text-center">
                                                    <!-- Product name-->
                                                    <h5 class="fw-bolder">Popular Item</h5>
                                                    <!-- Product reviews-->
                                                    <div class="d-flex justify-content-center small text-warning mb-2">
                                                        <div class="bi-star-fill"></div>
                                                        <div class="bi-star-fill"></div>
                                                        <div class="bi-star-fill"></div>
                                                        <div class="bi-star-fill"></div>
                                                        <div class="bi-star-fill"></div>
                                                    </div>
                                                    <!-- Product price-->
                                                    $40.00
                                                </div>
                                            </div>
                                            <!-- Product actions-->
                                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>



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














{{--
<div class="col-sm-4">
                                        <div class="card"> <img src="{{asset('img/img-landing/mazda.jpg')}}" class="card-img-top" width="100%">
                                            <div class="card-body pt-0 px-0">

                                                <div class="d-flex flex-row justify-content-between  px-3 mt-1"> 
                                                        @foreach($marcas as $marca)
                                                            <p class="d-inline"> <bold>{{$marca->id == $vehiculo->marcas_id? $marca->nombre : ''}}</bold></p>
                                                        @endforeach
                                                        {{$vehiculo->nombre}}
                                                </div>

                                                <div class="d-flex flex-row justify-content-between mb-0 px-3 mt-1 mid"> 
                                                    
                                                        Precio
                                                        <h6>&dollar;{{$vehiculo->precio}}</h6>
                                                     
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
                                                </div> 
                                                <small class="text-muted key pl-3">Standard key Features</small>
                                                <div class="mx-3 mt-3 mb-2">
                                                    <button type="button" class="btn btn-danger btn-block">
                                                        <small>Ver mas</small>
                                                    </button>
                                                </div> <small class="d-flex justify-content-center text-">*Legal Disclaimer</small>
                                            </div>
                                        </div>
                                     </div> --}}