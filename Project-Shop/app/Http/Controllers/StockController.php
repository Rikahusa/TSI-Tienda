<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class StockController extends Controller
{
    // Muestra la vista con los productos y su stock
    public function index()
    {
        $productos = Producto::all();
        $categorias = Categoria::all(); // 👈 AGREGA ESTA LÍNEA

        return view('stock.index', compact('productos', 'categorias')); // 👈 AGREGA CATEGORIAS AQUÍ TAMBIÉN
    }

    // Actualiza el stock de un producto
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $producto->stock_real = $request->input('stock_real'); // 👈 Usa el nombre real del campo
        $producto->save();

        return redirect()->route('stock.index')->with('success', 'Stock actualizado correctamente.');
    }
}
