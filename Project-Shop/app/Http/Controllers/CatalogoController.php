<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CatalogoController extends Controller
{
    public function index($tipo)
    {
        // Filtrar productos por tipo
        $productos = Producto::where('categoria', $tipo)->get();

        // Retornar la vista según el tipo
        return view("Catalogo_{$tipo}.index", compact('productos'));
    }
}
