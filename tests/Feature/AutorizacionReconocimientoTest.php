<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Reconocimiento;
use Illuminate\Support\Facades\Auth;
use Illuminate\Testing\TestResponse;

class AutorizacionReconocimientoTest extends TestCase
{
    // use RefreshDatabase;

    private static $apiurl_reconocimiento = '/api/v1/reconocimientos';

    public function reconocimientoIndex() : TestResponse
    {
        return $this->get(self::$apiurl_reconocimiento);
    }

    public function reconocimientoShow() : TestResponse
    {
        $reconocimiento = Reconocimiento::inRandomOrder()->first();
        return $this->get(self::$apiurl_reconocimiento . "/{$reconocimiento->id}");
    }

    public function reconocimientoStore() : TestResponse
    {
        $data = [
            'actividad_id' => 1,
            'estudiante_id' => 1,
            'documento' => '123456',
            'fecha' => '2021-10-10',
            'docente_validador' => 35,
        ];
        return $this->postJson(self::$apiurl_reconocimiento, $data);
    }

    public function reconocimientoUpdate($propio = false) : TestResponse
    {
        $data = [
            'actividad_id' => 1,
            'estudiante_id' => $propio ? Auth::user()->id : 100,
            'documento' => '123456',
            'fecha' => '2021-10-10',
            'docente_validador' => 35,
        ];

        $reconocimiento = $propio
            ? Reconocimiento::create($data)
            : Reconocimiento::inRandomOrder()->first();
        return $this->putJson(self::$apiurl_reconocimiento . "/{$reconocimiento->id}", $data);
    }

    public function reconocimientoValidar() : TestResponse
    {
        $reconocimiento = Reconocimiento::inRandomOrder()->first();
        return $this->putJson(self::$apiurl_reconocimiento . "/validar/{$reconocimiento->id}");
    }

    public function reconocimientoDelete($propio = false) : TestResponse
    {
        $data = [
            'actividad_id' => 1,
            'estudiante_id' => $propio ? Auth::user()->id : 100,
            'documento' => '123456',
            'fecha' => '2021-10-10',
            'docente_validador' => 35,
        ];
        $reconocimiento = $propio
            ? Reconocimiento::create($data)
            : Reconocimiento::inRandomOrder()->first();
        return $this->delete(self::$apiurl_reconocimiento . "/{$reconocimiento->id}");
    }

    public function test_anonymous_can_access_reconocimiento_list_and_view()
    {
        $this->assertGuest();

        $response = $this->reconocimientoIndex();
        $response->assertStatus(200);

        $response = $this->reconocimientoShow();
        $response->assertStatus(200);

        $response = $this->reconocimientoStore();
        $response->assertUnauthorized();

        $response = $this->reconocimientoUpdate();
        $response->assertUnauthorized();

        $response = $this->reconocimientoDelete();
        $response->assertFound();

    }

    public function test_admin_can_CRUD_reconocimiento()
    {
        $admin = User::where('email', env('ADMIN_EMAIL'))->first();
        $this->actingAs($admin);

        $response = $this->reconocimientoIndex();
        $response->assertSuccessful();

        $response = $this->reconocimientoShow();
        $response->assertSuccessful();

        $response = $this->reconocimientoStore();
        $response->assertSuccessful();

        $response = $this->reconocimientoUpdate();
        $response->assertSuccessful();

        $response = $this->reconocimientoDelete();
        $response->assertSuccessful();

        $response = $this->reconocimientoValidar();
        $response->assertSuccessful();
    }

    public function test_docente_can_access_reconocimiento_list_and_view()
    {
        $docente = User::where('email', 'like', '%@' . env('TEACHER_EMAIL_DOMAIN'))->first();
        $this->actingAs($docente);

        $response = $this->reconocimientoIndex();
        $response->assertSuccessful();

        $response = $this->reconocimientoShow();
        $response->assertSuccessful();

        $response = $this->reconocimientoStore();
        $response->assertForbidden();

        $response = $this->reconocimientoUpdate();
        $response->assertForbidden();

        $response = $this->reconocimientoDelete();
        $response->assertForbidden();

        $response = $this->reconocimientoValidar();
        $response->assertSuccessful();
    }


    public function test_estudiante_can_CRUD_reconocimiento_if_owner()
    {
        $estudiante = User::where('email', 'like', '%@' . env('STUDENT_EMAIL_DOMAIN'))->first();
        $this->actingAs($estudiante);

        $response = $this->reconocimientoIndex();
        $response->assertSuccessful();

        $response = $this->reconocimientoShow();
        $response->assertSuccessful();

        $response = $this->reconocimientoStore();
        $response->assertSuccessful();

        $response = $this->reconocimientoUpdate($propio = true);
        $response->assertSuccessful();

        $response = $this->reconocimientoUpdate($propio = false);
        $response->assertForbidden();

        $response = $this->reconocimientoDelete($propio = true);
        $response->assertSuccessful();

        $response = $this->reconocimientoDelete($propio = false);
        $response->assertForbidden();

        $response = $this->reconocimientoValidar();
        $response->assertForbidden();
    }

}
