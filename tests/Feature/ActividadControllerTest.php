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
    public function test_controladores(): void
    {
         /**
         * Actividades index test.
         */
        $response = $this->get('/actividades');
        $docentes = [
            1,
            2,
            3,
            4,
            5,
            6,
            7,
            8,
            9,
            10,
        ];

        $response
        ->assertStatus(200)
        ->assertViewIs('actividades.index')
        ->assertSeeTextInOrder($docentes, $escaped = true);

    /**
     * Actividades show test.
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
        $id = rand(0, 9);
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
