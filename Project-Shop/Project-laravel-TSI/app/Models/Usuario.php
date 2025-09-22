<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = '_usuarios';
    protected $primaryKey = 'Rut_Usuario';
    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'Rut_Usuario', 'Nombre_Usuario', 'Apellido_Usuario',
        'Dirección_Usuario', 'Correo_Usuario', 'Teléfono_Usuario',
        'Pass_Usuario', 'Tipo_Usuario'
    ];

        protected $hidden = [
        'Pass_Usuario',
    ];
}
