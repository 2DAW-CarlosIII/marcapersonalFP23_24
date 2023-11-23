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
    public function test_actividades(): void
    {
        /**
         * actividades index test.
         */
        $response = $this->get('/actividades');
        $arrayActividades['docente_id'] = [
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
            ->assertSeeInOrder($arrayActividades['docente_id']);

        /**
         * actividades show test.
         */
        $response = $this->get("/actividades/show/1");

        $response
            ->assertStatus(200)
            ->assertViewIs('actividades.show')
            ->assertSeeText('2');

        $response = $this->get("/actividades/show/2");

        $response
            ->assertStatus(200)
            ->assertSeeText('3');

        $response = $this->get("/actividades/show/A");
        $response->assertNotFound();

        /**
         * actividades create test.
         */
        $value = 'Añadir actividad'; // Ajusta el valor esperado
        $response = $this->get('/actividades/create');

        $response
            ->assertStatus(200)
            ->assertViewIs('actividades.create')
            ->assertSeeText($value);

        /**
         * actividades edit test.
         */
        $id = rand(1, 10);
        $value = "Modificar actividad"; // Ajusta el valor esperado
        $response = $this->get("/actividades/edit/$id");

        $response
            ->assertStatus(200)
            ->assertViewIs('actividades.edit')
            ->assertSeeText($value);

        $response = $this->get("/actividades/edit/A");
        $response->assertNotFound();
    }
}
