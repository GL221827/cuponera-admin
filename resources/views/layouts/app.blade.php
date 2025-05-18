<!-- Diseños para toda la interfaz -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>La Cuponera</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- verifica que tipo de usuario es, para asi mostrar el menu de cada usuario -->
  @if(Auth::check())
    @php
        $tipo = Auth::user()->id_tipo_usuario;
    @endphp

    @if($tipo === 1) <!-- verifica si es tipo 1 o sea admin-->
        @include('layouts.menu-admin')
    @elseif($tipo === 3) <!-- verifica si es tipo 3, o sea admin de empresa -->
        @include('layouts.menu-emp')
    @endif
@endif


    
    <div class="container mt-4">
        @yield('content') <!-- Contenido principal, aqui iria una pagina de bienvenida o algo asi -->
    </div>

    <!-- Bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
