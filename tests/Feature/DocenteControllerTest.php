<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
class DocenteControllerTest extends TestCase
{
    public function test_controladores(): void
    {
        $response = $this->get('/docentes');
        $id = [
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
        ->assertViewIs('docentes.index');

        foreach ($id as $id) {
            $response->assertSeeText($id, $escaped = true);
        }
    /**
     * docentes show test.
     */
        $response = $this->get("/docentes/show/1");
        $response
        ->assertStatus(200)
        ->assertViewIs('docentes.show')
        ->assertSeeText('1', $escaped = true);

        $response = $this->get("/docentes/show/2");
        $response
        ->assertSeeText('2', $escaped = true);

        $response = $this->get("/docentes/show/A");
        $response->assertNotFound();

    /**
     * docentes edit test.
     */
        $id = rand(0,9);
        $value = "Modificar docente";

        $response = $this->get("/docentes/edit/$id");
        $response = $this->get("/docentes/edit/" . $id);

        $response
        ->assertStatus(200)
        ->assertViewIs('docentes.edit')
        ->assertSeeText($value, $escaped = true);

        $response = $this->get("/docentes/edit/A");
        $response->assertNotFound();
    }
}
