<?php

namespace Tests\Feature;

use App\Models\Curriculo;
use App\Models\Empresa;
use App\Models\Permiso_Descarga;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class PermisosDescargasTableTest extends TestCase
{
    // use RefreshDatabase;

    /** @test */
    public function ejercicio1()
    {
        $this->assertTrue(
        Schema::hasColumns('permisos_descargas', [
            'id','curriculo_id', 'empresa_id', 'validado', 'created_at', 'updated_at'
        ]), 1);

        // Check if curriculo_id and empresa_id are foreign keys
        $foreignKeys = $this->getForeignKeys('permisos_descargas');
        $this->assertTrue('curriculo_id' == array_search('curriculos', $foreignKeys));
        $this->assertTrue('empresa_id' == array_search('users', $foreignKeys));
    }

    /** @test */
    public function ejercicio2()
    {
        Permiso_Descarga::truncate();

        // Create a user and a curriculum
        $user = Empresa::first()->user;
        $curriculo = Curriculo::inRandomOrder()->first();

        // Authenticate as the user
        $this->actingAs($user);

        // Send a POST request to the endpoint
        $response = $this->post("/api/v1/curriculos/{$curriculo->id}/permisoDescarga");

        // Assert that a new record has been created in the database
        $this->assertDatabaseHas('permisos_descargas', [
            'curriculo_id' => $curriculo->id,
            'empresa_id' => $user->id,
            'validado' => null,
        ]);

        // Assert that the response contains the expected data
        $response->assertJson([
            'curriculo_id' => $curriculo->id,
            'empresa_id' => $user->id,
            'validado' => null,
        ]);
    }

    /** @test */
    public function ejercicio3()
    {
        $user = User::find(2);
        $curriculo = Curriculo::inRandomOrder()->first();

        // Authenticate as the user
        $this->actingAs($user);

        // Send a POST request to the endpoint
        $response = $this->post("/api/v1/curriculos/{$curriculo->id}/permisoDescarga");

        // Assert that the response status code is 403
        $response->assertStatus(403);
    }

    /** @test */
    public function ejercicio4()
    {

        $permiso_Descarga = Permiso_Descarga::first();
        $curriculo = Curriculo::find($permiso_Descarga->curriculo_id);
        $user = $curriculo->user;

        // Authenticate as the user
        $this->actingAs($user);

        // Send a POST request to the endpoint
        $response = $this->put("/api/v1/curriculos/{$permiso_Descarga->empresa_id}/permitirDescarga");

        // Assert that a new record has been created in the database
        $this->assertDatabaseHas('permisos_descargas', [
            'curriculo_id' => $curriculo->id,
            'empresa_id' => $permiso_Descarga->empresa_id,
            'validado' => true,
        ]);

        // Assert that the response contains the expected data
        $response->assertJson([
            'curriculo_id' => $curriculo->id,
            'empresa_id' => $permiso_Descarga->empresa_id,
            'validado' => true,
        ]);
    }

    /** @test */
    public function ejercicio5()
    {
        $user = User::find(2);

        // Authenticate as the user
        $this->actingAs($user);

        // Send a POST request to the endpoint
        $response = $this->put("/api/v1/curriculos/2/permitirDescarga");

        // Assert that the response status code is 403
        $response->assertStatus(403);
    }

    protected function getForeignKeys($table)
    {
        $foreignKeys = DB::select(
            "SELECT k.COLUMN_NAME, k.REFERENCED_TABLE_NAME, k.REFERENCED_COLUMN_NAME
            FROM information_schema.TABLE_CONSTRAINTS i
            LEFT JOIN information_schema.KEY_COLUMN_USAGE k ON i.CONSTRAINT_NAME = k.CONSTRAINT_NAME
            WHERE i.CONSTRAINT_TYPE = 'FOREIGN KEY'
            AND i.TABLE_NAME = ?",
            [$table]
        );

        return array_reduce($foreignKeys, function ($result, $key) {
            $result[$key->COLUMN_NAME] = $key->REFERENCED_TABLE_NAME;
            return $result;
        }, []);
    }
}
