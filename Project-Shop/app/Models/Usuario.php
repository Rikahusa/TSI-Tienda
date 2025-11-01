<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    //tabla y llave primaria
    protected $table = 'usuarios'; // nombre de la tabla -Ivan
    protected $primaryKey = 'rut_usuario'; // clave de la tabla - Ivan
    public $incrementing = false; // PK no incremental
    protected $keyType = 'string'; // tipo de dato de la clave primaria como en el informe -Ivan
    public $timestamps = false;  //Lo deje apagado porque en el informe dejamos la tabla sin timestamps -Ivan

    //campos
    protected $fillable = [   // estos son los campos  de nuestra tabla -Ivan
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
    protected $hidden = [  // campos que no quiero que se vean dependiendo del tipo de ususario -Ivan
        'pass_usuario',
    ];

    //Campo de la autenticar contraseña
    public function getAuthPassword()  // Decimos cual es el campo que sera la contraseña -Ivan
    {
        return $this->pass_usuario;
    }
}
