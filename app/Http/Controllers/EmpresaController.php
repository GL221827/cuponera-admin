<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Usuario;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class EmpresaController extends Controller
{
    public function mostrarFormulario()
    {
        return view('empresa.newEmp');
    }

    public function registrar(Request $request)
    {
        $request->validate([
            'codigo_empresa' => 'required|regex:/^[A-Z]{3}[0-9]{3}$/|unique:empresas,codigo_empresa',
            'nombre_empresa' => 'required',
            'direccion_empresa' => 'required',
            'nombre_contacto' => 'required',
            'telefono' => 'required',
            'correo_empresa' => 'required|email|unique:usuario,correo',
            'rubro' => 'required',
            'porcentaje_comision' => 'required|numeric|min:0|max:100'
        ]);

        // Generar contraseña aleatoria
        $password = Str::random(10);

        // Crear usuario asociado
        $usuario = Usuario::create([
            'nombre' => $request->nombre_empresa,
            'correo' => $request->correo_empresa,
            'contra' => hash('sha512', $password),
            'id_tipo_usuario' => 3 // admin empresa
        ]);

        // Registrar empresa
        Empresa::create([
            'codigo_empresa' => $request->codigo_empresa,
            'nombre_empresa' => $request->nombre_empresa,
            'direccion_empresa' => $request->direccion_empresa,
            'nombre_contacto' => $request->nombre_contacto,
            'telefono' => $request->telefono,
            'correo_empresa' => $request->correo_empresa,
            'rubro' => $request->rubro,
            'porcentaje_comision' => $request->porcentaje_comision,
            'usuario_id' => $usuario->id_Usuario


        ]);

        // Enviar contraseña al correo
        Mail::raw("Su contraseña de acceso es: $password", function($message) use ($request) {
            $message->to($request->correo_empresa)
                    ->subject('Acceso a La Cuponera');
        });

        return redirect()->route('empresas.lista')->with('success', 'Empresa registrada y contraseña enviada por correo.');
    }

    public function listar()
    {
        $empresas = Empresa::all();
        return view('empresa.listaEmp', compact('empresas'));
    }

    public function editar($id)
{
    $empresa = Empresa::findOrFail($id);
    return view('empresa.editEmp', compact('empresa'));
}

public function actualizar(Request $request, $id)
{
    $request->validate([
        'nombre_empresa' => 'required',
        'direccion_empresa' => 'required',
        'nombre_contacto' => 'required',
        'telefono' => 'required',
        'correo_empresa' => 'required|email',
        'rubro' => 'required',
        'porcentaje_comision' => 'required|numeric|min:0|max:100'
    ]);

    $empresa = Empresa::findOrFail($id);
    $empresa->update($request->all());

    return redirect()->route('empresas.lista')->with('success', 'Empresa actualizada correctamente.');
}

public function eliminar($id)
{
    $empresa = Empresa::findOrFail($id);
    $empresa->delete();

    return redirect()->route('empresas.lista')->with('success', 'Empresa eliminada.');
}
}
