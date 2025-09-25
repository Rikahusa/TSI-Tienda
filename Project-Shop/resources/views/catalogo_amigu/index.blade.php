@extends('layouts.master')
@section('contenido-principal')
<div class="container mt-5">
    <h1 class="text-center mb-4">Catálogo de Amigurumis</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">

        <div class="col">
            <div class="card h-100">
                <img src="{{ asset('images/Amiguri.png')}}" class="card-img-top" alt="Amigurumi">
                <div class="card-body">
                    <h5 class="card-title">Amigurumi</h5>
                    <p class="card-text">Amigurumi del reino Fungi.</p>
                    <p class="card-text"><strong>Precio:</strong> $13.990</p>
                    <form action="{{ route('carrito.agregar', '01') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary w-100">Agregar al Carrito</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100">
                <img src="{{ asset('images/mini_amigurumi.png')}}" class="card-img-top" alt="Amigurumi2">
                <div class="card-body">
                    <h5 class="card-title">Amigurumi de Flippy</h5>
                    <p class="card-text">Amigurumi inspirados en la mascota de golosinas "Flippy".</p>
                    <p class="card-text"><strong>Precio:</strong> $12.990</p>
                    <form action="{{ route('carrito.agregar', '02') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary w-100">Agregar al Carrito</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100">
                <img src="{{ asset('images/Amigurumi_2.png')}}" class="card-img-top" alt="Amigurumi3">
                <div class="card-body">
                    <h5 class="card-title">Amigurumi de Baby Groot</h5>
                    <p class="card-text">Amigurumi de Guardianes de la Galaxia.</p>
                    <p class="card-text"><strong>Precio:</strong> $12.990</p>
                    <form action="{{ route('carrito.agregar', '03') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary w-100">Agregar al Carrito</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100">
                <img src="{{ asset('images/mini_amigurumi_2.png')}}" class="card-img-top" alt="Amigurumi4">
                <div class="card-body">
                    <h5 class="card-title">Amigurumi de Fiu</h5>
                    <p class="card-text">Amigurumi de la mascota de los Juegos Panamericanos y Parapanamericanos de 2023.</p>
                    <p class="card-text"><strong>Precio:</strong> $12.990</p>
                    <form action="{{ route('carrito.agregar', '04') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary w-100">Agregar al Carrito</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100">
                <img src="{{ asset('images/Amigurumi_3.jpg')}}" class="card-img-top" alt="Amigurumi5">
                <div class="card-body">
                    <h5 class="card-title">Amigurumi de Capuccino Asesino</h5>
                    <p class="card-text">Amigurumi de la serie de los personajes IA de brainrot Italiano.</p>
                    <p class="card-text"><strong>Precio:</strong> $12.990</p>
                    <form action="{{ route('carrito.agregar', '05') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary w-100">Agregar al Carrito</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100">
                <img src="{{ asset('images/Amigurumi_4.jpg')}}" class="card-img-top" alt="Amigurumi6">
                <div class="card-body">
                    <h5 class="card-title">Amigurumi de Tralalero Tralala</h5>
                    <p class="card-text">Amigurumi de la serie de los personajes IA de brainrot Italiano.</p>
                    <p class="card-text"><strong>Precio:</strong> $12.990</p>
                    <form action="{{ route('carrito.agregar', '06') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary w-100">Agregar al Carrito</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<footer class="bg-dark text-white text-center py-3 mt-5">
    <p>&copy; 2025 Vivi Luna. Todos los derechos reservados.</p>
    <p>Desarrollado por <a href="#" class="text-white">Alvarado-Espinoza</a></p>
</footer>
@endsection
