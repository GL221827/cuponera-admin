<!-- Menu en el navbar con opciones desplegables que podra ver el admin de la empresa ofertante  -->
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
                        <li><a class="dropdown-item" href="{{ route('oferta.verOferta') }}">Ver Ofertas</a></li>
                         <li><a class="dropdown-item" href="{{ route('oferta.nueva') }}">Registrar ofertas</a></li>
                    </ul>
                </li>


                 <!-- Menú desplegable empleados -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Empleados
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Lista de empleados</a></li>
                        <li><a class="dropdown-item" href="#">Registrar empleados</a></li>
                    </ul>
                </li>

                 
                  
                <!-- Menu de ventas -->
                <li class="nav-item"><a class="nav-link" href="#">Ventas</a></li>  <!-- Aqui se verian los cupones vendidos y quien los compro -->
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

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

