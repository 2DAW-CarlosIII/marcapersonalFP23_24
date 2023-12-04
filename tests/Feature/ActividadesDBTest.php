<?php

namespace Tests\Feature;

use App\Models\Actividad;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActividadesDBTest extends TestCase
{
    use RefreshDatabase;

    // genera un test que inserte un proyecto en la base de datos, atendiendo a la migración.
    // posteriormente, debe comprobar que el proyecto se ha insertado correctamente.
    // finalmente, debe eliminar el proyecto de la base de datos y comprobar que se ha eliminado correctamente.
    public function test_actividad(): void
    {
        $this->seed();

        $actividad1 = new Actividad();
        $actividad1->docente_id = 11;
        $actividad1->insignia = 'https://marcapersonalFP.es/badge?v=prueba1';
        $actividad1->save();

        $actividad2 = new Actividad();
        $actividad2->docente_id = 11;
        $actividad2->insignia = 'https://marcapersonalFP.es/badge?v=prueba2';
        $actividad2->save();

        // TODO
        // cuando esté creado el controlador de proyectos, se podrá utilizar la siguiente petición:
        // $response = $this->post('/proyectos', $proyecto);
        // $response->assertStatus(201);
        // mientras, lo insertamos directamente en la base de datos:

        $this->assertDatabaseHas('actividades', [
            'insignia' => 'https://marcapersonalFP.es/badge?v=prueba1',
        ]);


        /**
         * actividades index test.
         */
        $response = $this->get('/actividades');
        $nombres = [
            'https://marcapersonalFP.es/badge?v=prueba1',
            'https://marcapersonalFP.es/badge?v=prueba2',
        ];


        /**
         * actividades show test.
         */
        $response = $this->get("/actividades/show/" . $actividad1->id);

        $response
        ->assertStatus(200)
        ->assertViewIs('actividades.show')
        ->assertSeeText('https://marcapersonalFP.es/badge?v=prueba1', $escaped = true);

        $response = $this->get("/actividades/show/" . $actividad2->id);

        $response
        ->assertSeeText('https://marcapersonalFP.es/badge?v=prueba2', $escaped = true);

        $response = $this->get("/catalog/show/A");
        $response->assertNotFound();


        /**
         * actividades create test.
         */
        $value = 'Añadir Actividad';
        $response = $this->get('/actividades/create');

        $response
        ->assertStatus(200)
        ->assertViewIs('actividades.create')
        ->assertSeeText($value, $escaped = true);

        /**
         * actividades edit test.
         */

        $response = $this->get("/actividades/edit/" . $actividad1->id);

        $response
        ->assertStatus(200)
        ->assertViewIs('actividades.edit');

        $response = $this->get("/actividades/edit/A");
        $response->assertNotFound();



        // TODO
        // cuando esté creado el controlador de proyectos, se podrá utilizar la siguiente petición:
        // $response = $this->delete('/proyectos/1');
        // $response->assertStatus(302);
        // mientras, lo eliminamos directamente en la base de datos:
        // busca en la base de datos al Esudiante con el id $proyecto->id y lo elimina
        $proyecto = Actividad::find($actividad1->id);
        $proyecto->delete();

        $this->assertDatabaseMissing('actividades', [
            'insignia' => 'https://marcapersonalFP.es/badge?v=prueba1',
        ]);

    }
}
