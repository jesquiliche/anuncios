<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use App\Models\User;



class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Creamos tres usuarios de ejemplo
        User::create([
            'name' => 'Jesús Quintana Esquiliche',
            'email' => 'jesquiliche@gmail.com',
            'password' => Hash::make('3912481Bb'),
        ]);

        User::create([
            'name' => 'Jesús Quintana',
            'email' => 'jesquiliche@hotmail.com',
            'password' => Hash::make('3912481Bb'),
        ]);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@pruebas.com',
            'password' => Hash::make('password123'),
        ]);
        
       User::factory(10)->create();
       
        

       
    }
}
