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
                         <li><a class="dropdown-item" href="#">Ver solicitudes</a></li>
                    </ul>
                </li>

                <!-- Menú desplegable Empresas -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Empresas
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Lista de Empresas</a></li>
                        <li><a class="dropdown-item" href="#">Registrar Empresa</a></li>
                    </ul>
                </li>

                 <!--Menu para ver la informacion de los clientes -->
                <li class="nav-item"><a class="nav-link" href="#">Clientes</a></li> <!-- Aqui se verian la informacion de cada cliente -->
            </ul>

                  <!-- Menú desplegable rubros -->
                 <li class="nav-item"><a class="nav-link" href="#">Rubros</a></li>
            </ul>   <!-- Aqui se verian los rubros y las empresas que estan en cada rubro -->
                 <!-- tambien estarian las acciones para eliminar y actualizar al lado de cada rubro -->
                  <!-- Para agregar nuevos rubors deberia de haber un pequeño form arriba de la lista de rubros con sus empresas -->

                  
              

            <ul class="navbar-nav">
                <!-- Aquí puedes manejar el login/logout luego -->
                <li class="nav-item"><a class="nav-link" href="#">Cerrar sesión</a></li>
            </ul>
        </div>
    </div>
</nav>
