<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteExerciseTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

    /**
     * main page test.
     */
        $value = 'Pantalla principal';
        $response = $this->get('/');

        $response->assertStatus(200)->assertSeeText($value, $escaped = true);

    /**
     * login test.
     */
        $value = 'Login usuario';
        $response = $this->get('/login');

        $response->assertStatus(200)->assertSeeText($value, $escaped = true);

    /**
     * logout test.
     */
        $value = 'Logout usuario';
        $response = $this->get('/logout');

        $response->assertStatus(200)->assertSeeText($value, $escaped = true);

    /**
     * proyectos index test.
     */
        $value = 'Listado proyectos';
        $response = $this->get('/proyectos');

        $response->assertStatus(200)->assertSeeText($value, $escaped = true);

    /**
     * proyectos show test.
     */
        $id = rand(1, 10);
        $value = "Vista detalle proyecto $id";
        $response = $this->get("/proyectos/show/$id");

        $response->assertStatus(200)->assertSeeText($value, $escaped = true);

        $response = $this->get("/proyectos/show/" . chr($id));
        $response->assertNotFound();

    /**
     * proyectos create test.
     */
        $value = 'Añadir proyecto';
        $response = $this->get('/proyectos/create');

        $response->assertStatus(200)->assertSeeText($value, $escaped = true);

    /**
     * proyectos edit test.
     */
        $id = rand(1, 10);
        $value = "Modificar proyecto $id";
        $response = $this->get("/proyectos/edit/$id");

        $response->assertStatus(200)->assertSeeText($value, $escaped = true);

        $response = $this->get("/proyectos/edit/" . chr($id));
        $response->assertNotFound();

    /**
     * perfil test.
     */
        $id = rand(1, 10);
        $value = "Visualizar el currículo de $id";
        $response = $this->get("/perfil/$id");

        $response->assertStatus(200)->assertSeeText($value, $escaped = true);

        $response = $this->get("/perfil/" . chr($id));
        $response->assertNotFound();
    }

}
