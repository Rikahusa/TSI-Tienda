<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\AjusteStock;

class ProductoController extends Controller
{
    //Muestra la vista principal de ajustes de productos
    public function index()
    {
        $productos  = Producto::all();
        $categorias = Categoria::all();

        return view('ajustes.index', compact('productos', 'categorias'));
    }

    //Muestra el formulario para crear un nuevo producto
    public function store(Request $request)
    {
        // Validar datos
        $request->validate([
            'nombre_producto'      => 'required|string|max:100|unique:productos,nombre_producto',
            'precio_producto'      => 'required|integer|min:0',
            'stock_real'           => 'required|integer|min:0',
            'id_categoria'         => 'required|integer|exists:categorias,id_categoria',
            'descripcion_producto' => 'required|string|max:500'
        ]);

        //  Crear el producto (solo en tabla productos)
        Producto::create([
            'nombre_producto'      => $request->nombre_producto,
            'precio_producto'      => $request->precio_producto,
            'stock_real'           => $request->stock_real,
            'id_categoria'         => $request->id_categoria,
            'descripcion_producto' => $request->descripcion_producto,
            'estado_producto'      => 'A' // activo por defecto
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('ajustes.index')
            ->with('success', ' Producto agregado correctamente.');
    }

    
    // Actualiza un producto existente
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        // Validar datos
        $request->validate([
            'nombre_producto'      => 'required|string|max:100|unique:productos,nombre_producto,' . $producto->id_producto . ',id_producto',
            'precio_producto'      => 'required|integer|min:0',
            'stock_real'           => 'required|integer|min:0',
            'id_categoria'         => 'required|integer|exists:categorias,id_categoria',
            'descripcion_producto' => 'required|string|max:500',
            'estado_producto'      => 'required|in:A,I'
        ]);

        // Actualizar producto
        $producto->update([
            'nombre_producto'      => $request->nombre_producto,
            'precio_producto'      => $request->precio_producto,
            'stock_real'           => $request->stock_real,
            'id_categoria'         => $request->id_categoria,
            'descripcion_producto' => $request->descripcion_producto,
            'estado_producto'      => $request->estado_producto
        ]);

        // Registrar ajuste solo con los campos que existen en la tabla ajustes
        if (session()->has('usuario')) {
            AjusteStock::create([
                'id_producto'        => $producto->id_producto,
                'rut_usuario'        => session('usuario')['rut_usuario'],
                'ajuste_estado'      => $producto->estado_producto,
                'fecha_modificacion' => now(),
            ]);
        }

        return redirect()->route('ajustes.index')
            ->with('success', 'Producto actualizado correctamente.');
    }



    //Elimina un producto.
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('ajustes.index')
            ->with('success', ' Producto eliminado correctamente.');
    }
}
