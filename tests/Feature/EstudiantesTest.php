<?php

namespace Tests\Feature;

use App\Models\Estudiante;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EstudiantesTest extends TestCase
{
    use RefreshDatabase;

    // genera un test que inserte un proyecto en la base de datos, atendiendo a la migración.
    // posteriormente, debe comprobar que el proyecto se ha insertado correctamente.
    // finalmente, debe eliminar el proyecto de la base de datos y comprobar que se ha eliminado correctamente.
    public function test_estudiantes(): void
    {
        $this->seed();

        $estudiante1 = new Estudiante();
        $estudiante1->nombre = 'Estudiante1Nombre';
        $estudiante1->apellidos = 'Estudiante1 Apellidos';
        $estudiante1->direccion = 'Estudiante 1 direccion';
        $estudiante1->votos = 2;
        $estudiante1->confirmado = false;
        $estudiante1->save();
        $estudiante1->ciclo = 'CicloDeEstudiante1';
        $estudiante1->user_id = 1;

        $estudiante2 = new Estudiante();
        $estudiante2->nombre = 'Estudiante2Nombre';
        $estudiante2->apellidos = 'Estudiante2 Apellidos';
        $estudiante2->direccion = 'Estudiante 2 direccion';
        $estudiante2->votos = 5;
        $estudiante2->confirmado = true;
        $estudiante2->save();
        $estudiante1->ciclo = 'CicloDeEstudiante2';
        $estudiante1->user_id = 2;
        // TODO
        // cuando esté creado el controlador de proyectos, se podrá utilizar la siguiente petición:
        // $response = $this->post('/proyectos', $proyecto);
        // $response->assertStatus(201);
        // mientras, lo insertamos directamente en la base de datos:

        $this->assertDatabaseHas('estudiantes', [
            'nombre' => 'Estudiante1Nombre',
        ]);


        /**
         * proyectos index test.
         */
        $response = $this->get('/estudiantes');
        $nombres = [
            'Estudiante1Nombre',
            'Estudiante2Nombre',
        ];


        /**
         * proyectos show test.
         */
        $response = $this->get("/estudiantes/show/" . $estudiante1->id);

        $response
        ->assertStatus(200)
        ->assertViewIs('estudiantes.show')
        ->assertSeeText("Estudiante no confirmado", $escaped = true);

        $response = $this->get("/estudiantes/show/" . $estudiante2->id);

        $response
        ->assertSeeText("Estudiante no confirmado", $escaped = true);

        $response = $this->get("/estudiantes/show/A");
        $response->assertNotFound();


        /**
         * proyectos create test.
         */
        $value = 'Añadir estudiante';
        $response = $this->get('/estudiantes/create');

        $response
        ->assertStatus(200)
        ->assertViewIs('estudiantes.create')
        ->assertSeeText($value, $escaped = true);

        /**
         * proyectos edit test.
         */

        $response = $this->get("/estudiantes/edit/" . $estudiante1->id);

        $response
        ->assertStatus(200)
        ->assertViewIs('estudiantes.edit');

        $response = $this->get("/estudiantes/edit/A");
        $response->assertNotFound();



        // TODO
        // cuando esté creado el controlador de proyectos, se podrá utilizar la siguiente petición:
        // $response = $this->delete('/proyectos/1');
        // $response->assertStatus(302);
        // mientras, lo eliminamos directamente en la base de datos:
        // busca en la base de datos al Esudiante con el id $proyecto->id y lo elimina
        $estudiante = Estudiante::find($estudiante1->id);
        $estudiante->delete();

        $this->assertDatabaseMissing('estudiantes', [
            'nombre' => 'Estudiante1Nombre',
        ]);

    }
}
