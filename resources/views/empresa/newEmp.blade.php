<!-- formulario de registro de empresas-->
<!DOCTYPE html>
<html>
<head>
    <title>Login - La Cuponera</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @extends('layouts.app')

@section('content')
    <h2>Registrar Nueva Empresa</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('empresas.registrar') }}" method="POST">
        @csrf
        <div class="mb-3"><label class="form-label">Código:</label><input type="text" name="codigo_empresa" class="form-control" required></div>
        <div class="mb-3"><label class="form-label">Nombre:</label><input type="text" name="nombre_empresa" class="form-control" required></div>
        <div class="mb-3"><label class="form-label">Dirección:</label><input type="text" name="direccion_empresa" class="form-control" required></div>
        <div class="mb-3"><label class="form-label">Contacto:</label><input type="text" name="nombre_contacto" class="form-control" required></div>
        <div class="mb-3"><label class="form-label">Teléfono:</label><input type="text" name="telefono" class="form-control" required></div>
        <div class="mb-3"><label class="form-label">Correo:</label><input type="email" name="correo_empresa" class="form-control" required></div>
        <div class="mb-3"><label class="form-label">Rubro:</label><input type="text" name="rubro" class="form-control" required></div>
        <div class="mb-3"><label class="form-label">Porcentaje Comisión:</label><input type="number" name="porcentaje_comision" step="0.01" class="form-control" required></div>
        <button type="submit" class="btn btn-success">Registrar Empresa</button>
    </form>
@endsection



</body>
</html>