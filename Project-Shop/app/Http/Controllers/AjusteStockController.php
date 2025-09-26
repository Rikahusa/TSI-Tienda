<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AjusteStock;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class AjusteStockController extends Controller
{
    /**
     * Muestra todos los ajustes de stock.
     */
    public function index()
    {
        // Traemos los ajustes con relaciones a Producto y Usuario
        $ajustes = AjusteStock::with(['producto','usuario'])->get();
        $productos = Producto::all();

    
        return view('ajustes.index', compact('ajustes','productos'));

    }

    /**
     * Guarda un nuevo ajuste en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Id_Producto' => 'required|string|max:2',
            'Cantidad'    => 'required|integer|min:0',
            'Descripcion' => 'required|string|max:60'
        ]);

        // Generar Id_Stock único (ejemplo S01, S02, S03…)
        $nextId = str_pad(AjusteStock::count() + 1, 2, '0', STR_PAD_LEFT);
        $codigo = 'S' . $nextId;

        AjusteStock::create([
            'Id_Stock'    => $codigo,
            'Id_Producto' => $request->Id_Producto,
            'Rut_Usuario' => Auth::user()->Rut_Usuario, // usuario logueado
            'Cantidad'    => $request->Cantidad,
            'Descripcion' => $request->Descripcion
        ]);

        return redirect()->back()->with('success', 'Ajuste de stock agregado correctamente.');
    }

    /**
     * Actualiza un ajuste existente.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'Id_Producto' => 'required|string|max:2',
            'Cantidad'    => 'required|integer|min:0',
            'Descripcion' => 'required|string|max:60'
        ]);

        $ajuste = AjusteStock::findOrFail($id);
        $ajuste->update([
            'Id_Producto' => $request->Id_Producto,
            'Cantidad'    => $request->Cantidad,
            'Descripcion' => $request->Descripcion
        ]);

        return redirect()->back()->with('success', 'Ajuste de stock actualizado correctamente.');
    }

    /**
     * Elimina un ajuste.
     */
    public function destroy($id)
    {
        $ajuste = AjusteStock::findOrFail($id);
        $ajuste->delete();

        return redirect()->back()->with('success', 'Ajuste de stock eliminado correctamente.');
    }
}
