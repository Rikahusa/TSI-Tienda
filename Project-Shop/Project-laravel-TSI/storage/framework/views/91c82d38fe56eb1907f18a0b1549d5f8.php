<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
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
        .form-section {
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center">
        <div class="card" style="max-width: 1000px;">
            <div class="row g-0">
                <div class="col-md-6">
                    <img src="images/HD.png" alt="Imagen de ejemplo" class="img-fluid" style="object-fit: cover; height: 100%;">
                </div>
                <div class="col-md-6">
                    <!-- Formulario de Login -->
                    <div class="card-body form-section">
                        <form>

                             <div class="mb-3">
                                <label for="Rut" class="form-label">Rut Usuario</label>
                                <input type="text" class="form-control" id="Rut" name="Rut" required>
                            </div>

                            <div class="mb-3">
                                <label for="usuario" class="form-label">Nombre de usuario</label>
                                <input type="text" class="form-control" id="usuario" name="nombre">
                            </div>
                            <div class="mb-3">
                                <label for="contraseña" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" name="password" id="contraseña">
                            </div>
                            
                            <!-- Mensaje de registro y botón -->
                            <div class="mb-3 text-center">
                                <small>Si no se ha registrado, haga clic en el botón "Registrarme"</small>
                            </div>
                            
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Login</button>
                                <button type="button" class="btn btn-secondary">Registrarme</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html><?php /**PATH C:\Users\user\Documents\GitHub\TSI-Tienda\Project-Shop\Project-laravel-TSI\resources\views/Home/index.blade.php ENDPATH**/ ?>