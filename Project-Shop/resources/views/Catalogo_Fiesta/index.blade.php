@extends('layouts.master')

@section('contenido-principal')
<div class="container mt-5">
    <h1 class="text-center mb-4">Catálogo de Fiestas y Regalos Sorpresa</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        {{-- Productos dinámicos desde $productos (asegúrate que el controlador envía $productos) --}}
        @forelse($productos as $producto)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('images/' . ($producto->imagen_producto ?? $producto->Imagen_Producto ?? 'placeholder.png')) }}"
                        class="card-img-top"
                        alt="{{ $producto->nombre_producto ?? $producto->Nombre_Producto ?? 'Producto' }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombre_producto ?? $producto->Nombre_Producto }}</h5>
                        <p class="card-text">{{ $producto->descripcion_producto ?? $producto->Descripcion_Producto }}</p>
                        <p class="card-text">
                            <strong>Precio:</strong>
                            ${{ number_format($producto->precio_producto ?? $producto->Precio_Producto ?? 0, 0, ',', '.') }}
                        </p>

                        <form action="{{ route('carrito.agregar', $producto->id_producto ?? $producto->Id_Producto) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary w-100">
                                Agregar al Carrito
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">No hay productos en esta categoría.</p>
            </div>
        @endforelse
    </div>
</div>

<footer class="bg-dark text-white text-center py-3 mt-5">
    <p>&copy; 2025 Vivi Luna. Todos los derechos reservados.</p>
    <p>Desarrollado por <a href="#" class="text-white">Alvarado-Espinoza</a></p>
</footer>
@endsection
