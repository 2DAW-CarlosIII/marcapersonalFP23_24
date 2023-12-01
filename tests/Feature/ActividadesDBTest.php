<?php

namespace Tests\Feature;

use App\Models\Actividad;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActividadesDBTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_actividad(): void
    {
        $this->seed();

        $actividad1 = new Actividad();
        $actividad1->docente_id = 5;
        $actividad1->insignia = 'actividad1 de prueba';
        $actividad1->save();

        $actividad2 = new Actividad();
        $actividad2->docente_id = 5;
        $actividad2->insignia = 'actividad2 de prueba';
        $actividad2->save();

        // TODO
        // cuando esté creado el controlador de actividads, se podrá utilizar la siguiente petición:
        // $response = $this->post('/actividads', $actividad);
        // $response->assertStatus(201);
        // mientras, lo insertamos directamente en la base de datos:

        $this->assertDatabaseHas('actividades', [
            'insignia' => 'actividad1 de prueba',
        ]);


        /**
         * actividads index test.
         */
        $response = $this->get('/adtividades');
        $insignias = [
            'actividad1 de prueba',
            'actividad2 de prueba',
        ];


        /**
         * actividads show test.
         */
        $response = $this->get("/actividades/show/" . $actividad1->id);

        $response
        ->assertStatus(200)
        ->assertViewIs('actividades.show')
        ->assertSeeText('Editar Actividad', $escaped = true);

        $response = $this->get("/actividades/show/" . $actividad2->id);

        $response
        ->assertSeeText('Volver a actividades', $escaped = true);

        $response = $this->get("/actividades/show/A");
        $response->assertNotFound();


        /**
         * actividads create test.
         */
        $value = 'Añadir Actividad';
        $response = $this->get('/actividades/create');

        $response
        ->assertStatus(200)
        ->assertViewIs('actividades.create')
        ->assertSeeText($value, $escaped = true);

        /**
         * actividads edit test.
         */

        $response = $this->get("/actividades/edit/" . $actividad1->id);

        $response
        ->assertStatus(200)
        ->assertViewIs('actividades.edit');

        $response = $this->get("/actividades/edit/A");
        $response->assertNotFound();



        // TODO
        // cuando esté creado el controlador de actividads, se podrá utilizar la siguiente petición:
        // $response = $this->delete('/actividads/1');
        // $response->assertStatus(302);
        // mientras, lo eliminamos directamente en la base de datos:
        // busca en la base de datos al Esudiante con el id $actividad->id y lo elimina
        $actividad = actividad::find($actividad1->id);
        $actividad->delete();

        $this->assertDatabaseMissing('actividades', [
            'insignia' => 'actividad1 de prueba',
        ]);

        $actividad = actividad::find($actividad2->id);
        $actividad->delete();

        $this->assertDatabaseMissing('actividades', [
            'insignia' => 'actividad2 de prueba',
        ]);
    }
}
