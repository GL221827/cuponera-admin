<!-- Vista de bienvenida para el panel administrativo de La Cuponera -->

@extends('layouts.app') <!-- Muestra el menú según el tipo de usuario -->

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="text-center">
        <h1 class="display-5 mb-3">🎉 Bienvenido a <strong>La Cuponera</strong></h1>
        <p class="lead text-muted">Panel administrativo</p>
        <hr class="my-4">
        <p>Desde aquí puedes gestionar como administrador.</p>
    </div>
</div>
@endsection
