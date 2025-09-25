<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    // Especificar el nombre de la tabla (opcional si sigue convención)
    protected $table = 'categorias';

    // Especificar la clave primaria
    protected $primaryKey = 'Id_Categoria';

    // Indicar que la clave primaria NO es autoincremental
    public $incrementing = false;

    // Especificar el tipo de la clave primaria (string porque es char(2))
    protected $keyType = 'string';

    // Mantener timestamps (created_at y updated_at)
    public $timestamps = true;

    // Campos que se pueden llenar masivamente
    protected $fillable = [
        'Id_Categoria',
        'Nombre_Categoria', 
        'Estado_Categoria'
    ];

    // Casts para los atributos
    protected $casts = [
        'Estado_Categoria' => 'string' // E s char(1) pero lo manejamos como string
    ];

    /**
     * Relación: Una categoría tiene muchos productos
     */
    public function productos()
    {
        return $this->hasMany(Producto::class, 'idCategoria', 'Id_Categoria');
    }

    /**
     * Método para verificar si la categoría está activa
     */
    public function estaActiva()
    {
        return $this->Estado_Categoria === 'A';
    }

    /**
     * Método para activar la categoría
     */
    public function activar()
    {
        $this->update(['Estado_Categoria' => 'A']);
    }

    /**
     * Método para desactivar la categoría
     */
    public function desactivar()
    {
        $this->update(['Estado_Categoria' => 'I']);
    }
}