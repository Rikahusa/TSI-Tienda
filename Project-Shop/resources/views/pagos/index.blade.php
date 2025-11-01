@extends('layouts.master')

@section('contenido-principal')
<div class="container my-5">
    <h1 class="text-center mb-4">Pago de tu Compra</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- Mostrar los productos del carrito --}}
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Resumen de Compra</h5>
                </div>
                <div class="card-body">
                    @if(isset($itemsCarrito) && $itemsCarrito->count() > 0)
                        <table class="table table-bordered">
                            <thead class="table-light">
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
                                        <td>${{ number_format($item->producto->precio_producto, 0, ',', '.') }}</td>
                                        <td>${{ number_format($item->producto->precio_producto * $item->cantidad_item, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="table-secondary">
                                    <th colspan="3" class="text-end">Total:</th>
                                    <th>${{ number_format($total, 0, ',', '.') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    @else
                        <p class="text-center text-muted">No hay productos en el carrito.</p>
                    @endif
                </div>
            </div>

            {{-- Opciones de envío --}}
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-secondary text-white">
                    <h5 class="mb-0">Opciones de Entrega</h5>
                </div>
                <div class="card-body">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="tipoEntrega" id="retiroTienda" value="tienda" checked>
                        <label class="form-check-label" for="retiroTienda">Retiro en tienda</label>
                    </div>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="radio" name="tipoEntrega" id="delivery" value="delivery">
                        <label class="form-check-label" for="delivery">Despacho a domicilio</label>
                    </div>

                    {{-- Formulario de dirección (oculto hasta que elija delivery) --}}
                    <div id="direccionForm" class="mt-4" style="display: none;">
                        <h6 class="text-primary mb-3">Dirección de entrega</h6>
                        <div class="mb-3">
                            <label for="calle" class="form-label">Calle y número</label>
                            <input type="text" id="calle" name="calle" class="form-control" placeholder="Ej: Av. Los Pinos 1234">
                        </div>
                        <div class="mb-3">
                            <label for="comuna" class="form-label">Comuna</label>
                            <input type="text" id="comuna" name="comuna" class="form-control" placeholder="Ej: Santiago Centro">
                        </div>
                        <div class="mb-3">
                            <label for="referencia" class="form-label">Referencia (opcional)</label>
                            <input type="text" id="referencia" name="referencia" class="form-control" placeholder="Ej: Casa amarilla, portón negro">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Método de pago --}}
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">Método de Pago</h5>
                </div>
                <div class="card-body">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="metodoPago" id="efectivo" value="efectivo" checked>
                        <label class="form-check-label" for="efectivo">Pago en efectivo</label>
                    </div>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="radio" name="metodoPago" id="transferencia" value="transferencia">
                        <label class="form-check-label" for="transferencia">Transferencia bancaria</label>
                    </div>

                    {{-- Datos bancarios (solo si selecciona transferencia) --}}
                    <div id="datosTransferencia" class="mt-4" style="display: none;">
                        <h6 class="text-primary mb-3">Datos para Transferencia</h6>
                        <p class="mb-1"><strong>Banco:</strong> Banco Estado</p>
                        <p class="mb-1"><strong>Cuenta:</strong> 12345678</p>
                        <p class="mb-1"><strong>Tipo de cuenta:</strong> Cuenta Corriente</p>
                        <p class="mb-1"><strong>Rut:</strong> 12.345.678-9</p>
                        <p class="mb-1"><strong>Correo:</strong> pagos@viviluna.cl</p>
                    </div>
                </div>
            </div>

            <div class="text-center mt-4">
                <button class="btn btn-lg btn-primary px-5">Confirmar Pedido</button>
            </div>
        </div>
    </div>
</div>

<footer class="bg-dark text-white text-center py-3 mt-5">
    <p>&copy; 2025 Vivi Luna. Todos los derechos reservados.</p>
    <p>Desarrollado por <a href="#" class="text-white">Alvarado-Espinoza</a></p>
</footer>

{{-- Scripts para mostrar u ocultar secciones --}}
<script>
    const retiroTienda = document.getElementById('retiroTienda');
    const delivery = document.getElementById('delivery');
    const direccionForm = document.getElementById('direccionForm');
    const efectivo = document.getElementById('efectivo');
    const transferencia = document.getElementById('transferencia');
    const datosTransferencia = document.getElementById('datosTransferencia');

    retiroTienda.addEventListener('change', () => direccionForm.style.display = 'none');
    delivery.addEventListener('change', () => direccionForm.style.display = 'block');

    efectivo.addEventListener('change', () => datosTransferencia.style.display = 'none');
    transferencia.addEventListener('change', () => datosTransferencia.style.display = 'block');
</script>
@endsection
