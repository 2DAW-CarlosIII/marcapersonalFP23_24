<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReconocimientoControllerTest extends TestCase
{
    public function test_controladores(): void
    {
        /**
         * proyectos index test.
         */
        $response = $this->get('/reconocimientos');
        $nombres = [
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
            ->assertSeeTextInOrder($nombres, $escaped = true);

        /**
         * proyectos show test.
         */
        $response = $this->get("/reconocimientos/show/1");

        $response
            ->assertStatus(200)
            ->assertViewIs('reconocimientos.show')
            ->assertSeeText('2', $escaped = true);

        $response = $this->get("/reconocimientos/show/2");

        $response
            ->assertSeeText('3', $escaped = true);

        $response = $this->get("/reconocimientos/show/3");

        /**
         * proyectos create test.
         */
        $value = 'Añadir reconocimiento';
        $response = $this->get('/reconocimientos/create');

        $response
            ->assertStatus(200)
            ->assertViewIs('reconocimientos.create')
            ->assertSeeText($value, $escaped = true);

        /**
         * proyectos edit test.
         */
        $id = rand(1, 10);
        $value = "Modificar reconocimiento";
        $response = $this->get("/reconocimientos/edit/$id");

        $response
            ->assertStatus(200)
            ->assertViewIs('reconocimientos.edit')
            ->assertSeeText($value, $escaped = true);

        $response = $this->get("/reconocimientos/edit/A");
        $response->assertNotFound();

        /**
         * perfil test.
         */
        $id = rand(1, 10);
        $value = "Visualizar el currículo de $id";
        $response = $this->get("/perfil/$id");

        $response->assertStatus(200)->assertSeeText($value, $escaped = true);

        $value = "Visualizar el currículo propio";
        $response = $this->get("/perfil");
    }
}
