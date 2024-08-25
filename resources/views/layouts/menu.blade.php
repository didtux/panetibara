<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('principal') }}">
        <i class="fas fa-building"></i><span>Inicio</span>
    </a>
  
    @auth
  
    <a class="nav-link" href="/usuarios">
        <i class=" fas fa-users"></i><span>Usuarios</span>
    </a>

    
    

    <a class="nav-link" href="/roles">
        <i class="fas fa-users"></i><span>Roles</span>
    </a>


    <a class="nav-link" href="/inicio">
        <i class="fas fa-box"></i><span>Reservas</span>
    </a>
   
        <a class="nav-link" href="{{ route('productos.index') }}">
            <i class="fas fa-box"></i><span>Productos</span>
        </a>
        <a class="nav-link" href="{{ route('paquetes.index') }}">
            <i class="fas fa-box"></i><span>Paquetes</span>
        </a>
    @endauth
</li>
