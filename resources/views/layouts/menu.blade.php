    <li class="side-menus {{ Request::is('catalogo') ? 'active' : '' }}">
        <!-- Se agregan los elementos al sidebar -->
        <a class="nav-link" href="/catalogo">
            <i class=" fas fa-building"></i><span>Landing page usuarios</span>
        </a>
    </li>
    <!-- Se agregan los elementos al sidebar -->
    <li class="side-menus {{ Request::is('admin/home') ? 'active' : '' }}">
        <a class="nav-link" href="{{route('adminhome')}}">
            <i class=" fas fa-building"></i><span>Dashboard</span>
        </a>
    </li>

    <li class="menu-header">Usuarios</li>

    <li class="side-menus {{ Request::is('admin/usuarios') || Request::is('admin/usuarios/*') ? 'active' : '' }}">
        <a href="/admin/usuarios" class="nav-link">
            <i class=" fas fa-user"></i><span>Usuarios</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('admin/roles') || Request::is('admin/roles/*') ? 'active' : '' }}">
        <a href="/admin/roles" class="nav-link">
            <i class=" fas fa-user-tag"></i><span>Roles</span>
        </a>
    </li>
    
    

    <li class="menu-header">Vehículos</li>

    <li class="side-menus {{ Request::is('admin/vehiculos') || Request::is('admin/vehiculos/*') ? 'active' : '' }}">
        <a href="/admin/vehiculos" class="nav-link">
            <i class=" fas fa-car"></i><span>Vehículos</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('admin/vehiculossinaprobar') ? 'active' : '' }}">
        <a href="/admin/vehiculossinaprobar" class="nav-link">
            <i class=" fas fa-check-square"></i><span>Vehículos sin aprobar</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('admin/citasagendadas' ) ? 'active' : '' }}">
        <a href="/admin/citasagendadas" class="nav-link">
            <i class=" fas fa-calendar-day"></i><span>Citas agendadas</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('admin/citas') || Request::is('admin/citas/*') ? 'active' : '' }}">
        <a href="/admin/citas" class="nav-link">
            <i class=" fas fa-calendar-day"></i><span>Solicitud de citas</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('admin/pedidos') || Request::is('admin/pedidos/*') ? 'active' : '' }}">
        <a href="/admin/pedidos" class="nav-link">
            <i class=" fas fa-list-alt"></i><span>Pedidos</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('admin/ventas') || Request::is('admin/ventas/*') ? 'active' : '' }}">
        <a href="/admin/ventas" class="nav-link">
            <i class=" fas fa-list-alt"></i><span>Ventas</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('admin/compras') || Request::is('admin/compras/*') ? 'active' : '' }}">
        <a href="/admin/compras" class="nav-link">
            <i class=" fas fa-shopping-cart"></i><span>Compras</span>
        </a>
    </li>
    <li class="menu-header">Información</li>
    <li class="side-menus {{ Request::is('admin/reportes') || Request::is('admin/reportes/*') ? 'active' : '' }}">
        <a href="/admin/reportes" class="nav-link">
            <i class=" fas fa-chart-bar"></i><span>Reportes</span>
        </a>
    </li>


    <li class="menu-header">Información de apoyo</li>
    <li class="side-menus {{ Request::is('admin/ciudad') || Request::is('admin/ciudad/*') ? 'active' : '' }}">
        <a href="/admin/ciudad" class="nav-link">
            <i class=" fas fa-city"></i><span>Ciudades</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('admin/sedes') || Request::is('admin/sedes/*') ? 'active' : '' }}">
        <a href="/admin/sede" class="nav-link">
            <i class=" fas fa-map-pin"></i><span>Sedes</span>
        </a>
    </li>

    <li class="menu-header">Vehículos</li>
    <li class="side-menus {{ Request::is('admin/tipocaja') || Request::is('admin/tipocaja/*') ? 'active' : '' }}">
        <a href="/admin/tipocaja" class="nav-link">
            <i class=" fas fa-cogs"></i><span>Transmisión</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('admin/estadovehiculo') || Request::is('admin/estadovehiculo/*') ? 'active' : '' }}">
        <a href="/admin/estadovehiculo" class="nav-link">
            <i class=" fas fa-tag"></i><span>Estado vehículo</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('admin/estadoaplicativo') || Request::is('admin/estadoaplicativo/*') ? 'active' : '' }}">
        <a href="/admin/estadoaplicativo" class="nav-link">
            <i class=" fas fa-tags"></i><span>Estado aplicativo</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('admin/combustible') || Request::is('admin/combustible/*') ? 'active' : '' }}">
        <a href="/admin/combustible" class="nav-link">
            <i class=" fas fa-oil-can"></i><span>Combustible</span>
        </a>
    </li>
    <li class="side-menus {{ Request::is('admin/marca') || Request::is('admin/marca/*') ? 'active' : '' }}">
        <a href="/admin/marca" class="nav-link">
            <i class=" fas fa-tag"></i><span>Marcas</span>
        </a>
    </li>
    <li class="menu-header"><small></small></li>
    

    
