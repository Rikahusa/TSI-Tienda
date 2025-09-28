@extends('layouts.master')

@section('contenido-principal')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h1 class="card-title mb-0">Ajuste de Productos</h1>
            <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#modalAgregar">
                + Agregar Producto
            </button>
        </div>
        <div class="card-body">

            {{-- 🔴 MENSAJES DE ERROR GLOBALES --}}
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

            @if($productos->count() > 0)
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%">#</th>
                            <th width="20%">Nombre</th>
                            <th width="15%">Precio</th>
                            <th width="10%">Stock</th>
                            <th width="20%">Categoría</th>
                            <th width="20%">Descripción</th>
                            <th width="20%">Acciones</th>
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
                            <td>{{ $producto->descripcion_producto }}</td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-warning"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalEditar{{ $producto->id_producto }}">
                                    Editar
                                </button>
                                <form action="{{ route('ajustes.eliminar', $producto->id_producto) }}"
                                      method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('¿Eliminar este producto?')">
                                        Eliminar
                                    </button>
                                </form>
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

<!-- 🔵 MODALES DE EDICIÓN -->
@foreach($productos as $producto)
<div class="modal fade" id="modalEditar{{ $producto->id_producto }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" method="POST"
              action="{{ route('ajustes.actualizar', $producto->id_producto) }}">
            @csrf
            @method('PUT')
            <div class="modal-header bg-warning">
                <h5 class="modal-title">Editar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Nombre</label>
                    <input type="text" name="nombre_producto" class="form-control"
                           value="{{ $producto->nombre_producto }}" required>
                </div>
                <div class="mb-3">
                    <label>Precio</label>
                    <input type="number" name="precio_producto" class="form-control"
                           value="{{ $producto->precio_producto }}" required>
                </div>
                <div class="mb-3">
                    <label>Stock</label>
                    <input type="number" name="stock_real" class="form-control"
                           value="{{ $producto->stock_real }}" required>
                </div>
                <div class="mb-3">
                    <label>Categoría</label>
                    <select name="id_categoria" class="form-control" required>
                        @foreach($categorias as $cat)
                            <option value="{{ $cat->id_categoria }}"
                                {{ $producto->id_categoria == $cat->id_categoria ? 'selected' : '' }}>
                                {{ $cat->nombre_categoria }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Descripción</label>
                    <textarea name="descripcion_producto" class="form-control" required>{{ $producto->descripcion_producto }}</textarea>
                </div>

                <!-- NUEVO: campo opcional para la descripción del ajuste -->
                <div class="mb-3">
                    <label>Motivo del ajuste (opcional)</label>
                    <textarea name="descripcion_ajuste" class="form-control" placeholder="Ej: Cambio de precio, corrección de stock">{{ old('descripcion_ajuste') }}</textarea>
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

<!-- 🔵 MODAL AGREGAR -->
<div class="modal fade" id="modalAgregar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" method="POST" action="{{ route('ajustes.guardar') }}">
            @csrf
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Agregar Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label>Nombre</label>
                    <input type="text" name="nombre_producto" class="form-control"
                           value="{{ old('nombre_producto') }}" required>
                </div>
                <div class="mb-3">
                    <label>Precio</label>
                    <input type="number" name="precio_producto" class="form-control"
                           value="{{ old('precio_producto') }}" required>
                </div>
                <div class="mb-3">
                    <label>Stock</label>
                    <input type="number" name="stock_real" class="form-control"
                           value="{{ old('stock_real') }}" required>
                </div>
                <div class="mb-3">
                    <label>Categoría</label>
                    <select name="id_categoria" class="form-control" required>
                        @foreach($categorias as $cat)
                            <option value="{{ $cat->id_categoria }}"
                                {{ old('id_categoria') == $cat->id_categoria ? 'selected' : '' }}>
                                {{ $cat->nombre_categoria }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Descripción</label>
                    <textarea name="descripcion_producto" class="form-control" required>{{ old('descripcion_producto') }}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div>
        </form>
    </div>
</div>
@endsection
