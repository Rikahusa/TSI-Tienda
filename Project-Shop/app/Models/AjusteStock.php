<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AjusteStock extends Model
{
    use HasFactory;

    protected $table = 'ajustes'; // nombre de la tabla *Bryan
    protected $primaryKey = 'id_stock'; //clave primaria *Bryan
    public $incrementing = true;  //tiene que ser autoincrementada porque subira con los numeros de ajustes *Bryan
    protected $keyType = 'int';  //el tipo de dato *Bryan
    public $timestamps = false; // usamos timestamp manual *Bryan

    protected $fillable = [ //nuestros campos *Bryan
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

    // Relaciones con la tabla producto *Bryan
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto', 'id_producto');  //cada ajuste pertenece a un producto  
    }                                               
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'rut_usuario', 'rut_usuario'); //cada ajuste pertenece a un usuario, lo mismo de arriba *Bryan
    }
}
