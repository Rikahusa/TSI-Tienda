<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;
use App\Models\Producto;

class CarritoController extends Controller
{
    //Mostrar el carrito del usuario logueado
    public function mostrar()
    {
        if (!session()->has('usuario')) {
            return redirect('/login')->withErrors(['msg' => 'Debes iniciar sesión.']);
        }

        // Tomar el rut directamente desde la sesión (array)
        $rut = session('usuario.rut_usuario');

        //  Traer solo los productos de este usuario
        $itemsCarrito = Carrito::where('rut_usuario', $rut)
            ->with('producto')
            ->get();

        // Calcular el total
        $total = $itemsCarrito->sum(function ($item) {
            return $item->producto->precio_producto * $item->cantidad_item;
        });

        return view('Carrito.index', compact('itemsCarrito', 'total'));
    }

    //Agregar un producto al carrito
    public function agregar($id)
    {
        if (!session()->has('usuario')) {
            return redirect('/login')->withErrors(['msg' => 'Debes iniciar sesión.']);
        }

        $rut = session('usuario.rut_usuario');
        $producto = Producto::findOrFail($id);

        //  Buscar SOLO este producto de este usuario
        $item = Carrito::where('rut_usuario', $rut)
            ->where('id_producto', $producto->id_producto)
            ->first();

        if ($item) {
            //  Incrementar solo este registro (UPDATE explícito)
            Carrito::where('rut_usuario', $rut)
                ->where('id_producto', $producto->id_producto)
                ->update([
                    'cantidad_item' => $item->cantidad_item + 1
                ]);
        } else {
            //  Crear un nuevo registro solo para este producto
            Carrito::create([
                'rut_usuario'   => $rut,
                'id_producto'   => $producto->id_producto,
                'cantidad_item' => 1,
            ]);
        }

        return redirect()->route('carrito.mostrar');
    }

    ///Eliminar un producto específico del carrito
    public function eliminar($id)
    {
        if (!session()->has('usuario')) {
            return redirect('/login')->withErrors(['msg' => 'Debes iniciar sesión.']);
        }

        $rut = session('usuario.rut_usuario');

        //  Solo elimina el producto indicado del usuario logueado
        Carrito::where('rut_usuario', $rut)
            ->where('id_producto', $id)
            ->delete();

        return redirect()->route('carrito.mostrar');
    }
}
