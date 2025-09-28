<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->tinyInteger('num_venta')->unsigned();   // FK hacia encabezado_ventas
            $table->tinyInteger('num_pago')->unsigned();
            $table->string('medio_pago', 30);
            $table->float('monto', 8, 2);

            $table->primary(['num_venta', 'num_pago']); // PK compuesta

            $table->foreign('num_venta')
                  ->references('num_venta')
                  ->on('encabezado_ventas')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
