@extends('layouts.master')

@section('contenido-principal')
    <div class="container my-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h1 class="card-title text-center mb-0">Carrito de Compras</h1>
            </div>

            <div class="card-body">
                @if(isset($itemsCarrito) && $itemsCarrito->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th width="5%">N°</th>
                                    <th width="35%">Producto</th>
                                    <th width="15%">Precio</th>
                                    <th width="10%">Cantidad</th>
                                    <th width="15%">Subtotal</th>
                                    <th width="10%">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach($itemsCarrito as $index => $item)
                                    <tr>
                                        <td class="text-center">{{ $index + 1 }}</td>
                                        <td>{{ $item->producto->nombre_producto }}</td>
                                        <td>${{ number_format($item->producto->precio_producto, 0, ',', '.') }}</td>
                                        <td class="text-center">
                                            <form action="{{ route('carrito.actualizar', $item->id_producto) }}" method="POST" class="d-flex justify-content-center align-items-center">
                                                @csrf
                                                @method('PUT')
                                                <input type="number" name="cantidad_item" value="{{ $item->cantidad_item }}" min="1" class="form-control form-control-sm text-center" style="width: 70px;">
                                                <button type="submit" class="btn btn-sm btn-outline-primary ms-2">
                                                    <span class="material-icons">Actualizar</span>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            ${{ number_format($item->producto->precio_producto * $item->cantidad_item, 0, ',', '.') }}
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('carrito.eliminar', $item->id_producto) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <span class="material-icons">delete</span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="table-secondary">
                                <tr>
                                    <td colspan="4" class="text-end fw-bold">Total:</td>
                                    <td class="fw-bold">
                                        ${{ number_format($total, 0, ',', '.') }}
                                    </td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ url('/productos') }}" class="btn btn-outline-primary">
                            Continuar Comprando
                        </a>
                        <div>
                            <a href="{{ route('pagos.index') }}" class="btn btn-success">
                                Proceder al Pago
                            </a>
                        </div>
                    </div>
                @else
                    <div class="text-center py-5">
                        <h4 class="text-muted">Tu carrito está vacío</h4>
                        <p class="text-muted">Agrega algunos productos increíbles</p>
                        <a href="{{ url('/productos') }}" class="btn btn-primary">Ir a Comprar</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
