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
                'nombre' => "Motor y accesorios",
                'imagen' => "/images/motor.jpg"
            ],
            [
                'nombre' => "Moda y accesorios",
                'imagen' => "/images/moda.jpg"
            ],
            [
                'nombre' => "Alquiler",
                'imagen' => "/images/piso.jpg"

            ],
            [
                'nombre' => "TV, audio y foto",
                'imagen' => "/images/tv.jpg"

            ],
            [
                'nombre' => "Móviles y telefonía",
                'imagen' => "/images/movil.jpg"

            ],
            [
                'nombre' => "Informática y electronica",
                'imagen' => "/images/portatil.jpg"

            ],
            [
                'nombre' => "Deporte y ocio",
                'imagen' => "/images/bambas.jpg"
            ],
            [
                'nombre' => "Consolas y videojuegos",
                'imagen' => "/images/juegos.jpg"
            ],
            [
                'nombre' => "Bicicletas",
                'imagen' => "/images/bicicleta.jpg"

            ],
            [
                'nombre' => "Hogar y jardín",
                'imagen' => "/images/caseta.jpg"

            ],
            [
                'nombre' => "Electrodomésticos",
                'imagen' => "/images/electrodomesticos.webp"

            ],
            [
                'nombre' => "Cine,libros y música",
                'imagen' => "/images/libros.jpg"
            ],
            [
                'nombre' => "Niños y bebes",
                'imagen' => "/images/carrito.jpg"
            ],
            [
                'nombre' => "Coleccionismo",
                'imagen' => "/images/sellos.jpg"

            ],
            [
                'nombre' => "Empleo",
                'imagen' => "/images/empleo.webp"

            ],
            [
                'nombre' => "Servicios",
                'imagen' => "/images/servicios.jpg"

            ]

        ];
        DB::table('categorias')->insert($data);
    }
}
