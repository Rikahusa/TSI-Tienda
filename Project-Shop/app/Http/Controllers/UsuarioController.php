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
        return view('registro.index'); // Asegúrate de que esta vista existe
    }

    // Procesar el formulario de registro
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nuevoRut' => 'required|string|max:10|unique:_usuarios,Rut_Usuario',
            'nombre' => 'required|string|max:30',
            'apellido' => 'required|string|max:30',
            'direccion' => 'required|string|max:30',
            'correo' => 'required|email|max:30|unique:_usuarios,Correo_Usuario',
            'telefono' => 'required|string|max:12',
            'nuevaContraseña' => 'required|string|min:6|max:30',
            'rol' => 'required|in:Admin,Usuario,Empleado'
        ]);

        // Mapear el valor del rol al formato de la base de datos
        $tipoUsuario = 'U'; // Por defecto Usuario
        if ($request->rol == 'Admin') {
            $tipoUsuario = 'A';
        } elseif ($request->rol == 'Empleado') {
            $tipoUsuario = 'E';
        }

        // Crear el usuario
        Usuario::create([
            'Rut_Usuario' => $request->nuevoRut,
            'Nombre_Usuario' => $request->nombre,
            'Apellido_Usuario' => $request->apellido,
            'Dirección_Usuario' => $request->direccion,
            'Correo_Usuario' => $request->correo,
            'Teléfono_Usuario' => $request->telefono,
            'Pass_Usuario' => Hash::make($request->nuevaContraseña), // Encriptar contraseña
            'Tipo_Usuario' => $tipoUsuario
        ]);

        return redirect()->back()->with('success', 'Usuario registrado exitosamente!');
    }
}