<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReconocimientoExerciseTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_controladores(): void
    {
        /**
         * main page test.
         */
            $value = 'Pantalla principal';
            $response = $this->get('/');

            $response
                ->assertRedirect('/catalog');

        /**
         * login test.
         */
            $value = 'Login usuario';
            $response = $this->get('/login');

            $response
            ->assertStatus(200)
            ->assertViewIs('auth.login')
            ->assertSeeText($value, $escaped = true);

        /**
         * logout test.
         */
            $value = 'Logout usuario';
            $response = $this->get('/logout');

            $response->assertStatus(200)->assertSeeText($value, $escaped = true);

        /**
         * proyectos index test.
         */
            $response = $this->get('/reconocimientos');
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
            ->assertViewIs('reconocimiento.index')
            ->assertSeeTextInOrder($estudiante_id, $escaped = true);

        /**
         * proyectos show test.
         */
            $response = $this->get("/reconocimientos/show/1");

            $response
            ->assertStatus(200)
            ->assertViewIs('reconocimiento.show')
            ->assertSeeText('3', $escaped = true);

            $response = $this->get("/reconocimientos/show/2");

            $response
            ->assertSeeText('4', $escaped = true);

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
            $id = rand(0, 9);
            $value = "Modificar reconocimiento";
            $response = $this->get("/reconocimientos/edit/1");

            $response
            ->assertStatus(200)
            ->assertViewIs('reconocimiento.edit')
            ->assertSeeText($value, $escaped = true);

            $response = $this->get("/reconocimientos/edit/A");
            $response->assertNotFound();


    }
}
