<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'categoria_id'=>10,
                'nombre' => "Accesorios de consola"
            ],
            [
                'categoria_id'=>10,
                'nombre' => "Consolas"
            ],
            [
                'categoria_id'=>10,
                'nombre' => "Manuales y guías"
            ],
            [
                'categoria_id'=>10,
                'nombre' => "Merchandising de videojuegos"
            ],
            [
                'categoria_id'=>10,
                'nombre' => "Recambios de consolas"
            ],
            [
                'categoria_id'=>10,
                'nombre' => "Otros"
            ]
        ];
        DB::table('subcategorias')->insert($data);
    }
}
