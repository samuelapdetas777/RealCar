{{-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      @can('administrador')  
        <li class="nav-item {{ Request::is('/home')? 'active' : ''}}">
          <a class="nav-link" href="/admin/home">Administrador {{ Request::is('/admin/home')? '<span class="sr-only">(current)</span>': ''}}</a>
        </li>
      @endcan
      @can('cliente')
        <li class="nav-item  {{ Request::is('/catalogo')? 'active' : ''}}">
          <a class="nav-link" href="/catalogo">Home @can('administrador')(cliente) @endcan  {{ Request::is('/catalogo')? '<span class="sr-only">(current)</span>': ''}}</a>
        </li>
      @endcan
      @can('proveedor')
        <li class="nav-item {{ Request::is('/vehiculos/index/')? 'active' : ''}}">
          <a class="nav-link" href="/vehiculos/index">Home @can('administrador')(Proveedor) @endcan {{ Request::is('/vehiculos/index')? '<span class="sr-only">(current)</span>': ''}}</a>
        </li> 
      @endcan
      @can('cliente')
        <li class="nav-item {{ Request::is('/reportes/cliente')? 'active' : ''}}">
          <a class="nav-link" href="/reportes/cliente">Reportes @can('administrador')(Proveedor) @endcan {{ Request::is('/reportes/cliente')? '<span class="sr-only">(current)</span>': ''}}</a>
        </li> 
      @endcan
      @can('proveedor')
        <li class="nav-item {{ Request::is('/reportes/proveedor')? 'active' : ''}}">
          <a class="nav-link" href="/reportes/proveedor">Reportes @can('administrador')(Proveedor) @endcan {{ Request::is('/reportes/proveedor')? '<span class="sr-only">(current)</span>': ''}}</a>
        </li> 
      @endcan
      <li class="nav-item {{ Request::is('/contactanos')? 'active' : ''}}">
        <a class="nav-link" href="/contactanos">Contáctanos {{ Request::is('/contactanos')? '<span class="sr-only">(current)</span>': ''}}</a>
      </li> 
      <li class="nav-item {{ Request::is('/about')? 'active' : ''}}">
        <a class="nav-link" href="/about">Sobre nosotros {{ Request::is('/about')? '<span class="sr-only">(current)</span>': ''}}</a>
      </li> 
      
      
    </ul>
    <div class="form-inline my-2 my-lg-0">
      <ul class="navbar-nav">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('img/realcarlogo.png') }}"
                    class="rounded-circle mr-1 thumbnail-rounded user-thumbnail ">
                <div class="d-sm-none d-lg-inline-block">
                    {{\Illuminate\Support\Facades\Auth::user()->name}}</div>
            </a>

            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">
                    Bienvenido de nuevo {{\Illuminate\Support\Facades\Auth::user()->name}}</div>
                <a class="dropdown-item has-icon " href="/usuario/{{ \Auth::id() }}">
                    <i class="fa fa-user"></i>Ver perfil</a>
                <a class="dropdown-item has-icon " href="/usuario/{{ \Auth::id() }}/edit">
                    <i class="fa fa-pen"></i>Editar perfil</a>
                <a class="dropdown-item has-icon" data-toggle="modal" data-target="#changePasswordModal" href="#" data-id="{{ \Auth::id() }}"><i
                            class="fa fa-lock"> </i>Cambiar contraseña</a>
                <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger"
                  onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
--}}








{{--
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>RealCar</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="index.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Raleway">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


<link rel="stylesheet" href="index.css">
</head>
<body>
  <header >
          --}}
        
                <nav class="navbar navbar-expand-xl navbar-light" style="background-color: rgb(43, 38, 38); position: relative; z-index: 1000;">
                    <div class="container">
                        <a class="navbar-brand logo" href="/home">
                            <img src="{{ asset('img/logorealcar2.svg') }}" alt="..." height="36">
                        </a>
                        
                        <button class="navbar-toggler" type="button" style="background-color: rgb(255, 255, 255) ;" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse " id="navbarTogglerDemo02">
                            {{--<ul class="navbar-nav navbar-right ms-auto mb-2 mb-lg-0">
                              
                                <li class="nav-item">
                                    <a class="nav-link" style="color: white;" aria-current="page" href="#">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color: white;"  href="#">Catalogos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color: white;" href="#">Vender</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="color: white;" href="#">Contactenos</a>
                                </li>
                             
                            </ul>--}}




                            <ul class="navbar-nav mr-auto">
                              @can('administrador')  
                                <li class="nav-item {{ Request::is('/home')? 'active' : ''}}">
                                  <a class="nav-link text-white" href="/admin/home">Administrador {{ Request::is('/admin/home')? '<span class="sr-only">(current)</span>': ''}}</a>
                                </li>
                              @endcan
                              @can('cliente')
                                <li class="nav-item  {{ Request::is('/catalogo')? 'active' : ''}}">
                                  <a class="nav-link text-white" href="/catalogo">Home @can('administrador')(cliente) @endcan  {{ Request::is('/catalogo')? '<span class="sr-only">(current)</span>': ''}}</a>
                                </li>
                              @endcan
                              @can('proveedor')
                                <li class="nav-item {{ Request::is('/vehiculos/index/')? 'active' : ''}}">
                                  <a class="nav-link text-white" href="/vehiculos/index">Home @can('administrador')(Proveedor) @endcan {{ Request::is('/vehiculos/index')? '<span class="sr-only">(current)</span>': ''}}</a>
                                </li> 
                              @endcan
                              @can('cliente')
                                <li class="nav-item {{ Request::is('/reportes/cliente')? 'active' : ''}}">
                                  <a class="nav-link text-white" href="/reportes/cliente">Reportes @can('administrador')(Proveedor) @endcan {{ Request::is('/reportes/cliente')? '<span class="sr-only">(current)</span>': ''}}</a>
                                </li> 
                              @endcan
                              @can('proveedor')
                                <li class="nav-item {{ Request::is('/reportes/proveedor')? 'active' : ''}}">
                                  <a class="nav-link text-white" href="/reportes/proveedor">Reportes @can('administrador')(Proveedor) @endcan {{ Request::is('/reportes/proveedor')? '<span class="sr-only">(current)</span>': ''}}</a>
                                </li> 
                              @endcan
                              <li class="nav-item {{ Request::is('/contactanos')? 'active' : ''}}">
                                <a class="nav-link text-white" href="/contactanos">Contáctanos {{ Request::is('/contactanos')? '<span class="sr-only">(current)</span>': ''}}</a>
                              </li> 
                              <li class="nav-item {{ Request::is('/about')? 'active' : ''}}">
                                <a class="nav-link text-white" href="/about">Sobre nosotros {{ Request::is('/about')? '<span class="sr-only">(current)</span>': ''}}</a>
                              </li> 
                              
                              
                            </ul>




                            <div class="form-inline my-2 my-lg-0">
                              <ul class="navbar-nav">
                                <li class="dropdown">
                                    <a href="#" data-toggle="dropdown"
                                      class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                        <img alt="image" src="{{ asset('img/realcarlogo.png') }}"
                                            class="rounded-circle mr-1 thumbnail-rounded user-thumbnail ">
                                        <div class="d-sm-none d-lg-inline-block">
                                            {{\Illuminate\Support\Facades\Auth::user()->name}}</div>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="dropdown-title">
                                            Bienvenido de nuevo {{\Illuminate\Support\Facades\Auth::user()->name}}</div>
                                        <a class="dropdown-item has-icon " href="/usuario/{{ \Auth::id() }}">
                                            <i class="fa fa-user"></i>Ver perfil</a>
                                        <a class="dropdown-item has-icon " href="/usuario/{{ \Auth::id() }}/edit">
                                            <i class="fa fa-pen"></i>Editar perfil</a>
                                        <a class="dropdown-item has-icon" data-toggle="modal" data-target="#changePasswordModal" href="#" data-id="{{ \Auth::id() }}"><i
                                                    class="fa fa-lock"> </i>Cambiar contraseña</a>
                                        <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger"
                                          onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                                        </a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </li>
                              </ul>
                            </div>

                        </div>
                    </div>
                </nav>
                
                
              </header>
              {{--

    <section id="hero">
        <h1>Encuentra el vehiculo de tu sueños con nosotros.</h1>
        <button>BUSCAR VEHICULO +</button>
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

    <section id="nuestros-servicios">
        
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

    <section id="caracteristicas">
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
</body>
</html>--}}