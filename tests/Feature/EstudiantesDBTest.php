<?php

namespace Tests\Feature;

use App\Models\Estudiante;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EstudiantesDBTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $this->seed();

        $estudiante1 = new Estudiante();
        $estudiante1->nombre = 'nombre1';
        $estudiante1->apellidos = 'apellidos1';
        $estudiante1->direccion = 'direccion1';
        $estudiante1->confirmado = "1";
        $estudiante1->ciclo = 'ABCD';

        $estudiante1->save();

        $estudiante2 = new Estudiante();
        $estudiante2->nombre = 'nombre2';
        $estudiante2->apellidos = 'apellidos2';
        $estudiante2->direccion = 'direccion2';
        $estudiante2->votos = "1";
        $estudiante2->confirmado = "0";
        $estudiante2->ciclo = 'ABCD';
        $estudiante2->save();

        // TODO
        // cuando esté creado el controlador de estudiantes, se podrá utilizar la siguiente petición:
        // $response = $this->post('/estudiantes', $estudiante);
        // $response->assertStatus(201);
        // mientras, lo insertamos directamente en la base de datos:

        $this->assertDatabaseHas('estudiantes', [
            'direccion' => 'direccion1',
        ]);


        /**
         * estudiantes index test.
         */
        $response = $this->get('/estudiantes');
        $nombres = [
            'direccion1',
            'direccion2',
        ];


        /**
         * estudiantes show test.
         */
        $response = $this->get("/estudiantes/show/" . $estudiante1->id);

        $response
        ->assertStatus(200)
        ->assertViewIs('estudiantes.show')
        ->assertSeeText('Editar Estudiante', $escaped = true);

        $response = $this->get("/estudiantes/show/" . $estudiante2->id);

        $response
        ->assertSeeText('Volver al listado', $escaped = true);

        $response = $this->get("/estudiantes/show/A");
        $response->assertNotFound();

        /**
         * estudiantes edit test.
         */

        $response = $this->get("/estudiantes/edit/" . $estudiante1->id);

        $response
        ->assertStatus(200)
        ->assertViewIs('estudiantes.edit');

        $response = $this->get("/estudiantes/edit/A");
        $response->assertNotFound();



        // TODO
        // cuando esté creado el controlador de estudiantes, se podrá utilizar la siguiente petición:
        // $response = $this->delete('/estudiantes/1');
        // $response->assertStatus(302);
        // mientras, lo eliminamos directamente en la base de datos:
        // busca en la base de datos al Esudiante con el id $estudiante->id y lo elimina
        $estudiante = estudiante::find($estudiante1->id);
        $estudiante->delete();

        $estudiante = estudiante::find($estudiante2->id);
        $estudiante->delete();

        $this->assertDatabaseMissing('estudiantes', [
            'direccion' => 'direccion1',
        ]);

    }
}
