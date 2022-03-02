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
          <p>Carro en buen estado en la ciudad de medellin</p>
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

@endsection


@section('content')

@endsection

