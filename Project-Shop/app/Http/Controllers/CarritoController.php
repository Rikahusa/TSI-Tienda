<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;
use App\Models\Producto;

class CarritoController extends Controller
{
    public function agregar(Request $request, $idProducto)
    {
        // Debug: ver qué llega
        // dd($idProducto); // Descomenta temporalmente para ver el valor
        
        $rutUsuario = '999999999';
        
        // Verificar si el producto existe
        $producto = Producto::find($idProducto);
        
        if (!$producto) {
            return redirect()->back()->with('error', 'Producto no encontrado');
        }
        
        // Verificar si el producto ya está en el carrito
        $itemCarrito = Carrito::where('Rut_Usuario', $rutUsuario)
                            ->where('Id_Producto', $idProducto)
                            ->first();
        
        if ($itemCarrito) {
            // Incrementar cantidad
            $itemCarrito->update([
                'Cantidad_Item' => $itemCarrito->Cantidad_Item + 1
            ]);
        } else {
            // Si no existe, crear nuevo item
            Carrito::create([
                'Rut_Usuario' => $rutUsuario,
                'Id_Producto' => $idProducto,
                'Cantidad_Item' => 1
            ]);
        }
        
        return redirect()->route('carrito.mostrar')->with('success', 'Producto agregado al carrito');
    }
    
    public function mostrar()
    {
        $rutUsuario = '999999999';
        
        $itemsCarrito = Carrito::with('producto')
                            ->where('Rut_Usuario', $rutUsuario)
                            ->get();
        
        $total = 0;
        foreach ($itemsCarrito as $item) {
            $total += $item->producto->Precio_Producto * $item->Cantidad_Item;
        }
        
        return view('Carrito.index', compact('itemsCarrito', 'total'));
    }
    
    public function eliminar($idProducto)
    {
        $rutUsuario = '999999999';
        
        Carrito::where('Rut_Usuario', $rutUsuario)
                ->where('Id_Producto', $idProducto)
                ->delete();
        
        return redirect()->route('carrito.mostrar')->with('success', 'Producto eliminado del carrito');
    }
}