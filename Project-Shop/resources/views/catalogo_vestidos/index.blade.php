@extends('layouts.master')
@section('contenido-principal')
<div class="container mt-5">
    <h1 class="text-center mb-4">Catálogo de Vestimentas y Accesorios</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">

        <div class="col">
            <div class="card h-100">
                <img src="{{ asset('images/Sueter.png')}}" class="card-img-top" alt="Sueter de Lana">
                <div class="card-body">
                    <h5 class="card-title">Sueter de Lana tonalidades</h5>
                    <p class="card-text">Sueter tejido a mano, ideal para el invierno.</p>
                    <p class="card-text"><strong>Precio:</strong> $19990</p>
                    <form action="{{ route('carrito.agregar', '07') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary w-100">Agregar al Carrito</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100">
                <img src="{{ asset('images/Sueter_3.png')}}" class="card-img-top" alt="Sueter de Lana 3">
                <div class="card-body">
                    <h5 class="card-title">Sueter de Lana cian rojo</h5>
                    <p class="card-text">Sueter tejido a mano, ideal para el invierno.</p>
                    <p class="card-text"><strong>Precio:</strong> $19990</p>
                    <form action="{{ route('carrito.agregar', '08') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary w-100">Agregar al Carrito</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100">
                <img src="{{ asset('images/Sueter_4.png')}}" class="card-img-top" alt="Sueter de Lana 4">
                <div class="card-body">
                    <h5 class="card-title">Sueter de Lana tonalidades rojas</h5>
                    <p class="card-text">Sueter tejido a mano, ideal para el invierno.</p>
                    <p class="card-text"><strong>Precio:</strong> $19990</p>
                    <form action="{{ route('carrito.agregar', '09') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary w-100">Agregar al Carrito</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100">
                <img src="{{ asset('images/Gorro_extras.png')}}" class="card-img-top" alt="Gorro de Lana">
                <div class="card-body">
                    <h5 class="card-title">Gorro de Lana</h5>
                    <p class="card-text">Gorro tejido a mano, ideal para el invierno.</p>
                    <p class="card-text"><strong>Precio:</strong> $9990</p>
                    <form action="{{ route('carrito.agregar', '10') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary w-100">Agregar al Carrito</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100">
                <img src="{{ asset('images/Llaveros.png')}}" class="card-img-top" alt="Llaveros de Lana">
                <div class="card-body">
                    <h5 class="card-title">Llaveros de Lana</h5>
                    <p class="card-text">Llaveros tejidos a mano, perfectos para regalar.</p>
                    <p class="card-text"><strong>Precio:</strong> $4990</p>
                    <form action="{{ route('carrito.agregar', '11') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-primary w-100">Agregar al Carrito</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100">
                <img src="{{ asset('images/mantel.png')}}" class="card-img-top" alt="Mantel de Lana">
                <div class="card-body"> 
                    <h5 class="card-title">Mantel de Lana</h5>
                    <p class="card-text">Mantel tejido a mano, ideal para decorar tu hogar.</p>
                    <p class="card-text"><strong>Precio:</strong> $13990</p>
                    <form action="{{ route('carrito.agregar', '12') }}" method="POST">
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
