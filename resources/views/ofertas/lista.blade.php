<!-- resources/views/ofertas/todas.blade.php -->
@extends('layouts.app')


@section('content')
    <h2>Todas las Ofertas de Todas las Empresas</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Empresa</th>
                <th>Precio Oferta</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ofertas as $oferta)
                <tr>
                    <td>{{ $oferta->titulo }}</td>
                    <td>{{ $oferta->empresa->nombre_empresa ?? 'Sin empresa' }}</td>
                    <td>{{ $oferta->precio_oferta }}</td>
                    <td>{{ $oferta->estado }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection