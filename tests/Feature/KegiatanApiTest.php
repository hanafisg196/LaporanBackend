<?php

namespace Tests\Feature;

use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KegiatanApiTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testCreate(): void
    {
       $this->seed(UserSeeder::class);
       $this->post('/api/kegiatan',
       [
            'nagari_kunjungan'  => 'labuan bajo',
            'kegiatan'          =>  'test',
            'hasil'             =>  'test',
            'langkah'           =>  'test',
            'rekomendasi'       =>  'test'
       ],

       [
        'Authorization' => 'test'
       ])->assertStatus(201)
        ->assertJson([
            "data" =>[
                'nagari_kunjungan'  => 'labuan bajo',
                'kegiatan'          =>  'test',
                'hasil'             =>  'test',
                'langkah'           =>  'test',
                'rekomendasi'       =>  'test'
            ]
        ]);
    }


    public function testCreateFailed(): void
    {
       $this->seed(UserSeeder::class);
       $this->post('/api/kegiatan',
       [
            'nagari_kunjungan'  => 'labuan bajo',
            'kegiatan'          =>  'test',
            'hasil'             =>  'test',
            'langkah'           =>  'test',
            'rekomendasi'       =>  'test'
       ],

       [
        'Authorization' => 'dasdasdasda'
       ])->assertStatus(401)
        ->assertJson([
            "errors" =>[
                'message' =>[
                    'Unauthorization'
                ]
            ]
        ]);
    }
}
