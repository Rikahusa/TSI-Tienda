<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Vivi Luna - Tienda</title>
</head>
<body style="background-image: url({{ asset('images/lanita.png') }}); 
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat;
            background-attachment: fixed;">

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid justify-content-center">
            <a class="navbar-brand" href="{{ url('/') }}">Vivi Luna</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                <ul class="navbar-nav">

                    {{-- ✅ Mostrar solo si NO hay sesión --}}
                    @if(!session()->has('usuario'))
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-1" href="{{ route('login') }}">
                                <span class="material-symbols-outlined">account_circle</span>
                                Iniciar Sesión
                            </a>
                        </li>
                    @endif

                    {{-- Redes Sociales --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Redes Sociales
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">WhatsApp</a></li>
                            <li><a class="dropdown-item" href="#">Correo</a></li>
                        </ul>
                    </li>

                    {{-- Productos --}}
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-1" href="{{ route('productos.index') }}">
                            <span class="material-symbols-outlined">apparel</span>
                            Productos
                        </a>
                    </li>

                    {{-- Carrito --}}
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center gap-1" href="{{ route('carrito.mostrar') }}">
                            <span class="material-symbols-outlined">shopping_cart</span>
                            Carrito
                        </a>
                    </li>

                    {{-- ✅ Ajustes SOLO para Admin --}}
                    @if(session()->has('usuario') && session('usuario.rol') === 'Admin')
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-1" href="{{ route('ajustes.index') }}">
                                <span class="material-symbols-outlined">add</span>
                                Agregar y editar Producto
                            </a>
                        </li>
                    @endif

                    {{-- ✅ Ajustes SOLO para Admin --}}
                    @if(session()->has('usuario') && session('usuario.rol') === 'Admin')
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-1" href="{{ route('stock.index') }}">
                                <span class="material-symbols-outlined">inventory</span>
                                Ajustar Stock
                            </a>
                        </li>
                    @endif

                    {{-- ✅ Mostrar solo si SÍ hay sesión (logout) --}}
                    @if(session()->has('usuario'))
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit"
                                        class="btn nav-link d-flex align-items-center gap-1 border-0 bg-transparent">
                                    <span class="material-symbols-outlined">logout</span>
                                    Cerrar Sesión
                                </button>
                            </form>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </nav> 

    {{-- ✅ Contenido principal de cada vista --}}
    <div class="container mt-4">
        @yield('contenido-principal')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
