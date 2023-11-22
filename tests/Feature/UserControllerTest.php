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
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(302);



        /**
         * user index test.
         */
        $response = $this->get('/user');
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
         * user show test.
         */
        $response = $this->get("/user/show/1");

        $response
            ->assertStatus(200)
            ->assertViewIs('users.show')
            ->assertSeeText('Jane', $escaped = true);

        $response = $this->get("/user/show/2");

        $response
        ->assertSeeText('Alice', $escaped = true);

        $response = $this->get("/user/show/A");
        $response->assertNotFound();

        /**
         * user create test.
         */
        $value = 'Añadir Usuario';
        $response = $this->get('/user/create');

        $response
            ->assertStatus(200)
            ->assertViewIs('users.create')
            ->assertSeeText($value, $escaped = true);

        /**
         * user edit test.
         */
        $id = rand(0, 9);
        $value = "Modificar Usuario";
        $response = $this->get("/user/edit/$id");

        $response
            ->assertStatus(200)
            ->assertViewIs('users.edit')
            ->assertSeeText($value, $escaped = true);

        $response = $this->get("/user/edit/A");
        $response->assertNotFound();
    }
}
