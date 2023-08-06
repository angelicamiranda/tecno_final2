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

                 @if (Auth::user()->rol_id == 1)
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('users.index')}}">
                            <i class="bi bi-person"></i>
                            <span>Usuarios</span>
                        </a>
                    </li>
               @endif
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{route('cliente.index')}}">
                        <i class="bi bi-person"></i>
                        <span>Clientes</span>
                    </a>
                </li>

            </ul>
        </li>
         @if (Auth::user()->rol_id == 2)
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
        @endif

        <li class="nav-item collapsed">
            <a class="nav-link collapsed" data-bs-target="#components-nav2" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Crédito</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{route('credito.index')}}">
                        <i class="bi bi-person"></i>
                        <span>Créditos</span>
                    </a>
                </li>
            @if(Auth::user()->rol_id == 2)
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{route('tasaInteres.index')}}">
                        <i class="bi bi-person"></i>
                        <span>Tasa de Interés</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="{{route('cuota.index')}}">
                        <i class="bi bi-person"></i>
                        <span>Cuotas</span>
                    </a>
                </li>
                 @endif
            </ul>
        </li>
         @if (Auth::user()->rol_id == 2)
            <li class="nav-item collapsed">
                <a class="nav-link collapsed" data-bs-target="#components-nav3" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Servicios Básicos</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav3" class="nav-content collapse " data-bs-parent="#sidebar-nav">
{{--  
                     <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('servicio.index')}}">
                            <i class="bi bi-person"></i>
                            <span>Sevicios Disponibles</span>
                        </a>
                    </li>  --}}
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="{{route('pagoServicio.index')}}">
                            <i class="bi bi-person"></i>
                            <span>Pagos de Servicios</span>
                        </a>
                    </li>

                </ul>
            </li>
       @endif


        {{-- <a id="dark-mode" class="nav-link collapsed">
             <i class="fa-solid fa-moon-over-sun"></i> </a> --}}


             <li class="nav-heading">MODOS Y TEMAS</li>

             <li class="nav-item collapsed">
                <a class="nav-link collapsed" data-bs-target="#components-nav3" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-menu-button-wide"></i><span>Temas </span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="components-nav3" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                    <li class="nav-item">
                        <button class="nav-link collapsed" id="adulto-mode" > Adulto</button>

                    </li>

                    <li class="nav-item">
                            <button class="nav-link collapsed" id="joven-mode" >Joven</button>
                    </li>
                    <li class="nav-item">
                        <button class="nav-link collapsed" id="nino-mode" >Niño</button>
                     </li>
                </ul>
            </li>


    <li class="nav-heading">



        <button id="normal-mode"  style=" background-color: #e7d615;
        color: #fff;  border-color: #e8d615;" class="btn btn-primary mr-3" ><i class="bi bi-sun"> </i> </button>
        <button id="dark-mode" style="background-color: #343a40;
        color: #fff;" class="btn btn-dark" ><i class="bi bi-moon"> </i></button>

    </li>
    </ul>

</aside>
