<?php

namespace Tests\Feature;

use App\Models\Actividad;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActividadesDBTest extends TestCase
{
    use RefreshDatabase;

    // genera un test que inserte un Actividad en la base de datos, atendiendo a la migración.
    // posteriormente, debe comprobar que el Actividad se ha insertado correctamente.
    // finalmente, debe eliminar el Actividad de la base de datos y comprobar que se ha eliminado correctamente.
    public function test_Actividad(): void
    {
        $this->seed();

        $Actividad1 = new Actividad();
        $Actividad1->docente_id = 11;
        $Actividad1->insignia = 'insignia de prueba1';
        $Actividad1->save();

        $Actividad2 = new Actividad();
        $Actividad2->docente_id = 12;
        $Actividad2->insignia = 'insignia de prueba2';
        $Actividad2->save();

        // TODO
        // cuando esté creado el controlador de Actividades, se podrá utilizar la siguiente petición:
        // $response = $this->post('/Actividades', $Actividad);
        // $response->assertStatus(201);
        // mientras, lo insertamos directamente en la base de datos:

        $this->assertDatabaseHas('actividades', [
            'docente_id' => 11,
        ]);


        /**
         * Actividades index test.
         */
        $response = $this->get('/actividades');
        $docentes = [
            11,
            12,
        ];


        /**
         * Actividades show test.
         */
        $response = $this->get("/actividades/show/" . $Actividad1->id);

        $response
        ->assertStatus(200)
        ->assertViewIs('actividades.show')
        ->assertSeeText('insignia de prueba1', $escaped = true);

        $response = $this->get("/actividades/show/" . $Actividad2->id);

        $response
        ->assertSeeText('insignia de prueba2', $escaped = true);

        $response = $this->get("/actividades/show/A");
        $response->assertNotFound();


        /**
         * Actividades create test.
         */
        $value = 'Añadir Actividad';
        $response = $this->get('/actividades/create');

        $response
        ->assertStatus(200)
        ->assertViewIs('actividades.create')
        ->assertSeeText($value, $escaped = true);

        /**
         * Actividades edit test.
         */

        $response = $this->get("/actividades/edit/" . $Actividad1->id);

        $response
        ->assertStatus(200)
        ->assertViewIs('actividades.edit');

        $response = $this->get("/actividades/edit/A");
        $response->assertNotFound();



        // TODO
        // cuando esté creado el controlador de Actividades, se podrá utilizar la siguiente petición:
        // $response = $this->delete('/Actividads/1');
        // $response->assertStatus(302);
        // mientras, lo eliminamos directamente en la base de datos:
        // busca en la base de datos al Esudiante con el id $Actividad->id y lo elimina
        $Actividad = Actividad::find($Actividad1->id);
        $Actividad->delete();

        $Actividad = Actividad::find($Actividad2->id);
        $Actividad->delete();

        $this->assertDatabaseMissing('actividades', [
            'insignia' => 'insignia de prueba1',
            'insignia' => 'insignia de prueba1',
        ]);

    }
}
