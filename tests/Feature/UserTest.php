<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testRegisterSuccess(): void
    {
        $this->post('/api/users', [
            'username' => 'test',
            'password'  => 'test123',
            'nama'      => 'namasaya',
            'email'      => 'test@gmail.com'
        ])->assertStatus(201)
           ->assertJson ([
            "data"  => [
                'username' => 'test',
                'nama'     => 'test name'
            ]
           ]);
    }


    public function testRegisterFailed(): void
    {
        $this->post('/api/users', [
            'username' => 'test',
            'password'  => 'test123',
            'nama'      => '',
            'email'      => 'test@gmail.com'
        ])->assertStatus(400)
           ->assertJson ([
            "errors"  => [
                "nama" =>[
                    "The nama field is required."
                ]
            ]
           ]);
    }
}
