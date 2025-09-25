@extends('layouts.master')
@section('contenido-principal')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Catálogo de Fiestas y Regalos sorpresa</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">

            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('images/Fiestas.png')}}" class="card-img-top" alt="Fiestas">
                    <div class="card-body">
                        <h5 class="card-title">Fiestas de Cumpleaños</h5>
                        <p class="card-text">Regalo sorpresa y fiesta de cumpleaños.</p>
                        <p class="card-text"><strong>Precio:</strong> $23990</p>
                        <form action="{{ route('carrito.agregar', '13') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary w-100">Agregar al Carrito</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('images/Fiestas_2.png')}}" class="card-img-top" alt="Fiestas2">
                    <div class="card-body">
                        <h5 class="card-title">Fiestas Sorpresa para jóvenes</h5>
                        <p class="card-text">Fiestas temática sorpresa, especializada para amantes de videojuegos.</p>
                        <p class="card-text"><strong>Precio:</strong> $12990</p>
                        <form action="{{ route('carrito.agregar', '14') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary w-100">Agregar al Carrito</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('images/Fiestas_3.png')}}" class="card-img-top" alt="Fiestas3">
                    <div class="card-body">
                        <h5 class="card-title">Fiestas de cumpleaños de deportes</h5>
                        <p class="card-text">Fiestas infantiles con temática de deportes y amantes del peluche Capibara.</p>
                        <p class="card-text"><strong>Precio:</strong> $12990</p>
                        <form action="{{ route('carrito.agregar', '15') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary w-100">Agregar al Carrito</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('images/Fiestas_4.png')}}" class="card-img-top" alt="Fiestas4">
                    <div class="card-body">
                        <h5 class="card-title">Regalo sorpresa de animalitos</h5>
                        <p class="card-text">Fiestas infantiles con temática de animales exóticos.</p>
                        <p class="card-text"><strong>Precio:</strong> $12990</p>
                        <form action="{{ route('carrito.agregar', '16') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary w-100">Agregar al Carrito</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('images/Fiestas_5.png')}}" class="card-img-top" alt="Fiestas5">
                    <div class="card-body">
                        <h5 class="card-title">Fiestas de cumpleaños con temática de dinosaurios</h5>
                        <p class="card-text">Fiestas infantiles con temática de dinosaurios y regalos sorpresa.</p>
                        <p class="card-text"><strong>Precio:</strong> $12990</p>
                        <form action="{{ route('carrito.agregar', '17') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary w-100">Agregar al Carrito</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('images/Fiestas_6.png')}}" class="card-img-top" alt="Fiestas6">
                    <div class="card-body">
                        <h5 class="card-title">Fiestas de cumpleaños con temática de unicornios</h5>
                        <p class="card-text">Fiestas infantiles con temática de unicornios y regalos sorpresa.</p>
                        <p class="card-text"><strong>Precio:</strong> $12990</p>
                        <form action="{{ route('carrito.agregar', '18') }}" method="POST">
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
