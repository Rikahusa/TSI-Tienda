    @extends('layouts.master')

    @section('contenido-principal')
    <div class="container my-5">
        <h1 class="text-center mb-4">Confirmación de su compra</h1>

        <div class="row justify-content-center">
            <div class="col-md-8">

                {{-- Mostrar los productos del carrito --}}
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Resumen de Compra</h5>
                    </div>
                    <div class="card-body">
                        @if(isset($itemsCarrito) && $itemsCarrito->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th width="5%">N°</th>
                                            <th width="45%">Producto</th>
                                            <th width="15%">Precio Unitario</th>
                                            <th width="15%">Cantidad</th>
                                            <th width="20%">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($itemsCarrito as $index => $item)
                                            <tr>
                                                <td class="text-center">{{ $index + 1 }}</td>
                                                <td>{{ $item->producto->nombre_producto }}</td>
                                                <td>${{ number_format($item->producto->precio_producto, 0, ',', '.') }}</td>
                                                <td class="text-center">{{ $item->cantidad_item }}</td>
                                                <td>${{ number_format($item->producto->precio_producto * $item->cantidad_item, 0, ',', '.') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="table-secondary">
                                        <tr>
                                            <td colspan="4" class="text-end fw-bold">Total:</td>
                                            <td class="fw-bold">${{ number_format($total, 0, ',', '.') }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
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
                            <input class="form-check-input" type="radio" name="tipoEntrega" id="retiroTienda" value="tienda">
                            <label class="form-check-label" for="retiroTienda">Retiro en tienda</label>
                        </div>
                        <div id="datosRetiro" class="mt-4" style="display: none;">
                            <h6 class="text-primary mb-3">Datos para Retiro</h6>
                            <p class="mb-1"><strong>Región:</strong> Valparaíso</p>
                            <p class="mb-1"><strong>Ciudad:</strong> Viña del Mar</p>
                            <p class="mb-1"><strong>Comuna:</strong> Gomez Carreño</p>
                            <p class="mb-1"><strong>Calle:</strong> Av. Los Pinos 1234</p>
                            <p class="mb-1"><strong>Descripción del domicilio:</strong> Casa roja con portón negro y de dos pisos</p>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="tipoEntrega" id="delivery" value="delivery">
                            <label class="form-check-label" for="delivery">Despacho a domicilio</label>
                        </div>

                        {{-- Formulario de dirección --}}
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
                            <input class="form-check-input" type="radio" name="metodoPago" id="efectivo" value="efectivo">
                            <label class="form-check-label" for="efectivo">Pago en efectivo</label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="metodoPago" id="transferencia" value="transferencia">
                            <label class="form-check-label" for="transferencia">Transferencia bancaria</label>
                        </div>

                        {{-- Datos bancarios --}}
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

                {{-- Botón Confirmar Pedido --}}
                <div class="text-center mt-4">
                    <form method="POST" action="{{ route('ventas.confirmar') }}">
                        @csrf
                        <button type="submit" class="btn btn-lg btn-primary px-5">Confirmar Pedido</button>
                    </form>
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('carrito.mostrar') }}" class="btn btn-lg btn-danger px-5">Volver al carrito</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal de confirmación solo para usuarios normales --}}
    <div class="modal fade" id="confirmacionModal" tabindex="-1" aria-labelledby="confirmacionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="confirmacionModalLabel">¡Pedido Confirmado!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body text-center">
                    <h4>Gracias por su compra.</h4>
                    <p>Su pedido tendrá un lapso de 3 a 5 días para que se concrete el pago.</p>
                    <a href="{{ route('inicio.index') }}" class="btn btn-primary mt-3">Volver al Inicio</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Scripts --}}
    <script>
        const retiroTienda = document.getElementById('retiroTienda');
        const delivery = document.getElementById('delivery');
        const direccionForm = document.getElementById('direccionForm');
        const datosRetiro = document.getElementById('datosRetiro');
        const efectivo = document.getElementById('efectivo');
        const transferencia = document.getElementById('transferencia');
        const datosTransferencia = document.getElementById('datosTransferencia');

        // Mostrar y ocultar los formularios de entrega
        retiroTienda.addEventListener('change', () => {
            direccionForm.style.display = 'none';
            datosRetiro.style.display = 'block';
        });

        delivery.addEventListener('change', () => {
            direccionForm.style.display = 'block';
            datosRetiro.style.display = 'none';
        });

        // Mostrar y ocultar los datos de transferencia bancaria
        efectivo.addEventListener('change', () => {
            datosTransferencia.style.display = 'none';
        });

        transferencia.addEventListener('change', () => {
            datosTransferencia.style.display = 'block';
        });

        // Mostrar modal automáticamente si la sesión tiene 'modal' para usuarios normales
        @if(session('modal') === 'pedido_confirmado')
            const modal = new bootstrap.Modal(document.getElementById('confirmacionModal'));
            modal.show();
        @endif
    </script>
    @endsection
