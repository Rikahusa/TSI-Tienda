<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            // ⚡ Campos principales
            $table->string('rut_usuario', 10)->primary();       // PK
            $table->string('nombre_usuario', 30);
            $table->string('apellido_usuario', 30);
            $table->string('direccion_usuario', 50);
            $table->string('correo_usuario', 30)->unique();     // correo único
            $table->string('telefono_usuario', 12);
            $table->string('pass_usuario', 255);                 // contraseña
            $table->char('tipo_usuario', 1);                    // A=Admin, U=Usuario, E=Empleado

            //$table->timestamps(); // created_at & updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
