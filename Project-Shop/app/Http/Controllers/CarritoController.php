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
        // Convertir a string por seguridad
        $idProducto = (string) $id;
        $rutUsuario = '999999999'; // <- reemplaza por el rut real del usuario logueado

        // Verificar que el producto exista
        $producto = Producto::find($idProducto);
        if (!$producto) {
            return redirect()->back()->with('error', 'Producto no encontrado');
        }

        // Buscar si ya existe en el carrito
        $itemCarrito = Carrito::where('Rut_Usuario', $rutUsuario)
            ->where('Id_Producto', $idProducto)
            ->first();

        if ($itemCarrito) {
            // Incrementar cantidad usando update (no save)
            Carrito::where('Rut_Usuario', $rutUsuario)
                ->where('Id_Producto', $idProducto)
                ->update([
                    'Cantidad_Item' => $itemCarrito->Cantidad_Item + 1
                ]);
        } else {
            // Crear nuevo registro
            Carrito::create([
                'Rut_Usuario'  => $rutUsuario,
                'Id_Producto'  => $idProducto,
                'Cantidad_Item'=> 1
            ]);
        }

        return redirect()
            ->route('carrito.mostrar')
            ->with('success', 'Producto agregado al carrito');
    }

    /**
     * Mostrar carrito de compras
     */
    public function mostrar()
    {
        $rutUsuario = '999999999'; // <- reemplaza por el rut real del usuario logueado

        $itemsCarrito = Carrito::with('producto')
            ->where('Rut_Usuario', $rutUsuario)
            ->get();

        $total = 0;
        foreach ($itemsCarrito as $item) {
            $total += $item->producto->Precio_Producto * $item->Cantidad_Item;
        }

        return view('Carrito.index', compact('itemsCarrito', 'total'));
    }

    /**
     * Eliminar un producto del carrito
     */
    public function eliminar($id)
    {
        $rutUsuario = '999999999'; // <- reemplaza por el rut real del usuario logueado
        $idProducto = (string) $id;

        Carrito::where('Rut_Usuario', $rutUsuario)
            ->where('Id_Producto', $idProducto)
            ->delete();

        return redirect()
            ->route('carrito.mostrar')
            ->with('success', 'Producto eliminado del carrito');
    }
}
