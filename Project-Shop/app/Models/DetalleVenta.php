<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;

    protected $table = 'detalle_ventas';
    public $incrementing = false; // porque la PK es compuesta
    public $timestamps = false;

    protected $fillable = [
        'num_venta',
        'id_producto',
        'cantidad_item',
        'precio',
    ];

    // Relación con producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto', 'id_producto');
    }
}
