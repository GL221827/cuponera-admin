<?php

//Este controlador manejara toda la logica del inisio de sesion, registro, etc
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
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

    // Mostrar formulario para cambiar contraseña (usuario autenticado)
    public function changePassword()
    {
        return view('auth.change-password');
    }

    // Actualizar contraseña (usuario autenticado)
    public function updatePassword(Request $request)
    {
        $request->validate([
        'contra_actual' => 'required',
        'nueva_contra' => 'required|min:6',
        'confirmar_contra' => 'required',
        ]);

        
         // Verificar que nueva contraseña y confirmación coincidan
    if ($request->nueva_contra !== $request->confirmar_contra) {
        return back()->withErrors(['confirmar_contra' => 'La confirmación no coincide con la nueva contraseña.']);
    }

    $user = Auth::user();

    // Comparar la contraseña actual hasheada con SHA-512
    if ($user->contra !== hash('sha512', $request->contra_actual)) {
        return back()->withErrors(['contra_actual' => 'La contraseña actual es incorrecta']);
    }

    // Guardar nueva contraseña hasheada SHA-512
    $user->contra = hash('sha512', $request->nueva_contra);
    $user->save();

    return back()->with('success', 'Contraseña actualizada correctamente');
    }

    // Mostrar formulario para solicitar recuperación de contraseña (sin autenticación)
    public function requestPassword()
    {
        return view('auth.password-reset');
    }

    // Enviar nueva contraseña aleatoria por correo
    public function sendPassword(Request $request)
    {
        $request->validate(['correo' => 'required|email']);

        $user = Usuario::where('correo', $request->correo)->first();

        if (!$user) {
            return back()->withErrors(['correo' => 'No se encontró un usuario con ese correo.']);
        }

        $newPassword = Str::random(10);

        $user->contra = hash('sha512', $newPassword);
        $user->save();

        Mail::raw("Su nueva contraseña es: $newPassword", function ($message) use ($user) {
            $message->to($user->correo)
                ->subject('Recuperación de contraseña');
        });

        return back()->with('success', 'Se ha enviado una nueva contraseña a su correo.');
    }

}
