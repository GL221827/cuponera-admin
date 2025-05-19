@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Cambiar contraseña</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('usuarios.update-password') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="contra_actual" class="form-label">Contraseña actual:</label>
            <input type="password" name="contra_actual" class="form-control" required>
             @error('contra_actual')
        <div class="text-danger">{{ $message }}</div>
    @enderror
        </div>

        <div class="mb-3">
            <label for="nueva_contra" class="form-label">Nueva contraseña:</label>
            <input type="password" name="nueva_contra" class="form-control" required>
            @error('nueva_contra')
        <div class="text-danger">{{ $message }}</div>
    @enderror
        </div>

        <div class="mb-3">
            <label for="confirmar_contra" class="form-label">Confirmar nueva contraseña:</label>
            <input type="password" name="confirmar_contra" class="form-control" required>
            @error('confirmar_contra')
        <div class="text-danger">{{ $message }}</div>
    @enderror
        </div>

        <button type="submit" class="btn btn-success">Actualizar contraseña</button>
    </form>

    <div class="mt-3">
        <a href="{{ route('inicio') }}">Volver al inicio</a>
    </div>
</div>
@endsection
