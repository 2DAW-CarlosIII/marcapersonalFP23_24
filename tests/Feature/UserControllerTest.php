<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_controladores(): void
    {
        /**
         * users index test.
         */
        $response = $this->get('/users');
        $nombres = [
            'John',
            'Jane',
            'Alice',
            'Bob',
            'Eva',
            'Michael',
            'Sophie',
            'David',
            'Emily',
            'Tom',
        ];

        $response
        ->assertStatus(200)
        ->assertViewIs('users.index')
        ->assertSeeTextInOrder($nombres, $escaped = true);

        /**
         * users show test.
         */
        $response = $this->get("/users/show/1");

        $response
        ->assertStatus(200)
        ->assertViewIs('users.show')
        ->assertSeeText('Jane', $escaped = true);

        $response = $this->get("/users/show/2");

        $response
        ->assertSeeText('Alice', $escaped = true);

        $response = $this->get("/users/show/A");
        $response->assertNotFound();

        /**
         * users create test.
         */
        $value = 'Añadir Usuario';
        $response = $this->get('/users/create');

        $response
        ->assertStatus(200)
        ->assertViewIs('users.create')
        ->assertSeeText($value, $escaped = true);

        /**
         * users edit test.
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
