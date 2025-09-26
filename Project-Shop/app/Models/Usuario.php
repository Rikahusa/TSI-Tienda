<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    // Nombre exacto de la tabla
    protected $table = 'usuarios';

    // Clave primaria
    protected $primaryKey = 'rut_usuario';

    // PK no incremental
    public $incrementing = false;

    // Tipo de PK
    protected $keyType = 'string';

    public $timestamps = false;

    // Campos permitidos para asignación masiva
    protected $fillable = [
        'rut_usuario',
        'nombre_usuario',
        'apellido_usuario',
        'direccion_usuario',
        'correo_usuario',
        'telefono_usuario',
        'pass_usuario',
        'tipo_usuario',
    ];

    // Campos ocultos
    protected $hidden = [
        'pass_usuario',
        'remember_token',
    ];

    // Indicar a Laravel cuál es la contraseña
    public function getAuthPassword()
    {
        return $this->pass_usuario;
    }
}
