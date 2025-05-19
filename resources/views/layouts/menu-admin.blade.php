<!-- Menu en el navbar con opciones desplegables que podra ver el admin -->
 <!-- esto despues se debe de limitar segun usuarios -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">La Cuponera</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#cuponeraNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="cuponeraNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Menú desplegable Ofertas -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Ofertas
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Ver Ofertas</a></li>
                        <li><a class="dropdown-item" href="{{ route('ofertas.solicitudes') }}">Ver Solicitudes</a></li>


                    </ul>
                </li>

                <!-- Menú desplegable Empresas -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Empresas
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('empresas.lista') }}">Lista de Empresas</a></li>
                        <li><a class="dropdown-item" href="{{ route('empresas.nueva') }}">Registrar Empresa</a></li>
                    </ul>
                </li>

                <!-- Clientes -->
                <li class="nav-item">
                    <a class="nav-link" href="#">Clientes</a>
                </li>

                <!-- Rubros -->
                <li class="nav-item">
                    <a class="nav-link" href="#">Rubros</a>
                </li>
            </ul>

            
            <!-- Menú desplegable Usuario  -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Usuario
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('usuarios.change-password') }}">Cambiar Contraseña</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item">Cerrar sesión</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
