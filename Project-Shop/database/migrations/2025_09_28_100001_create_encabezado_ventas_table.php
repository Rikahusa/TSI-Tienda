<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('encabezado_ventas', function (Blueprint $table) {
            $table->tinyIncrements('num_venta');  // PK, tinyint
            $table->string('rut_usuario', 10);    // FK hacia usuarios
            $table->date('fecha_venta');
            $table->char('estado_venta', 1);

            $table->foreign('rut_usuario')
                  ->references('rut_usuario')
                  ->on('usuarios')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('encabezado_ventas');
    }
};
