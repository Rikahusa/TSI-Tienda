<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body style="background:linear-gradient(rgb(6, 29, 103),rgb(17, 4, 4))">
    <div class="d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="card" style="max-width: 3000px;">
            <div class="row g-0">
                <div class="col-md-6">
                    <img src="images/Pagina_IA.png" alt="Imagen de ejemplo" class="img-fluid" width="1000" height="1000">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                        <form method="POST" action="<?php echo e(route('home.login')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <label for="usuario" class="form-label">Nombre de usuario</label>
                                <input type="text" class="form-control" id="usuario" name="nombre" aria-describedby="usuarioHelp">
                            </div>
                            <div class="mb-3">
                                <label for="contraseña" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" name="password" id="contraseña">
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Login</button>

                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?php echo e(route('home.create')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <h1>REGISTRESE AQUI PRIMERO ANTES DE EL LOGIN O NO PODRA ENTRAR:</h1>
                                <label for="usuario" class="form-label">Nombre de usuario</label>
                                <input type="text" class="form-control" id="usuario" name="nombre" aria-describedby="usuarioHelp">
                            </div>
                            <div class="mb-3">
                                <label for="contraseña" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" name="password" id="contraseña">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rol" id="flexRadioDefault1" value="Admin">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Administrador
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="rol" id="flexRadioDefault2" value="Usuario" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Usuario
                                    </label>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

<?php /**PATH C:\Users\user\Documents\GitHub\TSI-Tienda\Project-Shop\Project-laravel-TSI\resources\views/home/index.blade.php ENDPATH**/ ?>