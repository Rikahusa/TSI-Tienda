@extends('layouts.master')

@section('contenido-principal')
<div class="container my-5">
    <div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h1 class="text-centercard-title mb-0">Detalles de las ventas</h1>
    </div>

        <div class="card-body">

            {{-- MENSAJES DE ERROR GLOBALES --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table id="tabla-ventas" class="table table-striped table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%">#</th>

                            <th width="20%" class="sortable" data-col="rut_usuario" style="cursor:pointer;">
                                Rut del comprador
                                <i class="bi bi-arrow-down-up ms-1"></i>
                            </th>

                            <th width="25%" class="sortable" data-col="num_venta" style="cursor:pointer;">
                                Número del Pedido
                                <i class="bi bi-arrow-down-up ms-1"></i>
                            </th>

                            <th width="25%" class="sortable" data-col="total_venta" style="cursor:pointer;">
                                Precio Total
                                <i class="bi bi-arrow-down-up ms-1"></i>
                            </th>

                            <th width="25%" class="sortable" data-col="fecha_venta" style="cursor:pointer;">
                                Fecha del Pedido
                                <i class="bi bi-arrow-down-up ms-1"></i>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($ventas as $venta)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td data-col="rut_usuario">{{ $venta->rut_usuario }}</td>
                                <td data-col="num_venta">{{ $venta->num_venta }}</td>
                                <td data-col="total_venta">{{ $venta->total_venta }}</td>
                                <td data-col="fecha_venta">
                                    {{ \Carbon\Carbon::parse($venta->fecha_venta)->format('d-m-Y') }}
                                </td>
                            </tr>

                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No existen ventas disponibles.</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<footer class="bg-dark text-white text-center py-3 mt-5">
    <p>&copy; 2025 Vivi Luna. Todos los derechos reservados.</p>
    <p>Desarrollado por <a href="#" class="text-white">Alvarado-Espinoza</a></p>
</footer>

{{-- SCRIPT PARA ORDENAR --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    const table = document.getElementById('tabla-ventas');
    const headers = table.querySelectorAll('.sortable');
    let sortDirection = 1; // 1 ascendente, -1 descendente
    let activeColumn = null;

    headers.forEach(header => {
        header.addEventListener('click', function () {

            const col = this.getAttribute('data-col');
            const icon = this.querySelector('i');

            if (activeColumn === col) {
                sortDirection *= -1;
            } else {
                sortDirection = 1;
                activeColumn = col;
            }

            // Resetear iconos
            headers.forEach(h => h.querySelector('i').className = 'bi bi-arrow-down-up ms-1');

            // Icono asc / desc
            icon.className = sortDirection === 1
                ? 'bi bi-arrow-down-short ms-1'
                : 'bi bi-arrow-up-short ms-1';

            const rows = Array.from(table.querySelector('tbody').querySelectorAll('tr'));

            rows.sort((a, b) => {
                let A = a.querySelector(`[data-col="${col}"]`).innerText.trim();
                let B = b.querySelector(`[data-col="${col}"]`).innerText.trim();

                // Detectar números
                if (!isNaN(A) && !isNaN(B)) {
                    return sortDirection * (Number(A) - Number(B));
                }

                // Detectar fechas (dd-mm-yyyy)
                const dateRegex = /^\d{2}-\d{2}-\d{4}$/;
                if (dateRegex.test(A) && dateRegex.test(B)) {
                    const dateA = new Date(A.split('-').reverse().join('-'));
                    const dateB = new Date(B.split('-').reverse().join('-'));
                    return sortDirection * (dateA - dateB);
                }

                // Texto normal
                return sortDirection * A.localeCompare(B);
            });

            // Insertar filas ordenadas
            const tbody = table.querySelector('tbody');
            rows.forEach(row => tbody.appendChild(row));
        });
    });
});
</script>

@endsection
