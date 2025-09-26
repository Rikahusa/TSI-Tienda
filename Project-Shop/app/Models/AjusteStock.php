<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AjusteStock extends Model
{
    use HasFactory;

    protected $table = 'ajuste_stock';     // Nombre exacto de la tabla
    protected $primaryKey = 'Id_Stock';    // Clave primaria
    public $incrementing = false;          // Char(2) no es autoincrement
    protected $keyType = 'string';         // Tipo string

    protected $fillable = [
        'Id_Stock',
        'Id_Producto',
        'Rut_Usuario',
        'Cantidad',
        'Descripcion',
        'fechaModificacion'
    ];

    // Relación con Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'Id_Producto', 'Id_Producto');
    }

    // Relación con Usuario (tabla _usuarios)
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'Rut_Usuario', 'Rut_Usuario');
    }
}
