<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('assets/css/@fortawesome/fontawesome-free/css/all.css') }}" rel="stylesheet" type="text/css">
    <!-- local CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('web/css/style.css') }}">

    <title>@yield('title')</title>
  </head>
  <style> 
      .div-img-master{
          background-color: gray;
          position: absolute;
          width: 100%;
          height: 100%;

          align-items: center;
             /*Asi se centra un texto en un div */
          justify-content: center;
      }
      
      .logo-navbar{
        width: 7%;
      }
      .div-auth-navbar{
        position: absolute;
        right: 10px;
      }

      .btn-landing{
        padding-top: 1%;
        width: 40%;
        height: 10%;
        font-size: 100%;
      }
      .div-ayuda{
        width: 70vw;
      }
      .div-ayuda a{
        text-decoration: none;
      }
     
  </style>
  <body>
    
  <div class="div-img-master">
      @yield('header-content')
  </div>
  
<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="{{asset('img/logorealcar1.svg')}}" class="logo-navbar" srcset=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse div-auth-navbar" id="navbarSupportedContent">
      
    @yield('navbar-right-content')
      
    </div>
  </div>
</nav> -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="{{asset('img/logorealcar1.svg')}}" height="24" width="30"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ">
        
        @yield('navbar-right-content')
        <div class="div-ayuda col text-light text-center">
          <a href="/ayudaenlinea" class=" text-white mt-1">
            <i class="fas fa-info"></i> Ayuda en línea
          </a>
        </div>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>