<?php

namespace Tests\Feature;

use App\Models\Reconocimiento;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProyectosDBTest extends TestCase
{
    use RefreshDatabase;

    // genera un test que inserte un proyecto en la base de datos, atendiendo a la migración.
    // posteriormente, debe comprobar que el proyecto se ha insertado correctamente.
    // finalmente, debe eliminar el proyecto de la base de datos y comprobar que se ha eliminado correctamente.
    public function test_reconocimiento(): void
    {
        $this->seed();

        $reconocimiento1 = new Reconocimiento();
        $reconocimiento1->estudiante_id = 5;
        $reconocimiento1->actividad_id = 4;
        $reconocimiento1->documento = 'documento1prueba';
        $reconocimiento1->docente_validador = 3;
        $reconocimiento1->save();

        $reconocimiento2 = new Reconocimiento();
        $reconocimiento2->estudiante_id = 3;
        $reconocimiento2->actividad_id = 5;
        $reconocimiento2->documento = 'documento2prueba';
        $reconocimiento2->docente_validador = 4;
        $reconocimiento2->save();

        // TODO
        // cuando esté creado el controlador de proyectos, se podrá utilizar la siguiente petición:
        // $response = $this->post('/proyectos', $proyecto);
        // $response->assertStatus(201);
        // mientras, lo insertamos directamente en la base de datos:

        $this->assertDatabaseHas('reconocimientos', [
            'documento' => 'documento1prueba',
        ]);


        /**
         * proyectos index test.
         */
        $response = $this->get('/reconocimientos');
        $estudiantes_ids = [
            'Estudiante 1',
            'Estudiante 2',
            'Estudiante 3',
            'Estudiante 4',
            'Estudiante 5',
            'Estudiante 6',
            'Estudiante 7',
            'Estudiante 8',
            'Estudiante 9',
            'Estudiante 10'
        ];

        $response
        ->assertStatus(200)
        ->assertViewIs('reconocimientos.index')
        ->assertSeeTextInOrder($estudiantes_ids, $escaped = true);


        /**
         * proyectos show test.
         */
        $response = $this->get("/reconocimientos/show/" . $reconocimiento1->id);

        $response
        ->assertStatus(200)
        ->assertViewIs('reconocimientos.show')
        ->assertSeeText('Docente Validador: 3', $escaped = true);

        $response = $this->get("/reconocimientos/show/" . $reconocimiento2->id);

        $response
        ->assertSeeText('Docente Validador: 4', $escaped = true);

        $response = $this->get("/reconocimientos/show/A");
        $response->assertNotFound();


        /**
         * proyectos create test.
         */
        $value = 'Añadir reconocimiento';
        $response = $this->get('/reconocimientos/create');

        $response
        ->assertStatus(200)
        ->assertViewIs('reconocimiento.create')
        ->assertSeeText($value, $escaped = true);

        /**
         * proyectos edit test.
         */
        $value = "Modificar reconocimiento";
        $response = $this->get("/reconocimiento/edit/" . $reconocimiento1->id);

        $response
        ->assertStatus(200)
        ->assertViewIs('reconocimiento.edit')
        ->assertSeeText($value, $escaped = true);

        $response = $this->get("/reconocimiento/edit/A");
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
            'documento' => 'documento1prueba',
        ]);

    }
}
