<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li> 
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
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
                    Bienvenido {{\Illuminate\Support\Facades\Auth::user()->name}}</div>
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