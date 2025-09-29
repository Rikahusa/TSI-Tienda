<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    public $incrementing = true;           
    protected $keyType = 'int';            
    public $timestamps = false;           

    protected $fillable = [
        'nombre_producto',
        'precio_producto',
        'id_categoria',
        'descripcion_producto',
        'estado_producto',
        'stock_real',
        'stock_minimo'
    ];

    protected $casts = [
        'precio_producto' => 'float',
        'stock_real'      => 'integer',
        'stock_minimo'    => 'integer',
        'estado_producto' => 'string'
    ];

    //Relaciones
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria', 'id_categoria');
    }

    public function carritos()
    {
        return $this->hasMany(Carrito::class, 'id_producto', 'id_producto');
    }

    // Metodos
    public function estaActivo()
    {
        return $this->estado_producto === 'A';
    }

    public function tieneStock()
    {
        return $this->stock_real > 0;
    }

    public function stockBajo()
    {
        return $this->stock_real <= $this->stock_minimo;
    }
}
