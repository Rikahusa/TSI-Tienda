<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    // ✅ Nombre exacto de la tabla (minúsculas)
    protected $table = 'carrito';

    // ⚠️ La PK es compuesta (rut_usuario + id_producto), Laravel no la maneja nativamente
    protected $primaryKey = null;
    public $incrementing = false;

    // ✅ No usamos created_at / updated_at
    public $timestamps = false;

    // ✅ Campos permitidos para asignación masiva
    protected $fillable = [
        'rut_usuario',
        'id_producto',
        'cantidad_item'
    ];

    // ✅ Casting para que cantidad sea int
    protected $casts = [
        'cantidad_item' => 'integer'
    ];

    // 🔗 Relaciones
    public function usuario()
    {
        // FK rut_usuario → usuarios.rut_usuario
        return $this->belongsTo(Usuario::class, 'rut_usuario', 'rut_usuario');
    }

    public function producto()
    {
        // FK id_producto → productos.id_producto
        return $this->belongsTo(Producto::class, 'id_producto', 'id_producto');
    }

    // ✅ Subtotal calculado
    public function getSubtotalAttribute()
    {
        return $this->producto
            ? $this->producto->precio_producto * $this->cantidad_item
            : 0;
    }
}
