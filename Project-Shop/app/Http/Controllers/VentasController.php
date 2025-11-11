<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EncabezadoVenta;
use App\Models\DetalleVenta;
use App\Models\Carrito;

class VentasController extends Controller
{
    // Crear la venta desde el botón “Confirmar Pedido”
    public function confirmarPedido(Request $request)
    {
        if (!session()->has('usuario')) {
            return redirect('/login')->withErrors(['msg' => 'Debes iniciar sesión.']);
        }

        $usuario = session('usuario');
        $rut = $usuario['rut_usuario'];
        $rol = $usuario['tipo_usuario'] ?? 'U'; // ⚡ aquí usamos tipo_usuario

        // Obtener productos del carrito
        $itemsCarrito = Carrito::where('rut_usuario', $rut)
            ->with('producto')
            ->get();

        if ($itemsCarrito->isEmpty()) {
            return redirect()->route('carrito.mostrar')
                ->withErrors(['msg' => 'No hay productos en el carrito.']);
        }

        // Crear encabezado de venta
        $encabezado = EncabezadoVenta::create([
            'rut_usuario' => $rut,
            'fecha_venta' => now(),
            'estado_venta' => 'P', // Pendiente
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

        // Vaciar carrito del usuario
        Carrito::where('rut_usuario', $rut)->delete();

        // Redirigir al admin a la página de confirmación (ventas pendientes)
        if ($rol === 'A') {
            return redirect()->route('pagos.confirmacion', $encabezado->num_venta)
                ->with('success', 'Pedido registrado correctamente.');
        }

        // Usuario normal: volver al carrito con modal
        return redirect()->route('carrito.mostrar')
            ->with('modal', 'pedido_confirmado');
    }

    // Vista de confirmación/ventas pendientes
    public function confirmacion($num_venta)
    {
        // Si $num_venta es 0, listamos todas las ventas pendientes
        if ($num_venta == 0) {
            $ventasPendientes = EncabezadoVenta::where('estado_venta', 'P')->get();
            return view('confirmar.index', compact('ventasPendientes'));
        }

        $encabezado = EncabezadoVenta::where('num_venta', $num_venta)->firstOrFail();

        // Obtener detalles de la venta
        $itemsCarrito = DetalleVenta::where('num_venta', $num_venta)
            ->with('producto')
            ->get();

        // Calcular total
        $total = $itemsCarrito->sum(function ($item) {
            return $item->precio * $item->cantidad_item;
        });

        $rut = $encabezado->rut_usuario;

        return view('confirmar.index', compact('itemsCarrito', 'total', 'num_venta', 'rut'));
    }

    // Concretar venta (solo admin)
    public function concretarVenta($num_venta)
    {
        $venta = EncabezadoVenta::where('num_venta', $num_venta)->firstOrFail();
        $venta->estado_venta = 'C'; // Concretada
        $venta->save();

        return redirect()->route('pagos.confirmacion', 0)
            ->with('success', 'Venta concretada correctamente.');
    }

    // Cancelar venta (solo admin)
    public function cancelarVenta($num_venta)
    {
        $venta = EncabezadoVenta::where('num_venta', $num_venta)->firstOrFail();
        $venta->estado_venta = 'X'; // Cancelada
        $venta->save();

        return redirect()->route('pagos.confirmacion', 0)
            ->with('success', 'Venta cancelada correctamente.');
    }
}
