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
     * Guarda un nuevo producto.
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

        // ✅ Crear el producto (solo en tabla productos)
        Producto::create([
            'nombre_producto'      => $request->nombre_producto,
            'precio_producto'      => $request->precio_producto,
            'stock_real'           => $request->stock_real,
            'id_categoria'         => $request->id_categoria,
            'descripcion_producto' => $request->descripcion_producto,
            'estado_producto'      => 'A' // activo por defecto
        ]);

        return redirect()->route('ajustes.index')
            ->with('success', '✅ Producto agregado correctamente.');
    }

    /**
     * Actualiza un producto existente y registra el ajuste en la tabla ajustes.
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

        // ✅ Registrar ajuste siempre que haya usuario en sesión
        if (session()->has('usuario')) {
            AjusteStock::create([
                'id_producto'                 => $producto->id_producto,
                'rut_usuario'                 => session('usuario')['rut_usuario'],
                'cantidad_ajuste'             => $request->stock_real - $stockAnterior,
                'descripcion_ajuste'          => 'Edición de producto (ajuste de stock)',
                'fecha_modificacion'          => now(),
                'ajuste_nombre'               => $producto->nombre_producto,
                'ajuste_precio'               => $producto->precio_producto,
                'ajuste_id_categoria'         => $producto->id_categoria,
                'ajuste_descripcion_producto' => $producto->descripcion_producto,
                'ajuste_stock_real'           => $producto->stock_real,
                'ajuste_stock_minimo'         => $producto->stock_minimo,
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
