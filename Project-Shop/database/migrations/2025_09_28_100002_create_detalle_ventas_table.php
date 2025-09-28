<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->tinyInteger('num_venta')->unsigned();      // FK hacia encabezado_ventas
            $table->tinyInteger('id_producto')->unsigned();    // FK hacia productos
            $table->tinyInteger('cantidad_item')->unsigned();
            $table->float('precio', 8, 2);

            $table->primary(['num_venta', 'id_producto']); // PK compuesta

            $table->foreign('num_venta')
                  ->references('num_venta')
                  ->on('encabezado_ventas')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('id_producto')
                  ->references('id_producto')
                  ->on('productos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalle_ventas');
    }
};
