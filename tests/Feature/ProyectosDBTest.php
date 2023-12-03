<?php

namespace Tests\Feature;

use App\Models\Proyecto;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProyectosDBTest extends TestCase
{
    use RefreshDatabase;


    public function test_proyecto(): void
    {
        $this->seed();

        $proyecto1 = new Proyecto();
        $proyecto1->docente_id = 5;
        $proyecto1->nombre = 'Proyecto1 de prueba';
        $proyecto1->dominio = 'dominio1prueba';
        $proyecto1->metadatos = serialize([
            'fecha_inicio' => '2023-01-15',
            'fecha_fin' => '2023-05-30',
            'calificacion' => 9.5
        ]);
        $proyecto1->save();

        $proyecto2 = new Proyecto();
        $proyecto2->docente_id = 5;
        $proyecto2->nombre = 'Proyecto2 de prueba';
        $proyecto2->dominio = 'dominio2prueba';
        $proyecto2->metadatos = serialize([
            'fecha_inicio' => '2023-01-15',
            'fecha_fin' => '2023-05-30',
            'calificacion' => 4.5
        ]);
        $proyecto2->save();


        $this->assertDatabaseHas('proyectos', [
            'dominio' => 'dominio1prueba',
        ]);


        /**
         * proyectos index test.
         */
        $response = $this->get('/catalog');
        $nombres = [
            'Proyecto1 de prueba',
            'Proyecto2 de prueba',
        ];


        /**
         * proyectos show test.
         */
        $response = $this->get("/catalog/show/" . $proyecto1->id);

        $response
        ->assertStatus(200)
        ->assertViewIs('catalog.show')
        ->assertSeeText('Proyecto aprobado', $escaped = true);

        $response = $this->get("/catalog/show/" . $proyecto2->id);

        $response
        ->assertSeeText('Proyecto suspenso', $escaped = true);

        $response = $this->get("/catalog/show/A");
        $response->assertNotFound();


        /**
         * proyectos create test.
         */
        $value = 'Añadir proyecto';
        $response = $this->get('/catalog/create');

        $response
        ->assertStatus(200)
        ->assertViewIs('catalog.create')
        ->assertSeeText($value, $escaped = true);

        /**
         * proyectos edit test.
         */

        $response = $this->get("/catalog/edit/" . $proyecto1->id);

        $response
        ->assertStatus(200)
        ->assertViewIs('catalog.edit');

        $response = $this->get("/catalog/edit/A");
        $response->assertNotFound();



        $proyecto = Proyecto::find($proyecto1->id);
        $proyecto->delete();

        $this->assertDatabaseMissing('proyectos', [
            'dominio' => 'dominio1prueba',
        ]);

    }
}
