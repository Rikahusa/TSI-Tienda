@extends('layouts.master')
@section('contenido-principal')

    <div class="container text-center mt-5">
        <h1 class="display-4">Bienvenidos a Vivi Luna</h1>
        <p class="lead">Tu tienda en línea de confianza</p>
        <a href="" class="btn btn-primary btn-lg">Explorar Productos</a>
    </div>
    <div id="CarouselInicial" class="carousel slide mt-5" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#CarouselInicial" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#CarouselInicial" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#CarouselInicial" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('images/Amiguri.png')}}" class="d-block w-25" alt="amiguri-playholder">
                    <img src="{{ asset('images/Falda.png')}}" class="d-block w-25" alt="polera-playholder">
                </div>
            </div>
            <div class="carousel-item active">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('images/Fiestas.png')}}" class="d-block w-25" alt="...">
                    <img src="{{ asset('images/Gorro_extras.png')}}" class="d-block w-25" alt="...">
                </div>
            </div>
            <div class="carousel-item active">
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('images/Llaveros.png')}}" class="d-block w-25" alt="...">
                    <img src="{{ asset('images/Sueter.png')}}" class="d-block w-25" alt="...">
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">   
        <h2 class="text-center mb-4">Nuestros Productos Destacados</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/Amiguri.png')}}" class="card-img-top" alt="Producto 1">
                    <div class="card-body">
                        <h5 class="card-title">Producto 1</h5>
                        Descripcion del Producto 1
                        <p class="card-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere quod molestiae et. Et, provident excepturi.</p>
                        <a href="#" class="btn btn-primary">Ver Detalles</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/Falda.png')}}" class="card-img-top" alt="Producto 2">
                    <div class="card-body">
                        <h5 class="card-title">Producto 2</h5>
                        Descripcion del Producto 2
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam dolor laboriosam voluptatem eum, architecto deleniti.</p>
                        <a href="#" class="btn btn-primary">Ver Detalles</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('images/amigurumi_2.png')}}" class="card-img-top" alt="Producto 3">
                    <div class="card-body">
                        <h5 class="card-title">Producto 3</h5>
                        Descripcion del Producto 3
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos ad reiciendis, aut pariatur molestias in.</p>
                        <a href="#" class="btn btn-primary">Ver Detalles</a>
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