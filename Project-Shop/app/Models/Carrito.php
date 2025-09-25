<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    protected $table = 'carritos';

    /**
     * ⚠️ Importante:
     * La tabla no tiene una clave primaria numérica, 
     * por eso desactivamos la PK e incrementing.
     */
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = true;

    protected $fillable = [
        'Rut_Usuario',
        'Id_Producto',
        'Cantidad_Item'
    ];

    protected $casts = [
        'Cantidad_Item' => 'integer'
    ];

    /**
     * Relación: Un item del carrito pertenece a un usuario
     */
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'Rut_Usuario', 'Rut_Usuario');
    }

    /**
     * Relación: Un item del carrito pertenece a un producto
     */
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'Id_Producto', 'Id_Producto');
    }

    /**
     * Calcular subtotal del item
     */
    public function getSubtotalAttribute()
    {
        return $this->producto
            ? $this->producto->Precio_Producto * $this->Cantidad_Item
            : 0;
    }
}
