<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EncabezadoVenta;
use App\Models\DetalleVenta;
use App\Models\Carrito;

class VentasController extends Controller
{
    public function confirmarPedido(Request $request)
    {
        if (!session()->has('usuario')) {
            return redirect('/login')->withErrors(['msg' => 'Debes iniciar sesión.']);
        }

        $usuario = session('usuario');
        $rut = $usuario['rut_usuario'];
        $rol = $usuario['rol'] ?? 'usuario'; // asumimos que guardas el rol

        // Obtener productos del carrito del usuario
        $itemsCarrito = Carrito::where('rut_usuario', $rut)->with('producto')->get();

        if ($itemsCarrito->isEmpty()) {
            return redirect()->route('carrito.mostrar')->withErrors(['msg' => 'No hay productos en el carrito.']);
        }

        // Crear encabezado de venta
        $encabezado = EncabezadoVenta::create([
            'rut_usuario' => $rut,
            'fecha_venta' => now(),
            'estado_venta' => 'P', // pendiente por defecto
        ]);

        // Crear detalle de venta
        foreach ($itemsCarrito as $item) {
            DetalleVenta::create([
                'num_venta' => $encabezado->num_venta,
                'id_producto' => $item->id_producto,
                'cantidad_item' => $item->cantidad_item,
                'precio' => $item->producto->precio_producto,
            ]);
        }

        // Diferenciar comportamiento según rol
        if ($rol === 'admin') {
            // Admin: redirigir a la vista de confirmación para administración
            return redirect()->route('pagos.confirmacion')->with('success', 'Pedido registrado correctamente.');
        } else {
            // Usuario normal: mostrar modal en la misma página
            return redirect()->route('carrito.mostrar')->with('modal', 'pedido_confirmado');
        }
    }

    // Vista de confirmación para administradores
    public function confirmacion()
    {
        return view('confirmar.index');
    }
}
