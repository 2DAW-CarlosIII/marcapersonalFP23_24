<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
<<<<<<< HEAD
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        /**
         * proyectos index test.
         */
        $response = $this->get('/users');
        $first_name = [
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
        ->assertSeeTextInOrder($first_name, $escaped = true);

    /**
     * proyectos show test.
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
        $id = rand(0,9);
        $value = "Modificar Usuario";
        $response = $this->get("/users/edit/$id");

        $response
        ->assertStatus(200)
        ->assertViewIs('users.edit')
        ->assertSeeText($value, $escaped = true);

        $response = $this->get("/users/edit/A");
        $response->assertNotFound();


=======
    public function test_controladores(): void
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
            ->assertSeeText('Jane', $escaped = true);

            $response = $this->get("/users/show/2");

            $response
            ->assertSeeText('Alice', $escaped = true);

            $response = $this->get("/users/show/A");
            $response->assertNotFound();

        /**
         * proyectos create test.
         */
            $value = 'Añadir usuario';
            $response = $this->get('/users/create');

            $response
            ->assertStatus(200)
            ->assertViewIs('users.create')
            ->assertSeeText($value, $escaped = true);

        /**
         * proyectos edit test.
         */
            $id = rand(1, 10);
            $value = "Modificar usuario";
            $response = $this->get("/users/edit/$id");

            $response
            ->assertStatus(200)
            ->assertViewIs('users.edit')
            ->assertSeeText($value, $escaped = true);

            $response = $this->get("/users/edit/A");
            $response->assertNotFound();
>>>>>>> 824fc149a9afd56b31838ad4421e0337c2c1abdd

    }
}
