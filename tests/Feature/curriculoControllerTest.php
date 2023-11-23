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
         * curriculos index test.
         */
            $response = $this->get('/curriculos');
            $curriculos = [
                'https://www.youtube.com/watch?v=u54uern',
                'https://www.youtube.com/watch?v=v87dfg2',
                'https://www.youtube.com/watch?v=frt32qe',
                'https://www.youtube.com/watch?v=wtrh2we',
                'https://www.youtube.com/watch?v=qwer123',
                'https://www.youtube.com/watch?v=ytgfd32',
                'https://www.youtube.com/watch?v=zxvbn23',
                'https://www.youtube.com/watch?v=asdf456',
                'https://www.youtube.com/watch?v=qwerty78',
                'https://www.youtube.com/watch?v=mnbvc90',
            ];

            $response
            ->assertStatus(200)
            ->assertViewIs('curriculos.index')
            ->assertSeeTextInOrder($curriculos, $escaped = true);

        /**
         * proyectos show test.
         */
            $response = $this->get("/curriculos/show/1");

            $response
            ->assertStatus(200)
            ->assertViewIs('curriculos.show')
            ->assertSeeText('https://www.youtube.com/watch?v=v87dfg2', $escaped = true);

            $response = $this->get("/curriculos/show/2");

            $response
            ->assertSeeText('https://www.youtube.com/watch?v=frt32qe', $escaped = true);

            $response = $this->get("/curriculos/show/A");
            $response->assertNotFound();

        /**
         * proyectos create test.
         */
            $value = 'Añadir Currículum';
            $response = $this->get('/curriculos/create');

            $response
            ->assertStatus(200)
            ->assertViewIs('curriculos.create')
            ->assertSeeText($value, $escaped = true);

        /**
         * proyectos edit test.
         */
            $id = rand(1, 10);
            $value = "Modificar Currículum";
            $response = $this->get("/curriculos/edit/$id");

            $response
            ->assertStatus(200)
            ->assertViewIs('curriculos.edit')
            ->assertSeeText($value, $escaped = true);

            $response = $this->get("/curriculos/edit/A");
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

            $response->assertStatus(200)->assertSeeText($value, $escaped = true);

            $response = $this->get("/perfil/" . chr($id));
            $response->assertNotFound();
    }
}
