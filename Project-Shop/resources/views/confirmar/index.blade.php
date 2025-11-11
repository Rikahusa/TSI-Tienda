@extends('layouts.master')

@section('contenido-principal')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-white">
                    <div class="venta-card p-3">
                        <div class="venta-section mb-3">
                            <div class="row text-center fw-bold">
                                <div class="col-md-6 border-end">NUM_VENTA</div>
                                <div class="col-md-6">RUT USUARIO (el del carrito)</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="venta-section mb-3 text-center">
                    <p class="fw-semibold">
                        MOSTRAR SUS PRODUCTOS
                    </p>
                    <p class="text-end me-3">
                        <strong>
                            mostrar total
                        </strong>
                    </p>
                </div>
                <div class="venta-section text-center">
                    <div class="row align-items-center">
                        <div class="col-md-6 text-start ps-4 fw-semibold">
                            ESTADO_VENTA
                        </div>
                        <div class="col-md-6 text-end pe-4">
                            <p class="text-danger fw-bold mb-2">¿Concretar venta?</p>
                                    <button class="btn btn-si me-2">Sí</button>
                                    <button class="btn btn-no">No</button>
                                </div>
                            </div>
                        </div>
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
</script>
@endsection
