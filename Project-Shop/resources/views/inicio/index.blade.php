@extends('layouts.master')
@section('contenido-principal')

    <div class="container text-center mt-5">
        <h1 class="display-4">Bienvenidos a Vivi Luna</h1>
        <p class="lead">Tu tienda en línea de confianza</p>
        <a href="{{ route('productos.index') }}" class="btn btn-primary btn-lg">Explorar Productos</a>
    </div>
    <div id="CarouselInicial" class="carousel slide mt-5" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#CarouselInicial" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#CarouselInicial" data-bs-slide-to="1" class="active"></button>
            <button type="button" data-bs-target="#CarouselInicial" data-bs-slide-to="2" class="active"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('images/Amiguri.png')}}" class="d-block w-25" alt="amigurumi hongo">
                    <img src="{{ asset('images/Falda.png')}}" class="d-block w-25" alt="Falda de lana">
                </div>
            </div>
            <div class="carousel-item">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('images/Fiestas.png')}}" class="d-block w-25" alt="Fiesta de cumpleaños">
                    <img src="{{ asset('images/Gorro_extras.png')}}" class="d-block w-25" alt="Gorro de lana">
                </div>
            </div>
            <div class="carousel-item">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('images/Llaveros.png')}}" class="d-block w-25" alt="Llaveros de lana">
                    <img src="{{ asset('images/Sueter.png')}}" class="d-block w-25" alt="Sueter de lana">
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#CarouselInicial" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#CarouselInicial" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="container mt-5">   
        <h2 class="text-center mb-4">Nuestros Productos Destacados</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/Amiguri.png')}}" class="card-img-top" alt="Producto 1">
                    <div class="card-body">
                        <h5 class="card-title">Amigurumi Fungi</h5>
                        <p class="card-text">Este Amigurumi tejido con lana del reino Fungi, muy bueno para los joven y niños.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/Falda.png')}}" class="card-img-top" alt="Producto 2">
                    <div class="card-body">
                        <h5 class="card-title">Falda de lana</h5>
                        <p class="card-text">Esta falda muy comoda y tejida a mano para el uso de mujeres jovenes</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/amigurumi_2.png')}}" class="card-img-top" alt="Producto 3">
                    <div class="card-body">
                        <h5 class="card-title">Amigurumi de Baby Groot</h5>
                        <p class="card-text">Este amigurumi esta inspirado del alien Groot, en especial en su versión "Baby", que sale en las pelicula de Marvel, en especial la saga de "Guardianes de la Galaxia"</p>
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