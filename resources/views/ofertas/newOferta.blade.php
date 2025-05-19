@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Nueva Oferta</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

    <form method="POST" action="{{ route('oferta.guardar') }}">
        @csrf

        <div class="mb-3">
            <label for="titulo" class="form-label">Título de la Oferta</label>
            <input type="text" class="form-control" name="titulo" required>
        </div>

        <div class="mb-3">
            <label for="precio_regular" class="form-label">Precio Regular</label>
            <input type="number" step="0.01" class="form-control" name="precio_regular" required>
        </div>

        <div class="mb-3">
            <label for="precio_oferta" class="form-label">Precio de Oferta</label>
            <input type="number" step="0.01" class="form-control" name="precio_oferta" required>
        </div>

        <div class="mb-3">
            <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
            <input type="date" class="form-control" name="fecha_inicio" required>
        </div>

        <div class="mb-3">
            <label for="fecha_fin" class="form-label">Fecha de Fin</label>
            <input type="date" class="form-control" name="fecha_fin" required>
        </div>

        <div class="mb-3">
            <label for="fecha_limite_uso" class="form-label">Fecha Límite de Uso</label>
            <input type="date" class="form-control" name="fecha_limite_uso" required>
        </div>

        <div class="mb-3">
            <label for="cantidad_limite" class="form-label">Cantidad Límite de Cupones (opcional)</label>
            <input type="number" class="form-control" name="cantidad_limite">
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" name="descripcion" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="detalles" class="form-label">Otros Detalles</label>
            <textarea class="form-control" name="detalles" rows="2"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Enviar Oferta</button>
    </form>
</div>
@endsection
