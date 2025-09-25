<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $primaryKey = 'Id_Producto';
    public $incrementing = false; // Importante porque no es autoincremental
    protected $keyType = 'string'; // Porque es char(2)
    public $timestamps = true;

    protected $fillable = [
        'Id_Producto',
        'Nombre_Producto',
        'Precio_Producto',
        'Id_Categoria',
        'Descripcion_Producto',
        'Estado_Producto',
        'Stock_Real',
        'Stock_Minimo'
    ];

    protected $casts = [
        'Precio_Producto' => 'float',
        'Stock_Real' => 'integer',
        'Stock_Minimo' => 'integer',
        'Estado_Producto' => 'string'
    ];

    /**
     * Relación: Un producto pertenece a una categoría
     */
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'Id_Categoria', 'Id_Categoria');
    }

    /**
     * Relación: Un producto puede estar en muchos carritos
     */
    public function carritos()
    {
        return $this->hasMany(Carrito::class, 'idProducto', 'Id_Producto');
    }

    /**
     * Verificar si el producto está activo
     */
    public function estaActivo()
    {
        return $this->Estado_Producto === 'A';
    }

    /**
     * Verificar si hay stock disponible
     */
    public function tieneStock()
    {
        return $this->Stock_Real > 0;
    }

    /**
     * Verificar si el stock está bajo el mínimo
     */
    public function stockBajo()
    {
        return $this->Stock_Real <= $this->Stock_Minimo;
    }
}   