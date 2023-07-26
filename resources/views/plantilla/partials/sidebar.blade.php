<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{route('home')}}">
                <i class="bi bi-grid"></i>
                <span>Home</span>
            </a>
        </li>
        <li class="nav-heading">Páginas</li>


        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Personas</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{route('users.index')}}">
                        <i class="bi bi-person"></i>
                        <span>Usuarios</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{route('cliente.index')}}">
                        <i class="bi bi-person"></i>
                        <span>Clientes</span>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item collapsed">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Ahorro</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{route('cliente.index')}}">
                        <i class="bi bi-person"></i>
                        <span>Cuentas de Ahorro</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{route('cliente.index')}}">
                        <i class="bi bi-person"></i>
                        <span>Transacciones</span>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item collapsed">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Crédito</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{route('cliente.index')}}">
                        <i class="bi bi-person"></i>
                        <span>Créditos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{route('cliente.index')}}">
                        <i class="bi bi-person"></i>
                        <span>Tasa de Interés</span>
                    </a>
                </li>

            </ul>
        </li>

        <li class="nav-item collapsed">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Servicios Básicos</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{route('cliente.index')}}">
                        <i class="bi bi-person"></i>
                        <span>Sevicios Disponibles</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{route('cliente.index')}}">
                        <i class="bi bi-person"></i>
                        <span>Pagos de Servicios</span>
                    </a>
                </li>

            </ul>
        </li>




        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('cliente.index')}}">
                <i class="bi bi-person"></i>
                <span>Reportes</span>
            </a>
        </li>
        {{-- <a id="dark-mode" class="nav-link collapsed">
             <i class="fa-solid fa-moon-over-sun"></i> </a> --}}

    <li class="nav-heading">
        <button id="adulto-mode" > Adulto</button>
        <button id="joven-mode" >Joven</button>
        <button id="nino-mode" >Niño</button>
        <button id="normal-mode" >Normal</button>
        <button id="dark-mode" ><i class="bi bi-moon"> </i></button>

    </li>
    </ul>

</aside>
