<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatalogoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('productos')->insert([
            // ---- CATEGORÍA VESTIDOS (Id_Categoria = 3) ----
            [
                'Nombre_Producto'      => 'Gorro de Lana',
                'Descripcion_Producto' => 'Gorro tejido a mano, ideal para el invierno.',
                'Precio_Producto'      => 9990,
                'Id_Categoria'         => 3, // 👈 ajusta este ID real
                'Estado_Producto'      => 'A',
                'Stock_Minimo'         => 1,
                'Stock_Real'           => 10,
            ],
            [
                'Nombre_Producto'      => 'Llaveros de Lana',
                'Descripcion_Producto' => 'Pequeños llaveros tejidos, varios colores y diseños.',
                'Precio_Producto'      => 4990,
                'Id_Categoria'         => 3,
                'Estado_Producto'      => 'A',
                'Stock_Minimo'         => 1,
                'Stock_Real'           => 10,
            ],

            // ---- CATEGORÍA FIESTA (Id_Categoria = 2) ----
            [
                'Nombre_Producto'      => 'Regalo Sorpresa',
                'Descripcion_Producto' => 'Caja de regalo sorpresa para cumpleaños y eventos especiales.',
                'Precio_Producto'      => 23990,
                'Id_Categoria'         => 2, // 👈 ajusta este ID real
                'Estado_Producto'      => 'A',
                'Stock_Minimo'         => 1,
                'Stock_Real'           => 10,
            ],
            [
                'Nombre_Producto'      => 'Pack Fiesta Infantil',
                'Descripcion_Producto' => 'Decoración y accesorios para fiestas de niños.',
                'Precio_Producto'      => 18990,
                'Id_Categoria'         => 2,
                'Estado_Producto'      => 'A',
                'Stock_Minimo'         => 1,
                'Stock_Real'           => 10,
            ],
        ]);
    }
}
