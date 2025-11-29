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
                <table class="table table-striped table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th width="5%">#</th>
                            <th width="20%">Rut del comprador</th>
                            <th width="25%" style="cursor: pointer;">
                                Número del Pedido
                                <span class="ms-1">
                                    <i class="bi bi-arrow-down-up"></i>
                                </span>
                            </th>
                            <th width="25%" style="cursor: pointer;">
                                Precio Total
                                <span class="ms-1">
                                    <i class="bi bi-arrow-down-up"></i>
                                </span>
                            </th>
                            <th width="25%" style="cursor: pointer;">
                                Fecha del Pedido
                                <span class="ms-1">
                                    <i class="bi bi-arrow-down-up"></i>
                                </span>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($ventas as $venta)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $venta->rut_usuario }}</td>

                                {{-- Número de venta --}}
                                <td>{{ $venta->num_venta }}</td>

                                {{-- Total --}}
                                <td>${{ number_format($venta->total_venta, 0, ',', '.') }}</td>

                                {{-- Fecha --}}
                                <td>
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
@endsection
