<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Oferta;
use App\Models\Empresa;
use App\Models\Usuario;


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

    public function nuevaOferta()
{
    return view('ofertas.newOferta');
}

    public function guardarOferta(Request $request)
    {
        $request->validate([
        'titulo' => 'required|string|max:255',
        'precio_regular' => 'required|numeric|min:0',
        'precio_oferta' => 'required|numeric|min:0',
        'fecha_inicio' => 'required|date',
        'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        'fecha_limite_uso' => 'required|date|after_or_equal:fecha_inicio',
        'descripcion' => 'required|string',
        'detalles' => 'nullable|string',
        'cantidad_limite' => 'nullable|integer|min:1'
        ]);

    // Obtener usuario autenticado
        $user = Auth::user();

    // Buscar empresa que tiene usuario_id igual al id_usuario del usuario autenticado
        $empresa = $user->empresa;// Esto funciona si definiste la relación en Usuario.php


        if (!$empresa) {
            return back()->with('error', 'Este usuario no tiene una empresa asociada.');
        }

        
        $oferta = new Oferta();

        $oferta->empresa_id = $empresa->id_Empresa;
        $oferta->titulo = $request->titulo;
        $oferta->precio_regular = $request->precio_regular;
        $oferta->precio_oferta = $request->precio_oferta;
        $oferta->fecha_inicio = $request->fecha_inicio;
        $oferta->fecha_fin = $request->fecha_fin;
        $oferta->fecha_limite_uso = $request->fecha_limite_uso;
        $oferta->cantidad_limite = $request->cantidad_limite;
        $oferta->descripcion = $request->descripcion;
        $oferta->detalles = $request->detalles;
        $oferta->estado = 'En espera de aprobación';
        $oferta->save();

        return redirect()->route('oferta.nueva')->with('success', 'Oferta enviada para aprobación.');

    }  
    
    public function ListarOfertas()
    {
        $ofertas = Oferta::with('empresa')->get();
        return view('ofertas.lista', compact('ofertas'));
    }
    
    public function verOfertas()
    {
        $user = Auth::user();
        if (!$user) {
            return back()->with('error', 'Usuario no autenticado.');
        }

        $empresa = $user->empresa;
        if (!$empresa) {
            return back()->with('error', 'Este usuario no tiene una empresa asociada.');
        }

        // Solo las ofertas de la empresa del usuario autenticado
        $ofertas = Oferta::with('empresa')
            ->where('empresa_id', $empresa->id_Empresa)
            ->get();

        return view('ofertas.listaofertas', compact('ofertas', 'empresa'));
    }
}
