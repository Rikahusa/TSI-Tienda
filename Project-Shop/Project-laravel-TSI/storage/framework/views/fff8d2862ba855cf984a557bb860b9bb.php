<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
    <title>Document</title>
</head>
<body style="background-color: thistle">
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
    <?php echo $__env->yieldContent('contenido-principal'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\Users\user\Documents\GitHub\TSI-Tienda\Project-Shop\Project-laravel-TSI\resources\views/layouts/master.blade.php ENDPATH**/ ?>