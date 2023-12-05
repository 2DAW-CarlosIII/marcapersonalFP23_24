<?php

namespace Tests\Feature;

use App\Models\Reconocimiento;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReconocimientoDBTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $this->seed();

        $reconocimiento1 = new Reconocimiento();
        $reconocimiento1->estudiante_id = 50;
        $reconocimiento1->actividad_id = 5;
        $reconocimiento1->documento = 'reconocimiento1 de prueba';
        $reconocimiento1->docente_validador= 5;
        $reconocimiento1->save();

        $reconocimiento2 = new Reconocimiento();
        $reconocimiento2->estudiante_id = 60;
        $reconocimiento2->actividad_id = 5;
        $reconocimiento2->documento = 'reconocimiento2 de prueba';
        $reconocimiento2->docente_validador = 5;
        $reconocimiento2->save();

        // TODO
        // cuando esté creado el controlador de reconocimientos, se podrá utilizar la siguiente petición:
        // $response = $this->post('/reconocimientos', $reconocimiento);
        // $response->assertStatus(201);
        // mientras, lo insertamos directamente en la base de datos:

        $this->assertDatabaseHas('reconocimientos', [
            'estudiante_id' => 50,
        ]);


        /**
         * reconocimientos index test.
         */
        $response = $this->get('/reconocimientos');
        $estudiante = [
            50,
            60,
        ];


        /**
         * reconocimientos show test.
         */
        $response = $this->get("/reconocimientos/show/" . $reconocimiento1->id);

        $response
        ->assertStatus(200)
        ->assertViewIs('reconocimientos.show')
        ->assertSeeText('Editar Reconocimiento', $escaped = true);

        $response = $this->get("/reconocimientos/show/" . $reconocimiento2->id);

        $response
        ->assertSeeText('Volver al listado', $escaped = true);

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
         * reconocimientos edit test.
         */

        $response = $this->get("/reconocimientos/edit/" . $reconocimiento1->id);

        $response
        ->assertStatus(200)
        ->assertViewIs('reconocimientos.edit');

        $response = $this->get("/reconocimientos/edit/A");
        $response->assertNotFound();



        // TODO
        // cuando esté creado el controlador de reconocimientos, se podrá utilizar la siguiente petición:
        // $response = $this->delete('/reconocimientos/1');
        // $response->assertStatus(302);
        // mientras, lo eliminamos directamente en la base de datos:
        // busca en la base de datos al Esudiante con el id $reconocimiento->id y lo elimina
        $reconocimiento = reconocimiento::find($reconocimiento1->id);
        $reconocimiento->delete();

        $reconocimiento = reconocimiento::find($reconocimiento2->id);
        $reconocimiento->delete();

        $this->assertDatabaseMissing('reconocimientos', [
            'estudiante_id' => 50,
        ]);

    }
}
