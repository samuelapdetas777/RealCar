<aside id="sidebar-wrapper bg-primary">
    <div class="sidebar-brand bg-dark">
        <img class="navbar-brand-full app-header-logo" src="{{ asset('img/logorealcar2.svg') }}" width="65"
             alt="Infyom Logo">
        <a href="{{ url('/') }}"></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm bg-dark">
        <a href="{{ url('/') }}" class="small-sidebar-text">
            <img class="navbar-brand-full" src="{{ asset('img/logorealcar3.svg') }}" width="45px" alt=""/>
        </a>
    </div>
    <ul class="sidebar-menu bg-dark" style="font-family: 'Roboto', sans-serif !important;">
        @include('layouts.menu')
    </ul>
</aside>
