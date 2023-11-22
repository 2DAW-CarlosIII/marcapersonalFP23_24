<?php

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ControllersExerciseTest extends TestCase
{
    public function test_controladores(): void
    {
        $value = 'Pantalla principal';
        $response = $this->get('/');
        $response
            ->assertRedirect('/catalog');

        $response = $this->get('/catalog');
        $nombres = [
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
        ];

        $response
            ->assertStatus(200)
            ->assertViewIs('catalog.index')
            ->assertSeeTextInOrder($nombres, $escaped = true);

        $response = $this->get("/catalog/show/1");

        $response
            ->assertStatus(200)
            ->assertViewIs('catalog.show')
            ->assertSeeText('Diseño Gráfico', $escaped = true);

        $response = $this->get("/catalog/show/2");

        $response
            ->assertSeeText('Electrónica', $escaped = true);
        $response = $this->get("/catalog/show/A");
        $response->assertNotFound();
        $id = rand(1, 10);
        $value = "Modificar proyecto";
        $response = $this->get("/catalog/edit/$id");

        $response
            ->assertStatus(200)
            ->assertViewIs('catalog.edit')
            ->assertSeeText($value, $escaped = true);
        $response = $this->get("/catalog/edit/A");
        $response->assertNotFound();
    }
}
