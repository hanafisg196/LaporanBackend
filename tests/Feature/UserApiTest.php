<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testRegisterSuccess(): void
    {
        $this->post('/api/users', [
            'username' => 'hafis15',
            'password'  => 'test123',
            'nama'      => 'hafis',
            'email'      => 'hafis@gmail.com'
        ])->assertStatus(201)
           ->assertJson ([
            "data"  => [
                'username' => 'hafis15',
                'nama'     => 'hafis'
            ]
           ]);
    }


    public function testRegisterFailed(): void
    {
        $this->post('/api/users', [
            'username' => 'hafis15',
            'password'  => 'test123',
            'nama'      => '',
            'email'      => 'hafis@gmail.com'
        ])->assertStatus(400)
           ->assertJson ([
            "errors"  => [
                "nama" =>[
                    "The nama field is required."
                ]
            ]
           ]);
    }

    public function testLoginSuccess(): void
    {
        $this->seed(UserSeeder::class);
        $this->post('/api/users/login', [
            'username' => 'test',
            'password'  => 'rahasia'
        ])->assertStatus(200)
           ->assertJson ([
                "data" => [
                    'username' => 'test',
                    'nama' => 'test'
                ]
           ]);

           $user = User::where('username', 'test')->first();
           self::assertNotNull($user->token);
    }


    public function testLoginFailed(): void
    {
        $this->seed(UserSeeder::class);
        $this->post('/api/users/login', [
            'username' => 'tedsdst',
            'password'  => 'rahasia'
        ])->assertStatus(401)
           ->assertJson ([
                "errors" => [
                    "message" => [
                        "password or username is wrong"
                    ]
                ]
           ]);

    }
    public function testGetCurrentUser(): void
    {
        $this->seed(UserSeeder::class);
        $this->get('/api/users/current', [
            'Authorization' => 'test'

        ])->assertStatus(200)
           ->assertJson ([
                "data" => [
                    'username' => 'test',
                    'nama'   => 'test',

                ]
           ]);

           $user = User::where('username', 'test')->first();
           self::assertNotNull($user->token);
    }


    public function testGetUnthorzation(): void
    {
        $this->seed(UserSeeder::class);
        $this->get('/api/users/current', [
            'Authorzation' => 'dasdasdas'

        ])->assertStatus(401)
           ->assertJson ([
                "errors" => [
                    'message' => [
                     'Unauthorization'
                    ]

                ]
           ]);

           $user = User::where('username', 'test')->first();
           self::assertNotNull($user->token);
    }


    public function testUpdateUserProfile(): void
    {
        $this->seed(UserSeeder::class);
        $OldUser = User::where('username', 'test')->first();
        $this->put('/api/users/current/profile', [
            'posisi' => 'pendamping desa'

        ],[
            'Authorization' => 'test'

        ])->assertStatus(200)
           ->assertJson ([
                "data" => [
                    'username' => 'test',
                    'nama'   => 'test',

                ]
           ]);

           $NewUser = User::where('username', 'test')->first();
           self::assertNotEquals($OldUser->posisi, $NewUser->posisi);
     }


     public function testUpdateUserProfileFailed(): void
     {
         $this->seed(UserSeeder::class);
         $this->put('/api/users/current/profile', [
             'posisi' => 'pendamping desa'

         ],[
             'Authorization' => 'asdsdas'

         ])->assertStatus(401)
            ->assertJson ([
                "errors" => [
                    'message' => [
                     'Unauthorization'
                    ]

                ]
            ]);


      }


      public function testLogout(): void
      {
          $this->seed(UserSeeder::class);
          $this->delete(uri:'/api/users/current/logout',headers:[
              'Authorization' => 'test'

          ])->assertStatus(200)
             ->assertJson ([
                 "data" => [
                        true
                 ]
             ]);


       }






}
