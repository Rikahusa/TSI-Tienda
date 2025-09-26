<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ajustes', function (Blueprint $table) {
            $table->smallIncrements('id_stock'); // PK Smallint
            $table->tinyInteger('id_producto')->unsigned(); // FK Producto
            $table->string('rut_usuario', 10); // FK Usuario

            $table->tinyInteger('cantidad_ajuste')->unsigned(); // Tinyint(3)
            $table->string('descripcion_ajuste', 100); // ✅ Varchar(100)
            $table->timestamp('fecha_modificacion')->useCurrent();

            // 🔗 Claves foráneas
            $table->foreign('id_producto')
                  ->references('id_producto')->on('productos')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('rut_usuario')
                  ->references('rut_usuario')->on('usuarios')
                  ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ajustes');
    }
};
