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

        // Buscar usuario por rut_usuario (minúscula)
        $usuario = Usuario::where('rut_usuario', $request->Rut)->first();

        // Verificar si existe y la contraseña coincide
        if ($usuario && Hash::check($request->password, $usuario->pass_usuario)) {
            session(['usuario' => $usuario]); // ✅ sesión manual
            return redirect()->intended('/'); // Redirigir a inicio
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
