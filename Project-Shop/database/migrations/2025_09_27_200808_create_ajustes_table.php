<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ajustes', function (Blueprint $table) {
            $table->bigIncrements('id_ajuste');
            $table->tinyInteger('id_producto')->unsigned(); // 👈 Igual que productos
            $table->string('rut_usuario', 10);
            $table->integer('cantidad_ajuste');
            $table->string('descripcion_ajuste', 255)->nullable();
            $table->decimal('ajuste_precio', 8, 2)->nullable();
            $table->string('ajuste_nombre', 60)->nullable();
            $table->char('ajuste_categoria', 2)->nullable();
            $table->char('ajuste_estado', 1);
            $table->timestamp('fecha_modificacion');

            // 🔑 Foreign Keys
            $table->foreign('id_producto')
                ->references('id_producto')->on('productos')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('rut_usuario')
                ->references('rut_usuario')->on('usuarios')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ajustes');
    }
};
