<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EncabezadoVenta extends Model
{
    use HasFactory;

    protected $table = 'encabezado_ventas';
    protected $primaryKey = 'num_venta';
    public $timestamps = false;

    protected $fillable = [
        'rut_usuario',
        'fecha_venta',
        'estado_venta',
    ];
    protected $casts = [
    'fecha_venta' => 'date',
    ];


    // Relación con detalle_ventas
    public function detalles()
    {
        return $this->hasMany(DetalleVenta::class, 'num_venta', 'num_venta');
    }
}
