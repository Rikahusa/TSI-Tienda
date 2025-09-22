<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    

    // Procesar el login
    public function login(Request $request)
    {
        // Validación
        $request->validate([
            'Rut' => 'required|string|max:10',
            'password' => 'required|string'
        ]);

        // Buscar usuario por RUT
        $usuario = Usuario::where('Rut_Usuario', $request->Rut)->first();

        // Verificar si existe y la contraseña coincide
        if ($usuario && Hash::check($request->password, $usuario->Pass_Usuario)) {
            // Login exitoso - Crear sesión manualmente
            session(['usuario' => $usuario]);
            
            return redirect()->intended('/inicio'); // Redirigir a página principal
        }

        // Login fallido
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