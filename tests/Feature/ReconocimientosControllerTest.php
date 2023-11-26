<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ControllersExerciseTest extends TestCase
{
    public function test_controladores(): void
    {
        /**
         * proyectos index test.
         */
            $response = $this->get('/reconocimiento');
            $estudiante_id = [
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
            ->assertViewIs('reconocimientos.index')
            ->assertSeeTextInOrder($estudiante_id, $escaped = true);

        /**
         * proyectos show test.
         */
            $response = $this->get("/reconocimiento/show/1");

            $response
            ->assertStatus(200)
            ->assertViewIs('reconocimientos.show')
            ->assertSeeText('2', $escaped = true);

            $response = $this->get("/reconocimiento/show/2");

            $response
            ->assertSeeText('3', $escaped = true);

            $response = $this->get("/reconocimiento/show/A");
            $response->assertNotFound();

        /**
         * proyectos create test.
         */
            $value = 'Añadir reconocimiento';
            $response = $this->get('/reconocimiento/create');

            $response
            ->assertStatus(200)
            ->assertViewIs('reconocimientos.create')
            ->assertSeeText($value, $escaped = true);

        /**
         * proyectos edit test.
         */
            $id = rand(1, 10);
            $value = "Modificar reconocimiento";
            $response = $this->get("/reconocimiento/edit/$id");

            $response
            ->assertStatus(200)
            ->assertViewIs('reconocimientos.edit')
            ->assertSeeText($value, $escaped = true);

            $response = $this->get("/reconocimiento/edit/A");
            $response->assertNotFound();

    }
}
