<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\AjusteStock;

class ProductoController extends Controller
{
    /**
     * Muestra la vista principal de ajustes de productos.
     */
    public function index()
    {
        $productos  = Producto::all();
        $categorias = Categoria::all();

        return view('ajustes.index', compact('productos', 'categorias'));
    }

    /**
     * Guarda un nuevo producto y registra el ajuste inicial.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_producto'      => 'required|string|max:100|unique:productos,nombre_producto',
            'precio_producto'      => 'required|integer|min:0',
            'stock_real'           => 'required|integer|min:0',
            'id_categoria'         => 'required|integer|exists:categorias,id_categoria',
            'descripcion_producto' => 'required|string|max:500'
        ]);

        // ✅ Crear el producto
        $producto = Producto::create([
            'nombre_producto'      => $request->nombre_producto,
            'precio_producto'      => $request->precio_producto,
            'stock_real'           => $request->stock_real,
            'id_categoria'         => $request->id_categoria,
            'descripcion_producto' => $request->descripcion_producto,
            'estado_producto'      => 'A' // activo por defecto
        ]);

        // ✅ Registrar ajuste de stock inicial
        if (session()->has('usuario')) {
            AjusteStock::create([
                'id_producto'        => $producto->id_producto,
                'rut_usuario'        => session('usuario')['rut_usuario'], // ✅ ACCESO COMO ARRAY
                'cantidad_ajuste'    => $producto->stock_real,
                'descripcion_ajuste' => 'Stock inicial',
                'fecha_modificacion' => now(),
            ]);
        }

        return redirect()->route('ajustes.index')
            ->with('success', '✅ Producto agregado y ajuste de stock registrado.');
    }

    /**
     * Actualiza un producto existente y registra el ajuste si cambia el stock.
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $request->validate([
            'nombre_producto'      => 'required|string|max:100|unique:productos,nombre_producto,' . $producto->id_producto . ',id_producto',
            'precio_producto'      => 'required|integer|min:0',
            'stock_real'           => 'required|integer|min:0',
            'id_categoria'         => 'required|integer|exists:categorias,id_categoria',
            'descripcion_producto' => 'required|string|max:500'
        ]);

        $stockAnterior = $producto->stock_real;

        // ✅ Actualizar producto
        $producto->update([
            'nombre_producto'      => $request->nombre_producto,
            'precio_producto'      => $request->precio_producto,
            'stock_real'           => $request->stock_real,
            'id_categoria'         => $request->id_categoria,
            'descripcion_producto' => $request->descripcion_producto
        ]);

        // ✅ Registrar ajuste solo si cambia el stock
        if ($stockAnterior != $request->stock_real && session()->has('usuario')) {
            AjusteStock::create([
                'id_producto'        => $producto->id_producto,
                'rut_usuario'        => session('usuario')['rut_usuario'], // ✅ ACCESO COMO ARRAY
                'cantidad_ajuste'    => $request->stock_real - $stockAnterior,
                'descripcion_ajuste' => 'Edición de producto (ajuste de stock)',
                'fecha_modificacion' => now(),
            ]);
        }

        return redirect()->route('ajustes.index')
            ->with('success', '✅ Producto actualizado correctamente.');
    }

    /**
     * Elimina un producto.
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('ajustes.index')
            ->with('success', '🗑️ Producto eliminado correctamente.');
    }
}
