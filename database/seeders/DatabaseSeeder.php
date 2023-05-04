<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(CategoriaSeeder::class);
        
        $this->call(SubcategoriaSeeder::class);
    
        $this->call(ProvinciaSeeder::class);
        $this->call(PoblacionSeeder::class);
        $this->call(EstadoSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AnuncioSeeder::class);
        
    

    }
}
