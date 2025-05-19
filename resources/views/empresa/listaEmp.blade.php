<!-- listas de empresas-->
<!DOCTYPE html>
<html>
<head>
    <title>Login - La Cuponera</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @extends('layouts.app')

@section('content')
    <h2>Lista de Empresas</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Contacto</th>
                <th>Teléfono</th>
                <th>Correo</th>
                <th>Rubro</th>
                <th>Comisión (%)</th>
            </tr>
        </thead>
       <tbody>
    @foreach($empresas as $emp)
        <tr>
            <td>{{ $emp->codigo_empresa }}</td>
            <td>{{ $emp->nombre_empresa }}</td>
            <td>{{ $emp->nombre_contacto }}</td>
            <td>{{ $emp->telefono }}</td>
            <td>{{ $emp->correo_empresa }}</td>
            <td>{{ $emp->rubro }}</td>
            <td>{{ $emp->porcentaje_comision }}</td>
            <td>
                <a href="{{ route('empresas.editar', $emp->id_Empresa) }}" class="btn btn-sm btn-primary">Editar</a>
                <form action="{{ route('empresas.eliminar', $emp->id_Empresa) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta empresa?')">Eliminar</button>
                </form>
            </td>
        </tr>
    @endforeach
</tbody>

    </table>
@endsection

</body>
</html>