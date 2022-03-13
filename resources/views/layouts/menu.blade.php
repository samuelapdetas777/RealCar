    <li class="side-menus {{ Request::is('home') ? 'active' : '' }}">
        <!-- Se agregan los elementos al sidebar -->
        <a class="nav-link" href="{{route('home')}}">
            <i class=" fas fa-building"></i><span>Dashboard</span>
        </a>
    </li>

    <li class="menu-header">Usuarios</li>

    <li class="side-menus {{ Request::is('') ? 'active' : '' }}">
        <a href="" class="nav-link">
            <i class=" fas fa-user"></i><span>Usuarios</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('') ? 'active' : '' }}">
        <a href="" class="nav-link">
            <i class=" fas fa-user-tag"></i><span>Roles</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('') ? 'active' : '' }}">
        <a href="" class="nav-link">
            <i class=" fas fa-clipboard-list"></i><span>Permisos</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('') ? 'active' : '' }}">
        <a href="/login" class="nav-link">
            <i class=" fas fa-envelope"></i><span>Notificaciones</span>
        </a>
    </li>

    <li class="menu-header">Vehículos</li>

    <li class="side-menus {{ Request::is('') ? 'active' : '' }}">
        <a href="" class="nav-link">
            <i class=" fas fa-car"></i><span>Vehículos</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('') ? 'active' : '' }}">
        <a href="" class="nav-link">
            <i class=" fas fa-check-square"></i><span>Vehículos sin aprobar</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('') ? 'active' : '' }}">
        <a href="" class="nav-link">
            <i class=" fas fa-calendar-day"></i><span>Citas</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('') ? 'active' : '' }}">
        <a href="" class="nav-link">
            <i class=" fas fa-list-alt"></i><span>Pedidos</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('') ? 'active' : '' }}">
        <a href="" class="nav-link">
            <i class=" fas fa-shopping-cart"></i><span>Compras</span>
        </a>
    </li>
    <li class="menu-header">Información</li>
    <li class="side-menus {{ Request::is('') ? 'active' : '' }}">
        <a href="" class="nav-link">
            <i class=" fas fa-chart-bar"></i><span>Reportes</span>
        </a>
    </li>


    <li class="menu-header">Información de apoyo</li>
    <li class="side-menus {{ Request::is('ciudad') ? 'active' : '' }}">
        <a href="/ciudad" class="nav-link">
            <i class=" fas fa-city"></i><span>Ciudades</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('sedes') ? 'active' : '' }}">
        <a href="/sede" class="nav-link">
            <i class=" fas fa-map-pin"></i><span>Sedes</span>
        </a>
    </li>

    <li class="menu-header">Vehículos</li>
    <li class="side-menus {{ Request::is('tipocaja') ? 'active' : '' }}">
        <a href="/tipocaja" class="nav-link">
            <i class=" fas fa-cogs"></i><span>Transmisión</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('estadovehiculo') ? 'active' : '' }}">
        <a href="/estadovehiculo" class="nav-link">
            <i class=" fas fa-tag"></i><span>Estado vehículo</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('estadoaplicativo') ? 'active' : '' }}">
        <a href="/estadoaplicativo" class="nav-link">
            <i class=" fas fa-tags"></i><span>Estado aplicativo</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('combustible') ? 'active' : '' }}">
        <a href="/combustible" class="nav-link">
            <i class=" fas fa-oil-can"></i><span>Combustible</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('marca') ? 'active' : '' }}">
        <a href="/marca" class="nav-link">
            <i class=" fas fa-tag"></i><span>Marcas</span>
        </a>
    </li>
    <li class="menu-header"><small></small></li>
    

    
