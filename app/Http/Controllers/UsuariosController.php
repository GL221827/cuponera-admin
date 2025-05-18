<?php

//Este controlador manejara toda la logica del inisio de sesion, registro, etc
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class UsuariosController extends Controller
{
    public function mostrarLogin()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|email',
            'contra' => 'required',
        ]);

        $usuario = Usuario::where('correo', $request->correo)->first();

        if (!$usuario || $usuario->contra !== hash('sha512', $request->contra)) {
            return back()->withErrors(['correo' => 'Credenciales incorrectas']);
        }

        Auth::login($usuario);

        return redirect()->route('inicio');
   
    }

    public function inicio()
    {
        return view('inicio');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }


}
