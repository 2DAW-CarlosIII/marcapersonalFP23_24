<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    public function test_UserController(): void
    {
        /**
         * proyectos index test.
         */
        $response = $this->get('/users');
        $nombres = [
            'John Doe',
            'Jane Smith',
            'Alice Johnson',
            'Bob Williams',
            'Eva Brown',
            'Michael Taylor',
            'Sophie Miller',
            'David Davis',
            'Emily White',
            'Tom Wilson',
        ];

        $response
        ->assertStatus(200)
        ->assertViewIs('users.index')
        ->assertSeeTextInOrder($nombres, $escaped = true);

        /**
        * proyectos show test.
        */
        $response = $this->get("/users/show/1");

        $response
        ->assertStatus(200)
        ->assertViewIs('users.show')
        ->assertSeeText('Jane Smith', $escaped = true);

        $response = $this->get("/users/show/2");

        $response
        ->assertSeeText('Alice Johnson', $escaped = true);

        $response = $this->get("/users/show/A");
        $response->assertNotFound();

        /**
        * proyectos create test.
        */
        $value = 'Añadir Usuario';
        $response = $this->get('/users/create');

        $response
        ->assertStatus(200)
        ->assertViewIs('users.create')
        ->assertSeeText($value, $escaped = true);

        /**
         * proyectos edit test.
         */
        $id = rand(1, 10);
        $value = "Modificar Usuario";
        $response = $this->get("/users/edit/$id");

        $response
        ->assertStatus(200)
        ->assertViewIs('users.edit')
        ->assertSeeText($value, $escaped = true);

        $response = $this->get("/users/edit/A");
        $response->assertNotFound();

    }
}
