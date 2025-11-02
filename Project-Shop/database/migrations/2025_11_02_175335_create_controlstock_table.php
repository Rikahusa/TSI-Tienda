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
        Schema::create('controlstock', function (Blueprint $table) {
            $table->id('id_stock'); // PK autoincremental

            // Relación con productos (debe ser unsigned tinyInteger para coincidir con productos.id_producto)
            $table->tinyInteger('id_producto')->unsigned();

            $table->tinyInteger('stock_antiguo')->unsigned(); // antiguo stock
            $table->tinyInteger('stock_real')->unsigned();    // nuevo stock
            $table->string('motivo', 255);                    // motivo del ajuste
            $table->timestamp('fecha_modificacion')->useCurrent();

            // Clave foránea hacia productos
            $table->foreign('id_producto')
                  ->references('id_producto')->on('productos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('controlstock');
    }
};
