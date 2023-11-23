<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ReconocimientoControllerTest extends TestCase
{
    public function test_controladores(): void
    {

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
        /*$nombres = [
            'Tecnologías de la Información',
            'Diseño Gráfico',
            'Electrónica',
            'Ingeniería Civil',
            'Gastronomía',
            'Medicina',
            'Mecatrónica',
            'Arquitectura',
            'Automoción',
            'Turismo',
        ];*/

        $response
            ->assertStatus(200)
            ->assertViewIs('reconocimientos.index');
        /*->assertSeeTextInOrder($nombres, $escaped = true);*/

        /**
         * proyectos show test.
         */
        $response = $this->get("/reconocimientos/show/1");

        $response
            ->assertStatus(200)
            ->assertViewIs('reconocimientos.show');
        /*->assertSeeText('Diseño Gráfico', $escaped = true);*/

        $response = $this->get("/reconocimientos/show/2");

        $response
            ->assertSeeText('Electrónica', $escaped = true);

        $response = $this->get("/reconocimientos/show/A");
        $response->assertNotFound();

        /**
         * proyectos create test.
         */
        /*$value = 'Añadir proyecto';*/
        $response = $this->get('/reconocimientos/create');

        /*$response
            ->assertStatus(200)
            ->assertViewIs('reconocimientos.create')
            ->assertSeeText($value, $escaped = true);*/

        /**
         * proyectos edit test.
         */
        $id = rand(1, 10);
        $value = "Modificar proyecto";
        $response = $this->get("/reconocimientos/edit/$id");

        $response
            ->assertStatus(200)
            ->assertViewIs('reconocimientos.edit');
        /*->assertSeeText($value, $escaped = true);*/

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

        $response->assertStatus(200)->assertSeeText($value, $escaped = true);

        $response = $this->get("/perfil/" . chr($id));
        $response->assertNotFound();
    }
}
