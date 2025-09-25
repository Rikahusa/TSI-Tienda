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
            $table->char('Id_Producto', 2)->primary(); // PK char(2)
            $table->string('Nombre_Producto', 30); // varchar(30)
            $table->float('Precio_Producto'); // float
            $table->char('Id_Categoria', 2); // FK a categorias (char(2))
            $table->string('Descripcion_Producto', 60)->nullable(); // varchar(60)
            $table->char('Estado_Producto', 1)->default('A'); // A=Activo, I=Inactivo
            $table->integer('Stock_Real')->default(0); // int(3)
            $table->integer('Stock_Minimo')->default(0); // int(3)
            
            // Timestamps
            $table->timestamps();

            // Clave foránea
            $table->foreign('Id_Categoria')
                  ->references('Id_Categoria')
                  ->on('categorias')
                  ->onDelete('restrict')
                  ->onUpdate('cascade');
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