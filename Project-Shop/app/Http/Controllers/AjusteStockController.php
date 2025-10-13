<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AjusteStock;
use App\Models\Producto;
use App\Models\Categoria;   
use Illuminate\Support\Facades\Auth;

class AjusteStockController extends Controller
{
    //Muestra todos los ajustes de stock.
    public function index()
    {
        // Cargamos ajustes con relaciones para mostrar detalles
        $ajustes     = AjusteStock::with(['producto','usuario'])->get();
        $productos   = Producto::all();
        $categorias  = Categoria::all(); //  Enviamos categorías a la vista

        return view('ajustes.index', compact('ajustes','productos','categorias'));
    }

    //Guarda un nuevo ajuste en la base de datos.
    public function store(Request $request)
    {
        $request->validate([
            'id_producto'       => 'required|integer|exists:productos,id_producto',
            'cantidad_ajuste'   => 'required|integer|min:0',
            'descripcion_ajuste'=> 'required|string|max:100'
        ]);

        // Crear el ajuste
        AjusteStock::create([
            'id_producto'        => $request->id_producto,
            'rut_usuario'        => Auth::user()->rut_usuario, // usuario logueado
            'cantidad_ajuste'    => $request->cantidad_ajuste,
            'descripcion_ajuste' => $request->descripcion_ajuste,
            'fecha_modificacion' => now()
        ]);

        return redirect()->back()->with('success', ' Ajuste de stock agregado correctamente.');
    }

    //Actualiza un ajuste existente.
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_producto'       => 'required|integer|exists:productos,id_producto',
            'cantidad_ajuste'   => 'required|integer|min:0',
            'descripcion_ajuste'=> 'required|string|max:100'
        ]);

        // Actualizar el ajuste
        $ajuste = AjusteStock::findOrFail($id);
        $ajuste->update([
            'id_producto'        => $request->id_producto,
            'cantidad_ajuste'    => $request->cantidad_ajuste,
            'descripcion_ajuste' => $request->descripcion_ajuste,
            'fecha_modificacion' => now()
        ]);

        return redirect()->back()->with('success', ' Ajuste de stock actualizado correctamente.');
    }

    //Elimina un ajuste.
    public function destroy($id)
    {
        $ajuste = AjusteStock::findOrFail($id);
        $ajuste->delete();

        return redirect()->back()->with('success', ' Ajuste de stock eliminado correctamente.');
    }
}
