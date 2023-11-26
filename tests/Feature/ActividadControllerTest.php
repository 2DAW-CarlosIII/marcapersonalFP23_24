<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActividadControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {


         /**
         * proyectos index test.
         */
        $response = $this->get('/actividades');
        $docente_id = [
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
            '8',
            '9',
            '10',
        ];

        $response
        ->assertStatus(200)
        ->assertViewIs('actividades.index')
        ->assertSeeTextInOrder($docente_id, $escaped = true);

    /**
     * proyectos show test.
     */
        $response = $this->get("/actividades/show/1");

        $response
        ->assertStatus(200)
        ->assertViewIs('actividades.show')
        ->assertSeeText('2', $escaped = true);

        $response = $this->get("/actividades/show/2");

        $response
        ->assertSeeText('3', $escaped = true);

        $response = $this->get("/actividades/show/A");
        $response->assertNotFound();

    /**
     * proyectos create test.
     */
        $value = 'Añadir actividad';
        $response = $this->get('/actividades/create');

        $response
        ->assertStatus(200)
        ->assertViewIs('actividades.create')
        ->assertSeeText($value, $escaped = true);

    /**
     * proyectos edit test.
     */
        $id = rand(1, 10);
        $value = "Modificar actividad";
        $response = $this->get("/actividades/edit/$id");

        $response
        ->assertStatus(200)
        ->assertViewIs('actividades.edit')
        ->assertSeeText($value, $escaped = true);

        $response = $this->get("/actividades/edit/A");
        $response->assertNotFound();

    }


}
