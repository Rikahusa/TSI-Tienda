@extends('layouts.master')
@section('contenido-principal')
    <div class="container position-relative mt-4">
        <h1 class="text-center mb-4">Nuestros Productos en oferta para nuestros clientes registrados</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4 ">
            <!-- Ofertas de productos destacados -->
            <div class="col">
                <img src="{{ asset('images/oferta.png')}}" alt="Oferta" class="position-absolute top-5" style="width:120px; z-index:10;">
                <div class="card h-100">
                    <img src="{{ asset('images/Amiguri.png')}}" class="card-img-top" alt="Amigurumi">
                    <div class="card-body">
                        <h5 class="card-title">Amigurumi</h5>
                        <p class="card-text">Amigurumi del reino Fungi.</p>
                        <p class="card-text"><strong>Precio:</strong> $13990</p>
                        <a href="#" class="btn btn-primary">Detalles</a>
                        <a href="#" class="btn btn-primary float-end">Agregar al Carrito</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <img src="{{ asset('images/oferta.png')}}" alt="Oferta" class="position-absolute top-5" style="width:120px; z-index:10;">
                <div class="card h-100">
                    <img src="{{ asset('images/Sueter.png')}}" class="card-img-top" alt="Sueter de Lana">
                    <div class="card-body">
                        <h5 class="card-title">Sueter de Lana</h5>
                        <p class="card-text">Sueter de lana con colores muy vibrantes.</p>
                        <p class="card-text"><strong>Precio:</strong> $17990</p>
                        <a href="#" class="btn btn-primary">Detalles</a>
                        <a href="#" class="btn btn-primary float-end">Agregar al Carrito</a>                    
                    </div>
                </div>
            </div>
            <div class="col">
                <img src="{{ asset('images/oferta.png')}}" alt="Oferta" class="position-absolute top-5" style="width:120px; z-index:10;">
                <div class="card h-100">
                    <img src="{{ asset('images/Fiestas.png')}}" class="card-img-top" alt="Fiestas">
                    <div class="card-body">
                        <h5 class="card-title">Fiestas</h5>
                        <p class="card-text">Regalo sorpresa y fiesta de cumpleaños para niños.</p>
                        <p class="card-text"><strong>Precio:</strong> $23990</p>
                        <a href="#" class="btn btn-primary">Detalles</a>
                        <a href="#" class="btn btn-primary float-end">Agregar al Carrito</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Categorías de nuestro productos mas cotizados</h2>
        <h4 class="text-center mb-4">Puedes encontras nuestra variada selección de productos aqui, eligiendo alguno de nuestras categorias</h4>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row g-2">
                            <!--Collage de imagenes de vestimentas y accesorios-->
                            <div class="col-6">
                                <img src="{{ asset('images/Gorro_extras.png')}}" class="img-fluid rounded" alt="Gorro">
                            </div>
                            <div class="col-6">
                                <img src="{{ asset('images/Llaveros.png')}}" class="img-fluid rounded" alt="Llaveros">
                            </div>
                        </div>
                        <h5 class="card-title">Vestimentas y accesorios de Lana</h5>
                        <p class="card-text">Explora nuestra colección de vestimentas y accesorios tejidos a mano.</p>
                        <div class="d-flex justify-content-center">
                           <a href="{{ url('/catalogo/vestidos') }}" class="btn btn-primary mt-3">Ver Más</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row g-2">
                            <!--Collage de imagenes de amigurumis-->
                            <div class="col-6">
                                <img src="{{ asset('images/amigurumi_2.png')}}" class="card-img-top" alt="Amigurumi groot">
                            </div>
                            <div class="col-6">
                                <img src="{{ asset('images/mini_amigurumi_2.png')}}" class="card-img-top" alt="mini amigurumi Fiu">
                            </div>
                        </div>
                        <h5 class="card-title">Amigurumis</h5>
                        <p class="card-text">Descubre nuestros fantasticos, únicos y personalizados Amigurumis.</p>
                        <div class="d-flex justify-content-center">
                            <a href="{{ url('/catalogo/amigu') }}" class="btn btn-primary mt-3">Ver Más</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row g-2">
                            <!--Collage de imagenes de fiestas-->
                            <div class="col-6">
                                <img src="{{ asset('images/Fiestas_2.png')}}" class="img-fluid rounded" alt="Fiestas 1">
                            </div>
                            <div class="col-6">
                                <img src="{{ asset('images/Fiestas_5.png')}}" class="img-fluid rounded" alt="Fiesta 2">
                            </div>
                        </div>
                        <h5 class="card-title">Fiestas</h5>
                        <p class="card-text">Mira nuestra coleccion de regalos de sorpresa para dias especiales</p>
                        <div class="d-flex justify-content-center">
                            <a href="{{ url('/catalogo/fiesta') }}" class="btn btn-primary mt-3">Ver Más</a>
                        </div>
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