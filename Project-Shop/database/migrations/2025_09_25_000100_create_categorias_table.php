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
        Schema::create('categorias', function (Blueprint $table) {
            $table->char('id_categoria', 2)->primary();           // PK: char(2)
            $table->string('nombre_categoria', 30);               // varchar(30)
            $table->char('estado_categoria', 1);                  // char(1) - A=Activo, I=Inactivo

            // Si no necesitas timestamps según el informe, puedes comentarlos:
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
