<!-- filepath: resources/views/ofertas/listaofertas.blade.php -->
@extends('layouts.app')

@section('content')
    <h2>Cupones de {{ $empresa->nombre_empresa }}</h2>

    @if($ofertas->isEmpty())
        <div class="alert alert-info">No hay cupones registrados para esta empresa.</div>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Precio Regular</th>
                    <th>Precio Oferta</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Estado</th>
                    <th>Vendidos</th>
                    <th>Disponibles</th>
                    <th>Ingresos Totales</th>
                    <th>Cargo por Servicio</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ofertas as $oferta)
                @php
                    $vendidos = $oferta->compras->sum('cantidad');
                    $disponibles = ($oferta->cantidad_limite ?? 0) - $vendidos;
                    $ingresos = $vendidos * ($oferta->precio_oferta ?? 0);
                    $cargo = $ingresos * (($empresa->porcentaje_comision ?? 0) / 100);
                @endphp
                <tr>
                    <td>{{ $oferta->titulo }}</td>
                    <td>${{ number_format($oferta->precio_regular, 2) }}</td>
                    <td>${{ number_format($oferta->precio_oferta, 2) }}</td>
                    <td>{{ $oferta->fecha_inicio }}</td>
                    <td>{{ $oferta->fecha_fin }}</td>
                    <td>{{ $oferta->estado }}</td>
                    <td>{{ $vendidos }}</td>
                    <td>{{ $disponibles }}</td>
                    <td>${{ number_format($ingresos, 2) }}</td>
                    <td>${{ number_format($cargo, 2) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection