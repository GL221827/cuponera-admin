 <!-- Formulario para ver las solicitudes de ofertas -->

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Solicitudes de Ofertas</h2>

    @if($ofertasPendientes->isEmpty())
        <div class="alert alert-info">
            No hay ofertas pendientes de aprobación.
        </div>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Empresa</th>
                    <th>Precio Regular</th>
                    <th>Precio Oferta</th>
                     <th>Descripción</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ofertasPendientes as $oferta)
                    <tr>
                        <td>{{ $oferta->titulo }}</td>
                        <td>{{ $oferta->empresa->nombre_empresa ?? 'Empresa no encontrada' }}</td>  <!-- para que salga el nombre de la empresa en lugar del id -->
                        <td>${{ number_format($oferta->precio_regular, 2) }}</td>
                        <td>${{ number_format($oferta->precio_oferta, 2) }}</td>
                        <td>{{ $oferta->descripcion }}</td>
                        <td>{{ $oferta->estado }}</td>
                        <td>
                            <!-- Formulario para aprobar -->
                            <form action="{{ route('oferta.aprobar', $oferta->id_Ofertas) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Aprobar</button>
                            </form>
                            <br>

                            <!-- Botón para rechazar (muestra modal con formulario de justificación) -->
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalRechazo{{ $oferta->id_Ofertas }}">
                                Rechazar
                            </button>

                            <!-- Modal de justificación -->
                            <div class="modal fade" id="modalRechazo{{ $oferta->id_Ofertas }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <form action="{{ route('oferta.rechazar', $oferta->id_Ofertas) }}" method="POST">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Justificación de Rechazo</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <textarea name="justificacion" class="form-control" rows="4" required></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger">Rechazar Oferta</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
