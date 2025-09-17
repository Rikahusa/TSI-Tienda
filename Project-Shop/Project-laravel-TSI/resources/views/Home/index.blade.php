<!DOCTYPE html>
<html lang="en">
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
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center">
        <div class="card" style="max-width: 1000px;">
            <div class="row g-0">
                <div class="col-md-6">
                    <img src="images/polera_lana.jpg" alt="Imagen de ejemplo" class="img-fluid" style="object-fit: cover; height: 100%;">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <form>
                            <div class="mb-3">
                                <label for="usuario" class="form-label">Nombre de usuario</label>
                                <input type="text" class="form-control" id="usuario" name="nombre">
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
                        <form>
                            <h5>REGISTRESE AQUI:</h5>
                            <div class="mb-3">
                                <label for="nuevoUsuario" class="form-label">Nombre de usuario</label>
                                <input type="text" class="form-control" id="nuevoUsuario" name="nombre">
                            </div>
                            <div class="mb-3">
                                <label for="nuevaContraseña" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" name="password" id="nuevaContraseña">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="rol" id="flexRadioDefault1" value="Admin">
                                <label class="form-check-label" for="flexRadioDefault1">Administrador</label>
                            </div>  
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="rol" id="flexRadioDefault2" value="Usuario" checked>
                                <label class="form-check-label" for="flexRadioDefault2">Usuario</label>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <button type="submit" class="btn btn-primary">Registrarse</button>
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
