@extends('layouts.master')

@section('contenido-principal')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h1 class="card-title mb-0">Editar Stock</h1>
        </div>

        <div class="card-body">

            {{-- MENSAJES DE ERROR GLOBALES --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- TABLA DE PRODUCTOS --}}
            @if($productos->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%">#</th>
                            <th width="25%">Nombre</th>
                            <th width="15%">Precio</th>
                            <th width="10%">Stock</th>
                            <th width="20%">Categoría</th>
                            <th width="15%">Estado</th>
                            <th width="10%">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productos as $index => $producto)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $producto->nombre_producto }}</td>
                            <td>${{ number_format($producto->precio_producto, 0, ',', '.') }}</td>
                            <td>{{ $producto->stock_real }}</td>
                            <td>
                                @php
                                    $categoria = $categorias->firstWhere('id_categoria', $producto->id_categoria);
                                @endphp
                                {{ $categoria ? $categoria->nombre_categoria : 'Sin categoría' }}
                            </td>
                            <td>{{ $producto->estado_producto == 'A' ? 'Activo' : 'Inactivo' }}</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-warning"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEditarStock{{ $producto->id_producto }}">
                                    Editar
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div class="text-center text-muted py-5">
                No hay productos registrados.
            </div>
            @endif
        </div>
    </div>
</div>

<!-- MODALES DE EDICIÓN DE STOCK -->
@foreach($productos as $producto)
<div class="modal fade" id="modalEditarStock{{ $producto->id_producto }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" method="POST"
            action="{{ route('stock.actualizar', $producto->id_producto) }}">
            @csrf
            @method('PUT')
            <div class="modal-header bg-warning">
                <h5 class="modal-title">Editar Stock: {{ $producto->nombre_producto }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Stock actual</label>
                    <input type="number" name="stock_real" class="form-control"
                        value="{{ $producto->stock_real }}" min="0" max="200" required>
                </div>
                <div class="mb-3">
                    <label>Motivo del cambio</label>
                    <textarea name="motivo_cambio" class="form-control" rows="3" required
                        placeholder="Explica por qué se ajusta el stock..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-warning">Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>
@endforeach
@endsection
