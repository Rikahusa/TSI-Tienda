<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    //tabla y llave primaria
    protected $table = 'categorias';
    protected $primaryKey = 'Id_Categoria';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;

    //campos
    protected $fillable = [
        'Id_Categoria',
        'Nombre_Categoria', 
        'Estado_Categoria'
    ];

    //casts
    protected $casts = [
        'Estado_Categoria' => 'string' //   es char(1) pero lo manejamos como string *Bryan
    ];

    //relacion
    public function productos()
    {
        return $this->hasMany(Producto::class, 'idCategoria', 'Id_Categoria');
    }

    //metodos activos e inactivos
    public function estaActiva()
    {
        return $this->Estado_Categoria === 'A';
    }

    //mas de lo mismo
    public function activar()
    {
        $this->update(['Estado_Categoria' => 'A']);
    }

    //mas de lo mismo
    public function desactivar()
    {
        $this->update(['Estado_Categoria' => 'I']);
    }
}