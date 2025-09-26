<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CatalogoController extends Controller
{
    public function index($tipo)
    {
        // 🟢 Mapeo de slug a ID de categoría
        $map = [
            'amigurumis' => 1,  // Ajusta según tus IDs reales
            'fiesta'    => 2,
            'vestidos'   => 3,
        ];

        // Verificamos que el tipo exista en el mapa
        if (!isset($map[$tipo])) {
            abort(404, 'Categoría no encontrada');
        }

        // Consulta correcta
        $productos = Producto::where('Id_Categoria', $map[$tipo])
            ->where('Estado_Producto', 'A')
            ->get();

        // Vista dinámica (importante: nombre en minúscula si tus carpetas lo usan)
        return view("catalogo_{$tipo}.index", compact('productos'));
    }
}
