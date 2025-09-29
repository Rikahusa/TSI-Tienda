<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    // Mostrar formulario de registro
    public function create()
    {
        return view('registro.index');
    }

    // Procesar formulario de registro
    public function store(Request $request)
    {
        $request->validate([
            'nuevoRut'       => 'required|string|max:10|unique:usuarios,rut_usuario',
            'nombre'         => 'required|string|max:30',
            'apellido'       => 'required|string|max:30',
            'direccion'      => 'required|string|max:50',
            'correo'         => 'required|email|max:30|unique:usuarios,correo_usuario',
            'telefono'       => 'required|string|max:12',
            'nuevaContraseña'=> 'required|string|min:6|max:30',
            'rol'            => 'required|in:Admin,Usuario,Empleado'
        ]);

        // Mapear el valor del rol
        $tipoUsuario = match ($request->rol) {
            'Admin'    => 'A',
            default    => 'U',
        };

        // Crear el usuario
        Usuario::create([
            'rut_usuario'    => $request->nuevoRut,
            'nombre_usuario' => $request->nombre,
            'apellido_usuario'=> $request->apellido,
            'direccion_usuario'=> $request->direccion,
            'correo_usuario'  => $request->correo,
            'telefono_usuario'=> $request->telefono,
            'pass_usuario'    => Hash::make($request->nuevaContraseña),
            'tipo_usuario'    => $tipoUsuario
        ]);

        return redirect()->back()->with('success', 'Usuario registrado exitosamente!');
    }
}
