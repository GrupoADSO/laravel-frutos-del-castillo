<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class UserTest extends TestCase
{
    use WithFaker;

    // public function test_register()
    // {
    //     $userData = [
    //         'nombre' => 'John',
    //         'apellido' => 'Does',
    //         'email' => 'j@example.com',
    //         'celular' => '123456789',
    //         'fecha_nacimiento' => '2025-01-01',
    //         'password' => 'password',
    //         'password_verification' => 'password',
    //     ];

    //     $response = $this->post(route('crearUsuario'), $userData);
    //     $response->assertStatus(302);
    //     $this->assertDatabaseHas('users', [
    //         'email' => 'johnss@example.com',
    //     ]);
    // }
    public function test_login()
    {
        // $user = User::factory()->create([
        //     'nombre' => 'John',
        //     'apellido' => 'Does',
        //     'email' => 'jamerto@example.com',
        //     'celular' => '123456789',
        //     'fecha_nacimiento' => '2025-01-01',
        //     'password' => 'password',
        // ]);
        $response = $this->post(route('login'), [
            'email' => 'johnss@example.com', 
            'password' => 'password',
        ]);
        $response->assertRedirect(route('inicio'));
        $this->assertAuthenticated();
    }

    public function test_login_invalid_()
    {
        $response = $this->post(route('login'), [
            'email' => 'invalid@example.com',
            'password' => 'wrong_password',
        ]);
        $response->assertRedirect(route('inicio'));
        $this->assertGuest();
    }
}
