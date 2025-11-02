<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControlStock extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'controlstock';

    // Clave primaria
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    // No usamos timestamps automáticos
    public $timestamps = false;

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'id_producto',
        'stock_antiguo',
        'stock_real',
        'motivo',
        'rut_usuario',
        'fecha_modificacion'
    ];

    // Relación con Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto', 'id_producto');
    }

    // Relación con Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'rut_usuario', 'rut_usuario');
    }
}
