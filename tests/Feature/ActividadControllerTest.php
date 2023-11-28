<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActividadControllerTest extends TestCase
{
    public function test_controladores(): void
    {
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
        ->assertSeeText('1', $escaped = true);

        $response = $this->get("/actividades/show/2");

        $response
        ->assertSeeText('2', $escaped = true);

        $response = $this->get("/actividades/show/A");
        $response->assertNotFound();

    /**
     * proyectos create test.
     */
        $value = 'Añadir Actividad';
        $response = $this->get('/actividades/create');

        $response
        ->assertStatus(200)
        ->assertViewIs('actividades.create')
        ->assertSeeText($value, $escaped = true);

    /**
     * proyectos edit test.
     */
        $id = rand(0,9);
        $value = "Modificar Actividad";
        $response = $this->get("/actividades/edit/$id");

        $response
        ->assertStatus(200)
        ->assertViewIs('actividades.edit')
        ->assertSeeText($value, $escaped = true);

        $response = $this->get("/actividades/edit/A");
        $response->assertNotFound();
    }
}
