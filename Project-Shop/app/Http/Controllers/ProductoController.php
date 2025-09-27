<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // ✅ LISTAR productos
    public function index()
    {
        $productos  = Producto::all();
        $categorias = Categoria::all();
        return view('ajustes.index', compact('productos', 'categorias'));
    }

    // ✅ GUARDAR nuevo producto
    public function store(Request $request)
    {
        $request->validate([
            'nombre_producto' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    $existe = Producto::where('nombre_producto', $value)
                        ->where('id_categoria', $request->id_categoria)
                        ->exists();
                    if ($existe) {
                        $fail('El producto ya existe en esta categoría.');
                    }
                }
            ],
            'precio_producto'      => 'required|integer|min:0',
            'stock_real'           => 'required|integer|min:0',
            'id_categoria'         => 'required|exists:categorias,id_categoria',
            'descripcion_producto' => 'required'
        ]);

        Producto::create([
            'nombre_producto'      => $request->nombre_producto,
            'precio_producto'      => $request->precio_producto,
            'stock_real'           => $request->stock_real,
            'id_categoria'         => $request->id_categoria,
            'descripcion_producto' => $request->descripcion_producto,
            'estado_producto'      => 'A' // Valor por defecto
        ]);

        return redirect()->route('ajustes.index')
                         ->with('success', 'Producto agregado correctamente.');
    }

    // ✅ ACTUALIZAR producto
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_producto' => [
                'required',
                function ($attribute, $value, $fail) use ($request, $id) {
                    $existe = Producto::where('nombre_producto', $value)
                        ->where('id_categoria', $request->id_categoria)
                        ->where('id_producto', '<>', $id)
                        ->exists();
                    if ($existe) {
                        $fail('Ya existe un producto con este nombre en la categoría seleccionada.');
                    }
                }
            ],
            'precio_producto'      => 'required|integer|min:0',
            'stock_real'           => 'required|integer|min:0',
            'id_categoria'         => 'required|exists:categorias,id_categoria',
            'descripcion_producto' => 'required'
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update([
            'nombre_producto'      => $request->nombre_producto,
            'precio_producto'      => $request->precio_producto,
            'stock_real'           => $request->stock_real,
            'id_categoria'         => $request->id_categoria,
            'descripcion_producto' => $request->descripcion_producto
        ]);

        return redirect()->route('ajustes.index')
                         ->with('success', 'Producto actualizado correctamente.');
    }

    // ✅ ELIMINAR producto
    public function destroy($id)
    {
        Producto::findOrFail($id)->delete();
        return redirect()->route('ajustes.index')
                         ->with('success', 'Producto eliminado correctamente.');
    }
}
