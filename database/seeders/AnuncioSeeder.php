<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Anuncio;
use \Illuminate\Support\Facades\File;
use \Illuminate\Support\Facades\DB;

class AnuncioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $directorio = "database/data/";
        $archivos = scandir($directorio);

        // Elimina los directorios "." y ".."
        $archivos = array_diff($archivos, array(".", ".."));


        DB::table('anuncios')->delete();

        foreach($archivos as $archivo) {
            $json = File::get($directorio.$archivo);
            $data = json_decode($json);
            foreach ($data as $obj) {
                Anuncio::create(array(
                    "titulo"=>$obj->titulo,
                    "description"=>$obj->description,
                    "imagen"=>$obj->imagen,
                    "user_id"=>$obj->user_id,
                    "subcategoria_id"=>$obj->subcategoria_id,
                    "telefono"=>$obj->telefono,
                    "estado_id"=>$obj->estado_id,
                    "provincia"=>$obj->provincia,
                    "cod_postal"=>$obj->cod_postal,
                    "precio"=>$obj->precio
                
                ));
            }   
  
        }
      
    }
}
