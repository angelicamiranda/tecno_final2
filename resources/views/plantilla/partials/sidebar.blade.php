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

                {{-- @if (Auth::user()->rol_id == 1) --}}
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('users.index')}}">
                            <i class="bi bi-person"></i>
                            <span>Usuarios</span>
                        </a>
                    </li>
                {{-- @endif --}}
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{route('cliente.index')}}">
                        <i class="bi bi-person"></i>
                        <span>Clientes</span>
                    </a>
                </li>

            </ul>
        </li>
        {{-- @if (Auth::user()->rol_id == 2) --}}
            <li class="nav-item collapsed">
                <a class="nav-link collapsed" data-bs-target="#components-nav1" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Ahorro</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('cuentaAhorro.index')}}">
                            <i class="bi bi-person"></i>
                            <span>Cuentas de Ahorro</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('transaccion.index')}}">
                            <i class="bi bi-person"></i>
                            <span>Transacciones</span>
                        </a>
                    </li>

                </ul>
            </li>
        {{-- @endif --}}

        <li class="nav-item collapsed">
            <a class="nav-link collapsed" data-bs-target="#components-nav2" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Crédito</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                {{-- <li class="nav-item">
                    <a class="nav-link collapsed" href="{{route('credito.index')}}">
                        <i class="bi bi-person"></i>
                        <span>Créditos</span>
                    </a>
                </li> --}}
                {{-- @if (Auth::user()->rol_id == 2) --}}
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{route('tasaInteres.index')}}">
                        <i class="bi bi-person"></i>
                        <span>Tasa de Interés</span>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link collapsed" href="{{route('cuota.index')}}">
                        <i class="bi bi-person"></i>
                        <span>Cuotas</span>
                    </a>
                </li> --}}
                {{-- @endif --}}
            </ul>
        </li>
        {{-- @if (Auth::user()->rol_id == 2) --}}
            <li class="nav-item collapsed">
                <a class="nav-link collapsed" data-bs-target="#components-nav3" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Servicios Básicos</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav3" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                    {{-- <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('servicio.index')}}">
                            <i class="bi bi-person"></i>
                            <span>Sevicios Disponibles</span>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('pagoServicio.index')}}">
                            <i class="bi bi-person"></i>
                            <span>Pagos de Servicios</span>
                        </a>
                    </li>

                </ul>
            </li>
        {{-- @endif --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{route('cliente.index')}}">
                <i class="bi bi-person"></i>
                <span>Reportes</span>
            </a>
        </li>
        {{-- <a id="dark-mode" class="nav-link collapsed">
             <i class="fa-solid fa-moon-over-sun"></i> </a> --}}

    <li class="nav-heading">
        <button style="padding: 10px 20px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        border-radius: 8px;
        color: #0a560d;
        background-color: #ffc107; " id="adulto-mode" > Adulto</button>
        <button id="joven-mode" >Joven</button>
        <button id="nino-mode" >Niño</button>
        <button id="normal-mode"  style=" color: #fffff;
        background-color: #ffc107;" ><i class="bi bi-sun"> </i> </button>
        <button id="dark-mode"><i class="bi bi-moon"> </i></button>

    </li>
    </ul>

</aside>
