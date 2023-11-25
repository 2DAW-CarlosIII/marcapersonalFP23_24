<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CurriculoControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {

        /**
         * curriculos index test.
         */
        $response = $this->get('/curriculos');
        $user_id = [
            1,
            2,
            3,
            4,
            5,
            6,
            7,
            8,
            9,
            10
        ];

        $response
        ->assertStatus(200)
        ->assertViewIs('curriculos.index')
        ->assertSeeTextInOrder($user_id, $escaped = true);

    /**
     * curriculos show test.
     */
        $response = $this->get("/curriculos/show/1");

        $response
        ->assertStatus(200)
        ->assertViewIs('curriculos.show')
        ->assertSeeText(2, $escaped = true);

        $response = $this->get("/curriculos/show/2");

        $response
        ->assertSeeText(3, $escaped = true);

        $response = $this->get("/curriculos/show/A");
        $response->assertNotFound();

    /**
     * curriculos create test.
     */
        $response = $this->get('/curriculos/create');

        $response
        ->assertStatus(200)
        ->assertViewIs('curriculos.create');

    /**
     * curriculos edit test.
     */
        $response = $this->get("/curriculos/edit/1");

        $response
        ->assertStatus(200)
        ->assertViewIs('curriculos.edit');

        $response = $this->get("/catalog/edit/A");
        $response->assertNotFound();


    }
}
