<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Mostrar todos los productos y las categorías
     */
    public function index()
    {
        $productos  = Producto::all();
        $categorias = Categoria::all();

        return view('ajustes.index', compact('productos', 'categorias'));
    }

    /**
     * Guardar un nuevo producto
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre_producto'      => 'required|string|max:60',
            'precio_producto'      => 'required|numeric|min:0',
            'stock_real'           => 'required|integer|min:0',
            'descripcion_producto' => 'required|string|max:100',
            'id_categoria'         => 'required|string|exists:categorias,id_categoria',
        ]);

        Producto::create([
            'nombre_producto'      => $request->nombre_producto,
            'precio_producto'      => $request->precio_producto,
            'stock_real'           => $request->stock_real,
            'descripcion_producto' => $request->descripcion_producto,
            'id_categoria'         => $request->id_categoria,
            'estado_producto'      => 'A',
            'stock_minimo'         => 0,
        ]);

        return back()->with('success', '✅ Producto agregado con éxito');
    }

    /**
     * Actualizar un producto existente
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_producto'      => 'required|string|max:60',
            'precio_producto'      => 'required|numeric|min:0',
            'stock_real'           => 'required|integer|min:0',
            'descripcion_producto' => 'required|string|max:100',
            'id_categoria'         => 'required|string|exists:categorias,id_categoria',
        ]);

        $producto = Producto::findOrFail($id);

        $producto->update([
            'nombre_producto'      => $request->nombre_producto,
            'precio_producto'      => $request->precio_producto,
            'stock_real'           => $request->stock_real,
            'descripcion_producto' => $request->descripcion_producto,
            'id_categoria'         => $request->id_categoria,
        ]);

        return back()->with('success', '✅ Producto actualizado con éxito');
    }

    /**
     * Eliminar un producto
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return back()->with('success', '🗑️ Producto eliminado con éxito');
    }

    /**
     * Mostrar solo los productos de la categoría Amigurumis
     */
    public function amigurumis()
    {
        // Usamos '1' porque en la DB id_categoria = '1' para amigurumi
        $amigurumis = Producto::where('id_categoria', '1')->get();

        return view('Catalogo_Amigu.index', compact('amigurumis'));
    }
}
