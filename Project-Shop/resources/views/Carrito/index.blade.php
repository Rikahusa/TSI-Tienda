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
                                <th width="20%">Producto</th>
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
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ asset('images/Amiguri.png') }}" 
                                             class="img-thumbnail me-3" 
                                             style="width: 50px; height: 50px; object-fit: cover;"
                                             alt="{{ $item->producto->Nombre_Producto }}">
                                        <span>{{ $item->producto->Nombre_Producto }}</span>
                                    </div>
                                </td>
                                <td>${{ number_format($item->producto->Precio_Producto, 0, ',', '.') }}</td>
                                <td class="text-center">
                                    <div class="input-group input-group-sm" style="max-width: 120px;">
                                        <button class="btn btn-outline-secondary" type="button">-</button>
                                        <input type="number" class="form-control text-center" 
                                               value="{{ $item->Cantidad_Item }}" min="1">
                                        <button class="btn btn-outline-secondary" type="button">+</button>
                                    </div>
                                </td>
                                <td>${{ number_format($item->producto->Precio_Producto * $item->Cantidad_Item, 0, ',', '.') }}</td>
                                <td class="text-center">
                                    <form action="{{ route('carrito.eliminar', $item->Id_Producto) }}" method="POST">
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
                                <td class="fw-bold">${{ number_format($total, 0, ',', '.') }}</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ url('/catalogo/amigu') }}" class="btn btn-outline-primary">
                        <span</span>Continuar Comprando
                    </a>
                    <div>
                        <button class="btn btn-warning me-2">
                            <span </span>Actualizar Carrito
                        </button>
                        <a href="#" class="btn btn-success">
                            <span </span>Proceder al Pago
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