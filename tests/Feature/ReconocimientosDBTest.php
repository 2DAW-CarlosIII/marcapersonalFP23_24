<?php

namespace Tests\Feature;


use App\Models\Reconocimiento;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReconocimientosDBTest extends TestCase
{
    use RefreshDatabase;

    // genera un test que inserte un proyecto en la base de datos, atendiendo a la migración.
    // posteriormente, debe comprobar que el proyecto se ha insertado correctamente.
    // finalmente, debe eliminar el proyecto de la base de datos y comprobar que se ha eliminado correctamente.
    public function test_reconocimiento(): void
    {
        $this->seed();

        $reconocimiento1 = new Reconocimiento();
        $reconocimiento1->estudiante_id = 11;
        $reconocimiento1->actividad_id = 11;
        $reconocimiento1->documento = 'https://drive.google.com/document/d/prueba139330';
        $reconocimiento1->docente_validador = 2;
        $reconocimiento1->save();

        $reconocimiento2 = new Reconocimiento();
        $reconocimiento2->estudiante_id = 12;
        $reconocimiento2->actividad_id = 12;
        $reconocimiento2->documento = 'https://drive.google.com/document/d/prueba239348';
        $reconocimiento2->docente_validador = 5;
        $reconocimiento2->save();

        // TODO
        // cuando esté creado el controlador de proyectos, se podrá utilizar la siguiente petición:
        // $response = $this->post('/proyectos', $proyecto);
        // $response->assertStatus(201);
        // mientras, lo insertamos directamente en la base de datos:

        $this->assertDatabaseHas('reconocimientos', [
            'documento' => 'https://drive.google.com/document/d/prueba139330',
        ]);


        /**
         * proyectos index test.
         */
        $response = $this->get('/reconocimiento');
        $documento = [
            'https://drive.google.com/document/d/prueba139330',
            'https://drive.google.com/document/d/prueba239348',
        ];


        /**
         * reconocimientos show test.
         */
        $response = $this->get("/reconocimientos/show/" . $reconocimiento1->id);

        $response
        ->assertStatus(200)
        ->assertViewIs('reconocimientos.show')
        ->assertSeeText('https://drive.google.com/document/d/prueba139330', $escaped = true);

        $response = $this->get("/reconocimientos/show/" . $reconocimiento2->id);

        $response
        ->assertSeeText('https://drive.google.com/document/d/prueba239348', $escaped = true);

        $response = $this->get("/reconocimientos/show/A");
        $response->assertNotFound();


        /**
         * reconocimientos create test.
         */
        $value = 'Añadir Reconocimiento';
        $response = $this->get('/reconocimientos/create');

        $response
        ->assertStatus(200)
        ->assertViewIs('reconocimientos.create')
        ->assertSeeText($value, $escaped = true);

        /**
         * proyectos edit test.
         */

        $response = $this->get("/reconocimientos/edit/" . $reconocimiento1->id);

        $response
        ->assertStatus(200)
        ->assertViewIs('reconocimientos.edit');

        $response = $this->get("/reconocimientos/edit/A");
        $response->assertNotFound();



        // TODO
        // cuando esté creado el controlador de proyectos, se podrá utilizar la siguiente petición:
        // $response = $this->delete('/proyectos/1');
        // $response->assertStatus(302);
        // mientras, lo eliminamos directamente en la base de datos:
        // busca en la base de datos al Esudiante con el id $proyecto->id y lo elimina
        $reconocimiento = Reconocimiento::find($reconocimiento1->id);
        $reconocimiento->delete();

        $this->assertDatabaseMissing('reconocimientos', [
            'documento' => 'https://drive.google.com/document/d/prueba139330',
        ]);

    }
}
