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
        Schema::create('productos', function (Blueprint $table) {
            $table->tinyIncrements('id_producto');                 // PK AUTO_INCREMENT tinyint(3)
            $table->string('nombre_producto', 60);
            $table->float('precio_producto', 8, 2);                 // float con 2 decimales
            $table->char('id_categoria', 2);                        // FK hacia categorias
            $table->string('descripcion_producto', 100);
            $table->char('estado_producto', 1);
            $table->tinyInteger('stock_real')->unsigned()->default(0);   // 0-255
            $table->tinyInteger('stock_minimo')->unsigned()->default(0); // 0-255

            // Clave foránea
            $table->foreign('id_categoria')
                  ->references('id_categoria')->on('categorias')
                  ->onUpdate('cascade')
                  ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
