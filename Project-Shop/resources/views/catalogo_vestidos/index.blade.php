@extends('layouts.master')
@section('contenido-principal')
<div class="container mt-5">
    <h1 class="text-center mb-4">Catálogo de Vestimentas y Accesorios</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">

        {{-- Productos dinámicos (de la base de datos) --}}
        @foreach($productos as $producto)
            <div class="col">
                <div class="card h-100">
                <img src="{{ asset('images/' . $producto->imagen_producto) }}"
                    class="card-img-top"
                    alt="{{ $producto->nombre_producto }}"
                    onerror="this.onerror=null; this.src='{{ asset('images/placeholder.png') }}';">

                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombre_producto }}</h5>
                        <p class="card-text">{{ $producto->descripcion_producto }}</p>
                        <p class="card-text">
                            <strong>Precio:</strong> ${{ number_format($producto->precio_producto, 0, ',', '.') }}
                        </p>

                        <form action="{{ route('carrito.agregar', $producto->id_producto) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary w-100">
                                Agregar al Carrito
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>

<footer class="bg-dark text-white text-center py-3 mt-5">
    <p>&copy; 2025 Vivi Luna. Todos los derechos reservados.</p>
    <p>Desarrollado por <a href="#" class="text-white">Alvarado-Espinoza</a></p>
</footer>
@endsection
