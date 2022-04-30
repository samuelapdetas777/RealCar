    <li class="side-menus {{ Request::is('home') ? 'active' : '' }}">
        <!-- Se agregan los elementos al sidebar -->
        <a class="nav-link" href="/home">
            <i class=" fas fa-building"></i><span>Landing page usuarios</span>
        </a>
    </li>
    <!-- Se agregan los elementos al sidebar -->
    <li class="side-menus {{ Request::is('home') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('adminhome')}}">
            <i class=" fas fa-building"></i><span>Dashboard</span>
        </a>
    </li>

    <li class="menu-header">Usuarios</li>

    <li class="side-menus {{ Request::is('usuarios') ? 'active' : '' }}">
        <a href="/admin/usuarios" class="nav-link">
            <i class=" fas fa-user"></i><span>Usuarios</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('roles') ? 'active' : '' }}">
        <a href="/admin/roles" class="nav-link">
            <i class=" fas fa-user-tag"></i><span>Roles</span>
        </a>
    </li>
    
    <li class="side-menus {{ Request::is('') ? 'active' : '' }}">
        <a href="/admin/login" class="nav-link">
            <i class=" fas fa-envelope"></i><span>Notificaciones</span>
        </a>
    </li>

    <li class="menu-header">Vehículos</li>

    <li class="side-menus {{ Request::is('') ? 'active' : '' }}">
        <a href="/admin/vehiculos" class="nav-link">
            <i class=" fas fa-car"></i><span>Vehículos</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('/admin/vehiculossinaprobar') ? 'active' : '' }}">
        <a href="/admin/vehiculossinaprobar" class="nav-link">
            <i class=" fas fa-check-square"></i><span>Vehículos sin aprobar</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('admin/citas/agendadas') ? 'active' : '' }}">
        <a href="/admin/citas" class="nav-link">
            <i class=" fas fa-calendar-day"></i><span>Citas agendadas</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('admin/citas') ? 'active' : '' }}">
        <a href="/admin/citas" class="nav-link">
            <i class=" fas fa-calendar-day"></i><span>Solicitud de citas</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('') ? 'active' : '' }}">
        <a href="/admin/pedidos" class="nav-link">
            <i class=" fas fa-list-alt"></i><span>Pedidos</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('') ? 'active' : '' }}">
        <a href="/admin/compras" class="nav-link">
            <i class=" fas fa-shopping-cart"></i><span>Compras</span>
        </a>
    </li>
    <li class="menu-header">Información</li>
    <li class="side-menus {{ Request::is('') ? 'active' : '' }}">
        <a href="/admin/reportes" class="nav-link">
            <i class=" fas fa-chart-bar"></i><span>Reportes</span>
        </a>
    </li>


    <li class="menu-header">Información de apoyo</li>
    <li class="side-menus {{ Request::is('ciudad') ? 'active' : '' }}">
        <a href="/admin/ciudad" class="nav-link">
            <i class=" fas fa-city"></i><span>Ciudades</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('sedes') ? 'active' : '' }}">
        <a href="/admin/sede" class="nav-link">
            <i class=" fas fa-map-pin"></i><span>Sedes</span>
        </a>
    </li>

    <li class="menu-header">Vehículos</li>
    <li class="side-menus {{ Request::is('tipocaja') ? 'active' : '' }}">
        <a href="/admin/tipocaja" class="nav-link">
            <i class=" fas fa-cogs"></i><span>Transmisión</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('estadovehiculo') ? 'active' : '' }}">
        <a href="/admin/estadovehiculo" class="nav-link">
            <i class=" fas fa-tag"></i><span>Estado vehículo</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('estadoaplicativo') ? 'active' : '' }}">
        <a href="/admin/estadoaplicativo" class="nav-link">
            <i class=" fas fa-tags"></i><span>Estado aplicativo</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('combustible') ? 'active' : '' }}">
        <a href="/admin/combustible" class="nav-link">
            <i class=" fas fa-oil-can"></i><span>Combustible</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('marca') ? 'active' : '' }}">
        <a href="/admin/marca" class="nav-link">
            <i class=" fas fa-tag"></i><span>Marcas</span>
        </a>
    </li>
    <li class="menu-header"><small></small></li>
    

    
