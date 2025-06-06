<!-- formulario de login-->
<!DOCTYPE html>
<html>
<head>
    <title>Login - La Cuponera</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   



{{-- filepath: c:\xampp\htdocs\cuponera-admin\resources\views\auth\login.blade.php --}}
@extends('layouts.app')

@section('content')
    <h2>Iniciar Sesión</h2>
    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <div class="mb-3">
            <label for="correo" class="form-label">Correo:</label>
            <input type="email" name="correo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="contra" class="form-label">Contraseña:</label>
            <input type="password" name="contra" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Ingresar</button>
        <div class="mt-3">
            <a href="{{ route('usuarios.password-request') }}">¿Olvidaste tu contraseña?</a>
        </div>
    </form>
@endsection


</body>
</html>
