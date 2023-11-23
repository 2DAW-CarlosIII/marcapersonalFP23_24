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

        $user_id = 1;

        $response
            ->assertStatus(200)
            ->assertViewIs('curriculos.show')
            ->assertSeeText($user_id, $escaped = true);

        $response = $this->get("/catalog/show/2");

        $user_id = 2;

        $response
            ->assertSeeText($user_id, $escaped = true);

        $response = $this->get("/catalog/show/A");
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
        $user_id = 1;

        $response
            ->assertStatus(200)
            ->assertViewIs('curriculos.edit')
            ->assertSeeText($user_id, $escaped = true);

        $response = $this->get("/catalog/show/2");

        $user_id = 2;

        $response
            ->assertSeeText($user_id, $escaped = true);

        $response = $this->get("/curriculos/edit/A");
        $response->assertNotFound();
    }
}
