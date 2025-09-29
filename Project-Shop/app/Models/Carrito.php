<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;

    protected $table = 'carrito'; // nombre de la tabla *Bryan

    //(rut_usuario + id_producto)
    protected $primaryKey = null; // esta null para decir que hay mas de una clave primaria *Bryan
    public $incrementing = false; 
    public $timestamps = false;

    protected $fillable = [
        'rut_usuario',
        'id_producto',
        'cantidad_item'
    ];

    
    protected $casts = [ //convierte los valores de  de la bd a un tipo especifico
        'cantidad_item' => 'integer'
    ];

    //Relaciones
    public function usuario()
    {
        
        return $this->belongsTo(Usuario::class, 'rut_usuario', 'rut_usuario');
    }

    public function producto()
    {
        
        return $this->belongsTo(Producto::class, 'id_producto', 'id_producto');
    }

    
    public function getSubtotalAttribute() //funcion para calcular el subtotal *Bryan
    {
        return $this->producto
            ? $this->producto->precio_producto * $this->cantidad_item //este producto multiplicamelo x la cantidad de items y si no hay nada muestra 0 *Bryan
            : 0;
    }
}
