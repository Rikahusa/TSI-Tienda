<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\ControlStock; // Modelo de la nueva tabla

class StockController extends Controller
{
    // Muestra la vista con los productos y su stock
    public function index()
    {
        $productos = Producto::all();
        $categorias = Categoria::all();

        return view('stock.index', compact('productos', 'categorias'));
    }

    // Actualiza el stock de un producto y registra el cambio
    public function update(Request $request, $id)
    {
        $request->validate([
            'stock_real'    => 'required|integer|min:0',
            'motivo_cambio' => 'required|string|max:255',
        ]);

        // Obtener producto
        $producto = Producto::findOrFail($id);

        // Guardar stock antiguo antes de actualizar
        $stockAntiguo = $producto->stock_real;

        // Actualizar stock del producto
        $producto->stock_real = $request->input('stock_real');
        $producto->save();

        // Registrar el ajuste en la tabla controlstock
        ControlStock::create([
            'id_producto'   => $producto->id_producto,
            'stock_antiguo' => $stockAntiguo,
            'stock_real'    => $producto->stock_real,
            'motivo'        => $request->input('motivo_cambio'),
        ]);

        return redirect()->route('stock.index')
                        ->with('success', 'Stock actualizado y registrado correctamente.');
    }
}
