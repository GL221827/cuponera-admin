<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Oferta;
use App\Models\Empresa;

class OfertasController extends Controller
{
    // Mostrar todas las ofertas pendientes para su aprobación
    public function verSolicitudes()
    {
       $ofertasPendientes = Oferta::with('empresa')
    ->where('estado', 'En espera de aprobación')
    ->get();

    return view('ofertas.solicitudes', compact('ofertasPendientes'));
    }

    // Aprobar una oferta
    public function aprobar($id)
    {
        $oferta = Oferta::findOrFail($id);
      
        $oferta->estado = 'Oferta aprobada';
        $oferta->justificacion_rechazo = null;
        $oferta->save();

        return redirect()->route('ofertas.solicitudes')->with('success', 'Oferta aprobada correctamente.');
    }

    // Rechazar una oferta
    public function rechazar(Request $request, $id)
    {
        $request->validate([
            'justificacion' => 'required|string'
        ]);

        $oferta = Oferta::findOrFail($id);
        $oferta->estado = 'Oferta rechazada';
        $oferta->justificacion_rechazo = $request->justificacion;
        $oferta->save();

         return redirect()->route('ofertas.solicitudes')->with('error', 'Oferta rechazada con justificación.');
    }

     // Descartar oferta
    public function descartar($id)
    {
        $oferta = Oferta::findOrFail($id);
        $oferta->estado = 'Oferta descartada';
        $oferta->save();

        return redirect()->back()->with('success', 'Oferta descartada.');
    }
}
