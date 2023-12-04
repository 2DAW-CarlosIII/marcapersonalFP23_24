<?php

namespace Tests\Feature;

use App\Models\Curriculo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CurriculosDBTest extends TestCase
{
    use RefreshDatabase;

    // genera un test que inserte un proyecto en la base de datos, atendiendo a la migración.
    // posteriormente, debe comprobar que el proyecto se ha insertado correctamente.
    // finalmente, debe eliminar el proyecto de la base de datos y comprobar que se ha eliminado correctamente.
    public function test_proyecto(): void
    {
        $this->seed();

        $curriculo1 = new Curriculo();
        $curriculo1->user_id = 5;
        $curriculo1->video_curriculum = 'https://prueba.es';
        $curriculo1->texto_curriculum = 'prueba1';

        $curriculo1->save();

        $curriculo2 = new Curriculo();
        $curriculo2->user_id = 5;
        $curriculo2->video_curriculum = 'https://prueba2.es';
        $curriculo2->texto_curriculum = 'prueba2';

        $curriculo2->save();

        // TODO
        // cuando esté creado el controlador de proyectos, se podrá utilizar la siguiente petición:
        // $response = $this->post('/proyectos', $proyecto);
        // $response->assertStatus(201);
        // mientras, lo insertamos directamente en la base de datos:

        $this->assertDatabaseHas('curriculos', [
            'video_curriculum' => 'https://prueba2.es',
        ]);


        /**
         * proyectos index test.
         */
        $response = $this->get('/curriculos');
        $textos_curriculum = [
            'prueba1',
            'prueba2',
        ];


        /**
         * proyectos show test.
         */
        $response = $this->get("/curriculos/show/" . $curriculo1->id);

        $response
        ->assertStatus(200)
        ->assertViewIs('curriculos.show')
        ->assertSeeText('prueba1', $escaped = true);

        $response = $this->get("/curriculos/show/" . $curriculo2->id);

        $response
        ->assertSeeText('prueba2', $escaped = true);

        $response = $this->get("/curriculos/show/A");
        $response->assertNotFound();


        /**
         * proyectos create test.
         */
        $value = 'Añadir Currículum';
        $response = $this->get('/curriculos/create');

        $response
        ->assertStatus(200)
        ->assertViewIs('curriculos.create')
        ->assertSeeText($value, $escaped = true);

        /**
         * proyectos edit test.
         */

        $response = $this->get("/curriculos/edit/" . $curriculo1->id);

        $response
        ->assertStatus(200)
        ->assertViewIs('curriculos.edit');

        $response = $this->get("/curriculos/edit/A");
        $response->assertNotFound();



        // TODO
        // cuando esté creado el controlador de proyectos, se podrá utilizar la siguiente petición:
        // $response = $this->delete('/proyectos/1');
        // $response->assertStatus(302);
        // mientras, lo eliminamos directamente en la base de datos:
        // busca en la base de datos al Esudiante con el id $proyecto->id y lo elimina
        $proyecto = Curriculo::find($curriculo1->id);
        $proyecto->delete();

        $this->assertDatabaseMissing('curriculos', [
            'video_curriculum' => 'prueba1',
        ]);

    }
}
