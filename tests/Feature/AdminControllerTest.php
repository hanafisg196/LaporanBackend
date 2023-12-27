<?php

namespace Tests\Feature;

use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testLoginSuccess(): void
    {
        $this->seed(UserSeeder::class);
        $this->post('/login',[
        "username" => "hafis",
        "password" => "123456"

       ])->assertRedirect('/dashboard')->assertSessionHas('admin', "hafis");
    }

    public function testLogoutSuccess(): void
    {

        $this->withSession([
            "admin" => "hafis"
        ])->post('/logout')
        ->assertRedirect("/")
        ->assertSessionMissing("admin");
    }
}
