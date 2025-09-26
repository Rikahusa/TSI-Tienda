<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('productos')->insert([
            [
                'nombre_producto'     => 'Amigurumi del reino Fungi',
                'descripcion_producto'=> 'Amigurumi del reino Fungi.',
                'precio_producto'     => 13990,
                'stock_real'          => 10,
                'stock_minimo'        => 1,
                'estado_producto'     => 'A',
                'id_categoria'        => '1',
            ],
            [
                'nombre_producto'     => 'Amigurumi de Flippy',
                'descripcion_producto'=> 'Amigurumi inspirados en la mascota de golosinas "Flippy".',
                'precio_producto'     => 12990,
                'stock_real'          => 10,
                'stock_minimo'        => 1,
                'estado_producto'     => 'A',
                'id_categoria'        => '1',
            ],
            [
                'nombre_producto'     => 'Amigurumi de Baby Groot',
                'descripcion_producto'=> 'Amigurumi de Guardianes de la Galaxia.',
                'precio_producto'     => 12990,
                'stock_real'          => 10,
                'stock_minimo'        => 1,
                'estado_producto'     => 'A',
                'id_categoria'        => '1',
            ],
            [
                'nombre_producto'     => 'Amigurumi de Fiu',
                'descripcion_producto'=> 'Amigurumi de la mascota de los Juegos Panamericanos 2023.',
                'precio_producto'     => 12990,
                'stock_real'          => 10,
                'stock_minimo'        => 1,
                'estado_producto'     => 'A',
                'id_categoria'        => '1',
            ],
            [
                'nombre_producto'     => 'Amigurumi de Capuccino Asesino',
                'descripcion_producto'=> 'Amigurumi de la serie de personajes IA de brainrot Italiano.',
                'precio_producto'     => 12990,
                'stock_real'          => 10,
                'stock_minimo'        => 1,
                'estado_producto'     => 'A',
                'id_categoria'        => '1',
            ],
            [
                'nombre_producto'     => 'Amigurumi de Tralalero Tralala',
                'descripcion_producto'=> 'Amigurumi de la serie de personajes IA de brainrot Italiano.',
                'precio_producto'     => 12990,
                'stock_real'          => 10,
                'stock_minimo'        => 1,
                'estado_producto'     => 'A',
                'id_categoria'        => '1',
            ],
        ]);
    }
}
