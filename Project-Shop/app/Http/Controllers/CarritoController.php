<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;
use App\Models\Producto;

class CarritoController extends Controller
{
    /**
     * Agregar producto al carrito
     */
    public function agregar(Request $request, $id)
    {
        $idProducto = (string) $id;
        $rutUsuario = session('usuario')->rut_usuario; // ✅ usuario logueado

        // Verificar que el producto exista
        $producto = Producto::find($idProducto);
        if (!$producto) {
            return redirect()->back()->with('error', 'Producto no encontrado');
        }

        // Buscar si ya existe en el carrito
        $itemCarrito = Carrito::where('rut_usuario', $rutUsuario)
            ->where('id_producto', $idProducto)
            ->first();

        if ($itemCarrito) {
            // Incrementar cantidad
            $itemCarrito->update([
                'cantidad_item' => $itemCarrito->cantidad_item + 1
            ]);
        } else {
            // Crear nuevo registro
            Carrito::create([
                'rut_usuario'   => $rutUsuario,
                'id_producto'   => $idProducto,
                'cantidad_item' => 1
            ]);
        }

        return redirect()
            ->route('carrito.mostrar')
            ->with('success', '✅ Producto agregado al carrito');
    }

    /**
     * Mostrar carrito de compras
     */
    public function mostrar()
    {
        $rutUsuario = session('usuario')->rut_usuario; // ✅ usuario logueado

        $itemsCarrito = Carrito::with('producto')
            ->where('rut_usuario', $rutUsuario)
            ->get();

        // Calcular total
        $total = $itemsCarrito->sum(function ($item) {
            return $item->producto->precio_producto * $item->cantidad_item;
        });

        return view('Carrito.index', compact('itemsCarrito', 'total'));
    }

    /**
     * Eliminar un producto del carrito
     */
    public function eliminar($id)
    {
        $rutUsuario = session('usuario')->rut_usuario; // ✅ usuario logueado
        $idProducto = (string) $id;

        Carrito::where('rut_usuario', $rutUsuario)
            ->where('id_producto', $idProducto)
            ->delete();

        return redirect()
            ->route('carrito.mostrar')
            ->with('success', '🗑️ Producto eliminado del carrito');
    }
}
