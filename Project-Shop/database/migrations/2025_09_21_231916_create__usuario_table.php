<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('_usuarios', function (Blueprint $table) {
            
            $table->string('Rut_Usuario', 10)->primary();
            $table->string('Nombre_Usuario', 30);
            $table->string('Apellido_Usuario', 30);
            $table->string('Dirección_Usuario', 30);
            $table->string('Correo_Usuario', 30);
            $table->string('Teléfono_Usuario', 12);
            $table->string('Pass_Usuario', 255);
            $table->char('Tipo_Usuario', 1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_usuario');
    }
};
