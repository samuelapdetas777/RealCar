@extends('layouts.master')

@section('title')
Bienvenido a RealCar
@endsection

@section('navbar-right-content')
<div class="nav-item">
  <a href="{{route('login')}}" class="btn btn-primary">Iniciar Sesión</a>
</div>
<div class="nav-item ml-4">
  <a href="{{route('userregister')}}" class="btn btn-outline-primary">Registrarse</a>
</div>
@endsection

@section('header-content')



<section id="hero" class=" p-5">
        <h1>Encuentra el vehículo de tu sueños con nosotros.</h1>
        <a href="/catalogo" class="btn btn-primary btn-landing">Buscar tu vehículo</a>
        <a href="/vehiculos/index" class="btn btn-outline-white btn-landing">Vender tu vehículo</a>
    </section>

    <section id="somos-realcar">
        <div class="container">
            <div class="img-container"></div>
            <div class="texto">

                <h2>Bienvenido a <span class="color-acento">RealCar!</span></h2>
                <p>Somos un concesionario de vehículos en Colombia.
                    Nos especializamos en la compra y venta de vehículos de marcas muy reconocidas como Volkswagen, Ford, Renault, Hyundai, Mazda, Audi, Peugeot, Jeep, Dodge, Ram, Honda, entre otras más que te podrían interesar. Contamos con excelente asesoría por parte de nuestro personal especializado y cada uno de nuestros productos tiene calidad y garantía certificada.</p>
            </div>
        </div>
    </section>

    <section id="nuestros-servicios"  class="row">
        
        <div class="container">
            <h2>Nuestros servicios</h2>
            <div class="programas">
                <div class="carta">
                    <h3>Somos Profesionales</h3>
                    <p>Tenemos años de experiencia en nuestras compras y ventas de autos, trabajamos al máximo para brindar un excelente servicio.</p>
                    
                </div>
                <div class="carta">
                    <h3>Acerca de Nosotros</h3>
                    <p>Tenemos un enfoque en el usuario y guiado por datos, a fin de crear nuevas maneras de comprar y vender autos.</p>
                    
                </div>
                <div class="carta">
                    <h3>¿Quiénes Somos?</h3>
                    <p>Un equipo que trabaja a través de una cultura colaborativa en el proceso de busqueda, compra y venta de autos.</p>
                </div>  
            </div>
        </div>
    </section>

    <section id="somos-">
        <div class="container bg-dark text-white text-center">
            Tel+efono: +57 3003771468   |   
            Desde Medellín: (604)6175768   |   
            Correo electrónico: RentautocolombiaSAS@gmail.com
        </div>
    </section>






















@endsection


@section('content')

@endsection

