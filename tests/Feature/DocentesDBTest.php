<?php

namespace Tests\Feature;

use App\Models\Docente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DocentesDBTest extends TestCase
{
    use RefreshDatabase;

    // genera un test que inserte un docente en la base de datos, atendiendo a la migración.
    // posteriormente, debe comprobar que el docente se ha insertado correctamente.
    // finalmente, debe eliminar el docente de la base de datos y comprobar que se ha eliminado correctamente.
    public function test_docente(): void
    {
        $this->seed();

        $docente1 = new Docente();
        $docente1->nombre = 'Docente1';
        $docente1->apellidos = 'Docente12';
        $docente1->direccion = 'Direccion1';
        $docente1->departamento = 'Informática';
        $docente1->save();

        $docente2 = new Docente();
        $docente2->nombre = 'Docente2';
        $docente2->apellidos = 'Docente22';
        $docente2->direccion = 'Direccion2';
        $docente2->departamento = 'Comercio';
        $docente2->save();

        // TODO
        // cuando esté creado el controlador de docentes, se podrá utilizar la siguiente petición:
        // $response = $this->post('/docentes', $docente);
        // $response->assertStatus(201);
        // mientras, lo insertamos directamente en la base de datos:

        $this->assertDatabaseHas('docentes', [
            'direccion' => 'Direccion1',
        ]);


        /**
         * docentes index test.
         */
        $response = $this->get('/docentes');
        $nombres = [
            'Docente1',
            'Docente2',
        ];


        /**
         * docentes show test.
         */
        $response = $this->get("/docentes/show/" . $docente1->id);

        $response
        ->assertStatus(200)
        ->assertViewIs('docentes.show')
        ->assertSeeText('Docente1', $escaped = true);

        $response = $this->get("/docentes/show/" . $docente2->id);

        $response
        ->assertSeeText('Docente2', $escaped = true);

        $response = $this->get("/docentes/show/A");
        $response->assertNotFound();

        /**
         * docentes edit test.
         */

        $response = $this->get("/docentes/edit/" . $docente1->id);

        $response
        ->assertStatus(200)
        ->assertViewIs('docentes.edit');

        $response = $this->get("/docentes/edit/A");
        $response->assertNotFound();



        // TODO
        // cuando esté creado el controlador de docentes, se podrá utilizar la siguiente petición:
        // $response = $this->delete('/docentes/1');
        // $response->assertStatus(302);
        // mientras, lo eliminamos directamente en la base de datos:
        // busca en la base de datos al Esudiante con el id $docente->id y lo elimina
        $docente = Docente::find($docente1->id);
        $docente->delete();

        $docente = Docente::find($docente2->id);
        $docente->delete();

        $this->assertDatabaseMissing('docentes', [
            'direccion' => 'Direccion1',
        ]);

    }
}
