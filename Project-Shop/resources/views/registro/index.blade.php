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
        
        .btn-group-responsive {
            display: flex;
            gap: 10px;
        }
        
        @media (max-width: 576px) {
            .btn-group-responsive {
                flex-direction: column;
            }
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
                                            <input type="text" class="form-control" id="nombre" name="nombre" maxlength="30" value="{{ old('nombre') }}" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="apellido" class="form-label">Apellido</label>
                                            <input type="text" class="form-control" id="apellido" name="apellido" maxlength="30" value="{{ old('apellido') }}" required>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="direccion" class="form-label">Dirección</label>
                                        <input type="text" class="form-control" id="direccion" name="direccion" maxlength="50" value="{{ old('direccion') }}" required>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="correo" class="form-label">Correo electrónico</label>
                                            <input type="email" class="form-control" id="correo" name="correo" placeholder="ejemplo@gmail.com" maxlength="30" value="{{ old('correo') }}" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="telefono" class="form-label">Teléfono</label>
                                            <input type="tel" class="form-control" id="telefono" name="telefono" 
                                            placeholder="954785412" maxlength="9" value="{{ old('telefono') }}" required>
                                        </div>
                                    </div>
                                    
                                    <script>
                                        document.getElementById("telefono").addEventListener("blur", function() {
                                            let valor = this.value.trim();

                                            // Solo permitir números y exactamente 9 dígitos
                                            if (!/^\d{9}$/.test(valor)) {
                                                this.value = ""; // Vaciar campo si no son 9 dígitos
                                                return;
                                            }

                                            // Agregar +56 automáticamente
                                            this.value = "+56" + valor;
                                        });
                                    </script>

                                    <div class="mb-3">
                                        <label for="nuevoRut" class="form-label">Rut Usuario</label>
                                        <input type="text" class="form-control" id="nuevoRut" name="nuevoRut" placeholder="Ej: 123456789K" autocomplete="off" required maxlength="9" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="nuevaContraseña" class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" name="nuevaContraseña" id="nuevaContraseña" maxlength="30" autocomplete="off" required>
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
                                    </div>
                                    
                                    <div class="d-grid gap-2 d-md-flex">
                                        <button type="submit" class="btn btn-success me-md-2 flex-fill">Registrarse</button>
                                        <a href="{{ url('/login') }}" class="btn btn-outline-secondary flex-fill">Volver al login</a>
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
    <script>
    function validarRut(rutCompleto) {
        rutCompleto = rutCompleto.replace(/^0+|[^0-9kK]+/g, ''); // Eliminar ceros iniciales y caracteres no válidos
        if (rutCompleto.length < 2) return false;

        const cuerpo = rutCompleto.slice(0, -1);
        const dv = rutCompleto.slice(-1).toUpperCase();

        let suma = 0;
        let multiplo = 2;

        // Calcular módulo 11
        for (let i = cuerpo.length - 1; i >= 0; i--) {
            suma += parseInt(cuerpo.charAt(i)) * multiplo;
            multiplo = multiplo < 7 ? multiplo + 1 : 2;
        }

        const resto = suma % 11;
        const dvEsperado = resto === 1 ? 'K' : resto === 0 ? '0' : (11 - resto).toString();

        return dv === dvEsperado;
    }

    // Validar al perder el foco del campo
    document.getElementById("nuevoRut").addEventListener("blur", function() {
        const rutInput = this.value.trim().toUpperCase();

        if (!validarRut(rutInput)) {
            this.classList.add("is-invalid");
            this.classList.remove("is-valid");
            alert("RUT inválido. Verifica el número y el dígito verificador.");
        } else {
            this.classList.remove("is-invalid");
            this.classList.add("is-valid");
        }
    });
</script>

</body>
</html>