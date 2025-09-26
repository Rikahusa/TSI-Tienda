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
        Schema::create('carrito', function (Blueprint $table) {
            // Columnas
            $table->string('rut_usuario', 10);
            $table->tinyInteger('id_producto')->unsigned();
            $table->tinyInteger('cantidad_item')->unsigned();

            // 🔑 Clave primaria compuesta
            $table->primary(['rut_usuario', 'id_producto']);

            // 🔗 Relaciones
            $table->foreign('rut_usuario')
                  ->references('rut_usuario')
                  ->on('usuarios')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('id_producto')
                  ->references('id_producto')
                  ->on('productos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrito');
    }
};
