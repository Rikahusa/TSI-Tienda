<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background: url('images/fondo.jpg') center/cover no-repeat fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 20px 0;
        }
        
        .img-container {
            padding: 0;
            display: flex;
            align-items: stretch;
        }
        
        .img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .card {
            overflow: hidden;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow">
                    <div class="row g-0 h-100">
                        <div class="col-md-5 img-container">
                            <img src="{{ asset('images/HD.png') }}" alt="Imagen de ejemplo" class="img-fluid rounded-start">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body p-4"> 
                                <!-- Mostrar mensajes de éxito/error -->
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                
                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <h4 class="card-title mb-4">Registro de Usuario</h4>
                                
                                <form method="POST" action="{{ route('registro.store') }}">
                                    @csrf
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="nombre" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="apellido" class="form-label">Apellido</label>
                                            <input type="text" class="form-control" id="apellido" name="apellido" value="{{ old('apellido') }}" required>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="direccion" class="form-label">Dirección</label>
                                        <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion') }}" required>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="correo" class="form-label">Correo electrónico</label>
                                            <input type="email" class="form-control" id="correo" name="correo" value="{{ old('correo') }}" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="telefono" class="form-label">Teléfono</label>
                                            <input type="tel" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}" required>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="nuevoRut" class="form-label">Rut Usuario</label>
                                        <input type="text" class="form-control" id="nuevoRut" name="nuevoRut" value="{{ old('nuevoRut') }}" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="nuevaContraseña" class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" name="nuevaContraseña" id="nuevaContraseña" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Tipo de usuario</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="rol" id="flexRadioDefault1" value="Admin" 
                                                @if(old('rol') == 'Admin') checked @endif>
                                            <label class="form-check-label" for="flexRadioDefault1">Administrador</label>
                                        </div>  
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="rol" id="flexRadioDefault2" value="Usuario" 
                                                @if(old('rol') == 'Usuario' || empty(old('rol'))) checked @endif>
                                            <label class="form-check-label" for="flexRadioDefault2">Usuario</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="rol" id="flexRadioDefault3" value="Empleado" 
                                                @if(old('rol') == 'Empleado') checked @endif>
                                            <label class="form-check-label" for="flexRadioDefault3">Empleado</label>
                                        </div>
                                    </div>
                                    
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-success">Registrarse</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>