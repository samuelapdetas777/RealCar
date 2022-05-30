@extends('layouts.master')

@section('title')
Bienvenido a RealCar
@endsection

@section('navbar-right-content')
<div class="nav-item">
  <a href="{{route('login')}}" class="btn btn-primary">Iniciar Sesión</a>
</div>
<div class="nav-item">
  <a href="{{route('userregister')}}" class="btn btn-outline-primary">Registrarse</a>
</div>
@endsection

@section('header-content')
{{--
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <a href="{{route('home')}}">
        <img src="{{asset('img/img-landing/chevrolet-onix.jpg')}}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h3>Chevrolet Onix</h3>
          <h5>$40'900.000</h5>
          <p>Carro en buen estado en la ciudad de Medellín</p>
        </div>
      </a>
    </div>


    <div class="carousel-item">
    <a href="{{route('home')}}">
      <img src="{{asset('img/img-landing/mazda.jpg')}}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h3>Toyota Hilux</h3>
        <h5>$175'000.000</h5>
        <p>Con defensa delantera reforzada y sin luces de niebla</p>
      </div>
    </a>
    </div>
   

    <div class="carousel-item">
    <a href="{{route('home')}}">
      <img src="{{asset('img/img-landing/toyota-hilux.jpg')}}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h3>Toyota Hilux</h3>
        <h5>$175'000.000</h5>
        <p>Con defensa delantera reforzada y sin luces de niebla</p>
      </div>
    </a>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
--}}









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
                <p>Somos un concesionario de vehículos con varias sedes ubicadas en Colombia.
                    Nos especializamos en la compra y venta de vehículos de marcas muy reconocidas como Volkswagen, Ford, Renault, Hyundai, Mazda, Audi, Peugeot, Jeep, Dodge, Ram, Honda, entre otras más que te podrían interesar. Contamos con excelente asesoría por parte de nuestro personal especializado y cada uno de nuestros productos tiene calidad y garantía certificada.</p>
            </div>
        </div>
    </section>

    <section id="nuestros-servicios"  class="row">
        
        <div class="container">
            <h2>Nuestros servicios</h2>
            <div class="programas">
                <div class="carta">
                    <h3>Programador Front-end</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt vero corporis incidunt saepe qui commodi quasi neque veniam quam, aspernatur est beatae maxime animi sed reiciendis mollitia ducimus veritatis repellendus?</p>
                    <button>+ Info</button>
                </div>
                <div class="carta">
                    <h3>Programador Full-Stack</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt vero corporis incidunt saepe qui commodi quasi neque veniam quam, aspernatur est beatae maxime animi sed reiciendis mollitia ducimus veritatis repellendus?</p>
                    <button>+ Info</button>
                </div>
                <div class="carta">
                    <h3>Programador Python</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt vero corporis incidunt saepe qui commodi quasi neque veniam quam, aspernatur est beatae maxime animi sed reiciendis mollitia ducimus veritatis repellendus?</p>
                    <button>+ Info</button>
                </div>  
            </div>
        </div>
    </section>

    <section id="caracteristicas"  class="row">
        <div class="container">
            <ul>
                <li>✔️ 100% online</li>
                <li>✔️ Flexibilidad de horarios</li>
                <li>✔️ Soporte 1:1</li>
                <li>✔️ Asistencia financiera</li>
            </ul>
        </div>
    </section>

   

    <footer>
        <div class="container">
            <p>&copy; ProgramaYa 2021</p>
        </div>
    </footer>





















@endsection


@section('content')

@endsection

