<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AjusteStock extends Model
{
    use HasFactory;

    protected $table = 'ajustes';
    protected $primaryKey = 'id_stock';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false; // usamos timestamp manual

    protected $fillable = [
        'id_producto',
        'rut_usuario',
        'cantidad_ajuste',
        'descripcion_ajuste',
        'fecha_modificacion',
        'ajuste_nombre',
        'ajuste_precio',
        'ajuste_descripcion',
        'ajuste_estado',
        'ajuste_stock_real',
        'ajuste_stock_minimo',
    ];

    // Relaciones
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto', 'id_producto');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'rut_usuario', 'rut_usuario');
    }
}
