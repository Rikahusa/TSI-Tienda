<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: tomato">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid justify-content-center">
            <a class="navbar-brand" href="#">Vivi Luna</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sobre Vivi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-1" href="#">
                            <span class="material-symbols-outlined">account_circle</span>
                            Iniciar Sesion
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Redes Sociales
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">WhatsApp</a></li>
                            <li><a class="dropdown-item" href="#">Correo</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Productos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Tejidos Vivi Luna</a></li>
                            <li><a class="dropdown-item" href="#">Vivi Luna Sorpresas</a></li>
                            <li><a class="dropdown-item" href="#">Vivi Luna Luna</a></li>
                        </ul>
                    </li>
                        <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-1" href="#">
                            <span class="material-symbols-outlined d-flex align-items-center">shopping_cart</span>
                            Carrito
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </div>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Nuestros Productos</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('images/Amiguri.png')}}" class="card-img-top" alt="Producto 1">
                    <div class="card-body">
                        <h5 class="card-title">Producto 1</h5>
                        <p class="card-text">Descripción breve del producto 1.</p>
                        <p class="card-text"><strong>Precio:</strong> $20000</p>
                        <a href="#" class="btn btn-primary">Detalles</a>
                        <a href="#" class="btn btn-primary float-end">Agregar al Carrito</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('images/polera_lana.jpg')}}" class="card-img-top" alt="Producto 2">
                    <div class="card-body">
                        <h5 class="card-title">Producto 2</h5>
                        <p class="card-text">Descripción breve del producto 2.</p>
                        <p class="card-text"><strong>Precio:</strong> $15000</p>
                        <a href="#" class="btn btn-primary">Detalles</a>
                        <a href="#" class="btn btn-primary float-end">Agregar al Carrito</a>                    
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Producto 3">
                    <div class="card-body">
                        <h5 class="card-title">Producto 3</h5>
                        <p class="card-text">Descripción breve del producto 3.</p>
                        <p class="card-text"><strong>Precio:</strong> $20000</p>
                        <a href="#" class="btn btn-primary">Detalles</a>
                        <a href="#" class="btn btn-primary float-end">Agregar al Carrito</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Producto 4">
                    <div class="card-body">
                        <h5 class="card-title">Producto 4</h5>
                        <p class="card-text">Descripción breve del producto 4.</p>
                        <p class="card-text"><strong>Precio:</strong> $10000</p>
                        <a href="#" class="btn btn-primary">Detalles</a>
                        <a href="#" class="btn btn-primary float-end">Agregar al Carrito</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Producto 5">
                    <div class="card-body">
                        <h5 class="card-title">Producto 5</h5>
                        <p class="card-text">Descripción breve del producto 5.</p>
                        <p class="card-text"><strong>Precio:</strong> $30000</p>
                        <a href="#" class="btn btn-primary">Detalles</a>
                        <a href="#" class="btn btn-primary float-end">Agregar al Carrito</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Producto 6">
                    <div class="card-body">
                        <h5 class="card-title">Producto 6</h5>
                        <p class="card-text">Descripción breve del producto 6.</p>
                        <p class="card-text"><strong>Precio:</strong> $25000</p>
                        <a href="#" class="btn btn-primary">Detalles</a>
                        <a href="#" class="btn btn-primary float-end">Agregar al Carrito</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Producto 7">
                    <div class="card-body">
                        <h5 class="card-title">Producto 7</h5>
                        <p class="card-text">Descripción breve del producto 7.</p>
                        <p class="card-text"><strong>Precio:</strong> $12000</p>
                        <a href="#" class="btn btn-primary">Detalles</a>
                        <a href="#" class="btn btn-primary float-end">Agregar al Carrito</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Producto 8">
                    <div class="card-body">
                        <h5 class="card-title">Producto 8</h5>
                        <p class="card-text">Descripción breve del producto 8.</p>
                        <p class="card-text"><strong>Precio:</strong> $18000</p>
                        <a href="#" class="btn btn-primary">Detalles</a>
                        <a href="#" class="btn btn-primary float-end">Agregar al Carrito</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Producto 9">
                    <div class="card-body">
                        <h5 class="card-title">Producto 9</h5>
                        <p class="card-text">Descripción breve del producto 9.</p>
                        <p class="card-text"><strong>Precio:</strong> $22000</p>
                        <a href="#" class="btn btn-primary">Detalles</a>
                        <a href="#" class="btn btn-primary float-end">Agregar al Carrito</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Producto 10">
                    <div class="card-body">
                        <h5 class="card-title">Producto 10</h5>
                        <p class="card-text">Descripción breve del producto 10.</p>
                        <p class="card-text"><strong>Precio:</strong> $16000</p>
                        <a href="#" class="btn btn-primary">Detalles</a>
                        <a href="#" class="btn btn-primary float-end">Agregar al Carrito</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Producto 11">
                    <div class="card-body">
                        <h5 class="card-title">Producto 11</h5>
                        <p class="card-text">Descripción breve del producto 11.</p>
                        <p class="card-text"><strong>Precio:</strong> $14000</p>
                        <a href="#" class="btn btn-primary">Detalles</a>
                        <a href="#" class="btn btn-primary float-end">Agregar al Carrito</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Producto 12">
                    <div class="card-body">
                        <h5 class="card-title">Producto 12</h5>
                        <p class="card-text">Descripción breve del producto 12.</p>
                        <p class="card-text"><strong>Precio:</strong> $27000</p>
                        <a href="#" class="btn btn-primary">Detalles</a>
                        <a href="#" class="btn btn-primary float-end">Agregar al Carrito</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Producto 13">
                    <div class="card-body">
                        <h5 class="card-title">Producto 13</h5>
                        <p class="card-text">Descripción breve del producto 13.</p>
                        <p class="card-text"><strong>Precio:</strong> $19000</p>
                        <a href="#" class="btn btn-primary">Detalles</a>
                        <a href="#" class="btn btn-primary float-end">Agregar al Carrito</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Producto 14">
                    <div class="card-body">
                        <h5 class="card-title">Producto 14</h5>
                        <p class="card-text">Descripción breve del producto 14.</p>
                        <p class="card-text"><strong>Precio:</strong> $23000</p>
                        <a href="#" class="btn btn-primary">Detalles</a>
                        <a href="#" class="btn btn-primary float-end">Agregar al Carrito</a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card h-100">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Producto 15">
                    <div class="card-body">
                        <h5 class="card-title">Producto 15</h5>
                        <p class="card-text">Descripción breve del producto 15.</p>
                        <p class="card-text"><strong>Precio:</strong> $21000</p>
                        <a href="#" class="btn btn-primary">Detalles</a>
                        <a href="#" class="btn btn-primary float-end">Agregar al Carrito</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>&copy; 2025 Vivi Luna. Todos los derechos reservados.</p>
        <p>Desarrollado por <a href="#" class="text-white">Alvarado-Espinoza</a></p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>