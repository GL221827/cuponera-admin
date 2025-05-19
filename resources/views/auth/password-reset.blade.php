@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Recuperar contraseña</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('usuarios.password-email') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="correo" class="form-label">Correo electrónico:</label>
            <input type="email" name="correo" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Enviar nueva contraseña</button>
    </form>

    <div class="mt-3">
        <a href="{{ route('login') }}">Volver al login</a>
    </div>
</div>
@endsection
