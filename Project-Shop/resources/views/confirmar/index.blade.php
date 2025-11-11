@extends('layouts.master')

@section('contenido-principal')
<div class="container my-5">
    <h1 class="text-center mb-4">
        @if(isset($ventasPendientes))
            Ventas Pendientes
        @else
            Confirmación de su compra
        @endif
    </h1>

    {{-- Mensajes de éxito --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(isset($ventasPendientes) && $ventasPendientes->count() > 0)
        {{-- Vista Admin: Lista todas las ventas pendientes --}}
        @foreach($ventasPendientes as $venta)
            <div class="card mb-4">
                <div class="card-header bg-warning text-dark">
                    <div class="row text-center fw-bold">
                        <div class="col-md-6 border-end">NUM_VENTA: {{ $venta->num_venta }}</div>
                        <div class="col-md-6">RUT USUARIO: {{ $venta->rut_usuario }}</div>
                    </div>
                </div>
                <div class="card-body">
                    @php
                        $items = $venta->detalles()->with('producto')->get();
                        $total = $items->sum(fn($item) => $item->precio * $item->cantidad_item);
                    @endphp
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio Unitario</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{ $item->producto->nombre_producto }}</td>
                                    <td>{{ $item->cantidad_item }}</td>
                                    <td>${{ number_format($item->precio, 0, ',', '.') }}</td>
                                    <td>${{ number_format($item->precio * $item->cantidad_item, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                            <tr class="fw-bold">
                                <td colspan="3" class="text-end">Total:</td>
                                <td>${{ number_format($total, 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- Botones solo para Admin --}}
                    @if(session('usuario.tipo_usuario') === 'A')
                        <form action="{{ route('ventas.concretar', $venta->num_venta) }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-success">Sí</button>
                        </form>
                        <form action="{{ route('ventas.cancelar', $venta->num_venta) }}" method="POST" class="d-inline">
                            @csrf
                            <button class="btn btn-danger">No</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach

    @elseif(isset($itemsCarrito) && $itemsCarrito->count() > 0)
        {{-- Vista Usuario: Confirmación de pedido individual --}}
        <div class="card">
            <div class="card-header bg-success text-white">
                <div class="row text-center fw-bold">
                    <div class="col-md-6 border-end">NUM_VENTA: {{ $num_venta }}</div>
                    <div class="col-md-6">RUT USUARIO: {{ $rut }}</div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($itemsCarrito as $item)
                            <tr>
                                <td>{{ $item->producto->nombre_producto }}</td>
                                <td>{{ $item->cantidad_item }}</td>
                                <td>${{ number_format($item->precio, 0, ',', '.') }}</td>
                                <td>${{ number_format($item->precio * $item->cantidad_item, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                        <tr class="fw-bold">
                            <td colspan="3" class="text-end">Total:</td>
                            <td>${{ number_format($total, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="alert alert-info">No hay ventas para mostrar.</div>
    @endif
</div>
@endsection
