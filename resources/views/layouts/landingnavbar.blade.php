<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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