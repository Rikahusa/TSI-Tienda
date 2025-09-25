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
        Schema::create('carritos', function (Blueprint $table) {
            $table->string('Rut_Usuario', 10); // PK FK1 varchar(10)
            $table->char('Id_Producto', 2); // PK FK2 char(2)
            $table->integer('Cantidad_Item')->default(1); // int(3)
            
            // Timestamps
            $table->timestamps();

            // Clave primaria compuesta
            $table->primary(['Rut_Usuario', 'Id_Producto']);

            // Claves foráneas (CORREGIDO)
            $table->foreign('Rut_Usuario')
                  ->references('Rut_Usuario') // Coincide con tu modelo
                  ->on('_usuarios') // Nombre correcto de la tabla
                  ->onDelete('cascade')
                  ->onUpdate('cascade');

            $table->foreign('Id_Producto')
                  ->references('Id_Producto')
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
        Schema::dropIfExists('carritos');
    }
};