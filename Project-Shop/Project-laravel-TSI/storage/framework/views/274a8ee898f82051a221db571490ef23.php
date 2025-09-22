<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: url('images/fondo.jpg') center/cover no-repeat fixed;
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(5px);
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center">
        <div class="card" style="max-width: 1000px;">
            <div class="row g-0">
                <div class="col-md-6">
                    <img src="<?php echo e(asset('images/HD.png')); ?>" alt="Imagen de ejemplo" class="img-fluid" style="object-fit: cover; height: 100%;">
                </div>
                <div class="col-md-6">
                    <div class="card-body p-4">
                        <!-- Mensajes de error -->
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p><?php echo e($error); ?></p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>

                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>

                        <h4 class="card-title mb-4">Iniciar Sesión</h4>
                        
                        <form method="POST" action="<?php echo e(route('login')); ?>">
                            <?php echo csrf_field(); ?>
                            
                            <div class="mb-3">
                                <label for="Rut" class="form-label">RUT Usuario</label>
                                <input type="text" class="form-control" id="Rut" name="Rut" value="<?php echo e(old('Rut')); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                            
                            <div class="mb-3 text-center">
                                <small>Si no está registrado, haga clic en el botón "Registrarme"</small>
                            </div>
                            
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Login</button>
                                <a href="<?php echo e(route('registro.create')); ?>" class="btn btn-secondary">Registrarme</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html><?php /**PATH C:\Users\user\Documents\GitHub\TSI-Tienda\Project-Shop\Project-laravel-TSI\resources\views/login/index.blade.php ENDPATH**/ ?>