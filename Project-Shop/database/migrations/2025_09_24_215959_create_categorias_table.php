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
            $table->char('Id_Categoria', 2)->primary(); // PK char(2)
            $table->string('Nombre_Categoria', 30); // varchar(30)
            $table->char('Estado_Categoria', 1)->default('A'); // char(1) - A=Activo, I=Inactivo
            $table->timestamps(); // created_at y updated_at
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