<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
                'nombre' => "Coches"
            ],
            [

                'nombre' => "Motos"
            ],
            [
                'nombre' => "Motor y accesorios"
            ],
            [
                'nombre' => "Inmobiliaria"
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
                'nombre' => "Bicicletas"
            ],
            [
                'nombre' => "Consolas y videojuegos"
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
                'nombre' => "Construcción y reformas"
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
