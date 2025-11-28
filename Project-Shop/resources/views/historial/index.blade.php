@extends('layouts.master')

@section('contenido-principal')
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h1 class="card-title text-center mb-0">Historial de Compras</h1>
        </div>

        <div class="card-body">
            @if($ventas->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th width="10%">Número</th>
                                <th width="20%">Fecha</th>
                                <th width="20%">Estado</th>
                                <th width="20%">Total</th>
                                <th width="10%">Acciones</th>
                            </tr>
                        </thead>

                        <tbody class="table-group-divider">
                            @foreach($ventas as $venta)
                                @php
                                    // TOTAL REAL basado en los detalles
                                    $total = $venta->detalles->sum(function($d){
                                        return $d->cantidad_item * $d->producto->precio_producto;
                                    });

                                    // TEXTO DEL ESTADO
                                    $estadoTexto = match($venta->estado_venta) {
                                        'P' => 'Pendiente',
                                        'C' => 'Concretada',
                                        'X' => 'Rechazada',
                                        default => 'Desconocido'
                                    };

                                    // COLOR DEL ESTADO
                                    $estadoColor = match($venta->estado_venta) {
                                        'P' => 'warning',
                                        'C' => 'success',
                                        'X' => 'danger',
                                        default => 'secondary'
                                    };
                                @endphp

                                <tr>
                                    <td class="text-center">{{ $venta->num_venta }}</td>

                                    <td>
                                        {{ $venta->fecha_venta?->format('d/m/Y') ?? 'Sin fecha' }}
                                    </td>

                                    <td class="text-center">
                                        <span class="badge bg-{{ $estadoColor }}">
                                            {{ $estadoTexto }}
                                        </span>
                                    </td>

                                    <td>
                                        ${{ number_format($total, 0, ',', '.') }}
                                    </td>

                                    <td class="text-center">
                                        <a href="{{ route('pedido.confirmacion', $venta->num_venta) }}"
                                           class="btn btn-sm btn-outline-primary">
                                            Ver Detalles
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-5">
                    <h4 class="text-muted">No tienes compras registradas</h4>
                    <p class="text-muted">Cuando compres algo aparecerán aquí 😄</p>
                    <a href="{{ url('/productos') }}" class="btn btn-primary">
                        Ver Productos
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
