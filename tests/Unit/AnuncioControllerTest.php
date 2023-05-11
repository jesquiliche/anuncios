<?php

namespace Tests\Unit\Controllers;

use App\Http\Controllers\AnuncioController;
use App\Models\Anuncio;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Faker\Factory;
use Illuminate\Http\Response;


class AnuncioControllerTest extends TestCase
{
  
     /**
     * @test
     */
    public function it_returns_anuncios_in_the_index_method()
    {
    
        
        $anuncios = Anuncio::all();

        $response = $this->get(route('anuncios.index'));
        $response->assertStatus(Response::HTTP_OK);

        

       /* foreach ($anuncios as $anuncio) {
           print($anuncio->titulo);
           $response->assertSee($anuncio->titulo);
            $response->assertSee($anuncio->description);
        }
        */
    }


    /** @test */
    public function it_can_create_an_anuncio()
    {
        $this->withoutExceptionHandling();

        Storage::fake('public');

        $anuncioData = [
            'user_id'=>'1',
            'titulo' => 'Nuevo anuncio',
            'description' => 'Descripción del nuevo anuncio',
            'imagen' => UploadedFile::fake()->image('anuncio.jpg'),
            'precio' => 50.5,
            'subcategoria_id' => 1,
            'provincia' => '08',
            'codprovincia' => '28',
            'telefono'=>'3912455',
            'estado_id'=>1,
            'cod_postal'=>'08924'
        ];

        $controller = new AnuncioController();

        $response = $controller->store($this->createRequest($anuncioData));

        $anuncio = Anuncio::latest()->first();

        $this->assertEquals($anuncioData['titulo'], $anuncio->titulo);
        $this->assertEquals($anuncioData['description'], $anuncio->description);
        $this->assertEquals($anuncioData['precio'], $anuncio->precio);
        $this->assertEquals($anuncioData['subcategoria_id'], $anuncio->subcategoria_id);
        $this->assertEquals($anuncioData['provincia'], $anuncio->provincia);
         $this->assertEquals($anuncioData['cod_postal'], $anuncio->cod_postal);

      //  $response->assertRedirect(route('anuncios.show', $anuncio->id));
    }

 
    /** @test */
  
    
   
    private function createRequest(array $data): \Illuminate\Http\Request
    {
        $request = new \Illuminate\Http\Request();
        $request->replace($data);
        $request->setMethod('POST');
        return $request;
    }

    /** @test */
    public function it_can_update_an_anuncio()
    {
        // Crear un anuncio para actualizar
        $anuncio = Anuncio::latest()->first();

        // Simular una petición para actualizar el anuncio
        $newTitulo = 'Título actualizado';
        $newDescripcion = 'Descripción actualizada';
        $newImagen = 'prueba';
        $newPrecio = 600;
        $newSubcategoria = 1;
        $newProvincia = '08';
        $newCodProvincia = '08';
        $newTelefono = '3912483';

        $response = $this->put(route('anuncios.update', $anuncio->id), [
            'titulo' => $newTitulo,
            'description' => $newDescripcion,
          //  'imagen' => $newImagen,
            'precio' => $newPrecio,
            'subcategoria_id' => $newSubcategoria,
            'provincia' => $newProvincia,
            'codprovincia' => $newCodProvincia,
            'telefono' => $newTelefono,
        ]);

        // Verificar que la respuesta es correcta
       // $response->assertRedirect(route('anuncios.show', $anuncio->id));
// Crear un anuncio para actualizar
        $anuncio = Anuncio::latest()->first();

        // Verificar que el anuncio se ha actualizado correctamente en la base de datos
        $updatedAnuncio = Anuncio::findOrFail($anuncio->id);
        $this->assertEquals($newTitulo, $updatedAnuncio->titulo);
        $this->assertEquals($newDescripcion, $updatedAnuncio->description);
       // $this->assertNotNull($updatedAnuncio->imagen);
       // Storage::disk('local')->assertExists($updatedAnuncio->imagen);
        $this->assertEquals($newPrecio, $updatedAnuncio->precio);
        $this->assertEquals($newSubcategoria, $updatedAnuncio->subcategoria->id);
        $this->assertEquals($newProvincia, $updatedAnuncio->provincia);
     //   $this->assertEquals($newCodProvincia, $updatedAnuncio->codprovincia);
        $this->assertEquals($newTelefono, $updatedAnuncio->telefono);
    }
}