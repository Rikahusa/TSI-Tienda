<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class AuthController extends Controller
{
    // Procesar el login
    public function login(Request $request)
    {
        $request->validate([
            'Rut'      => 'required|string|max:10',
            'password' => 'required|string'
        ]);

        // Buscar usuario por rut_usuario
        $usuario = Usuario::where('rut_usuario', $request->Rut)->first();

        // Verificar si existe y la contraseña coincide
        if ($usuario && Hash::check($request->password, $usuario->pass_usuario)) {

            // Convertir el tipo (char) a una etiqueta legible para la vista
            $humanRole = match ($usuario->tipo_usuario) {
                'A' => 'Admin',
                'E' => 'Empleado',
                default => 'Usuario',
            };

            //  Guardar datos en sesión
            session([
                'usuario' => [
                    'rut_usuario'    => $usuario->rut_usuario,
                    'nombre_usuario' => $usuario->nombre_usuario,
                    'tipo_usuario'   => $usuario->tipo_usuario, // 'A','E','U'
                    'rol'            => $humanRole,             // 'Admin','Empleado','Usuario'
                ]
            ]);

            // 🔹 Ir directo a inicio (ya no a '/')
            return redirect()->route('inicio.index');
        }

        return back()->withErrors([
            'login' => 'RUT o contraseña incorrectos.',
        ])->withInput();
    }

    // Cerrar sesión
    public function logout()
    {
        session()->forget('usuario');
        return redirect('/login');
    }
}
