<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'nombre' => "Motor y accesorios"
            ],
            [
                'nombre' => "Moda y accesorios"
            ],
            [
                'nombre' => "Alquiler"
            ],
            [
                'nombre' => "TV, audio y foto"
            ],
            [
                'nombre' => "Móviles y telefonía"
            ],
            [
                'nombre' => "Informática y electronica"
            ],
            [
                'nombre' => "Deporte y ocio"
            ],
            [
                'nombre' => "Consolas y videojuegos"
            ],
            [
                'nombre' => "Bicicletas"
            ],
            [
                'nombre' => "Hogar y jardín"
            ],
            [
                'nombre' => "Electrodomésticos"
            ],
            [
                'nombre' => "Cine,libros y música"
            ],
            [
                'nombre' => "Niños y bebes"
            ],
            [
                'nombre' => "Coleccionismo"
            ],
            [
                'nombre' => "Empleo"
            ],
            [
                'nombre' => "Servicios"
            ]

        ];
        DB::table('categorias')->insert($data);
    }
}
