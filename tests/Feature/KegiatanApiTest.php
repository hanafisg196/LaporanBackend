<?php

namespace Tests\Feature;

use App\Models\Kegiatan;
use Database\Seeders\KegiatanSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
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

    public function testUpdateKegiatanSuccess(): void
    {
       $this->seed([UserSeeder::class,KegiatanSeeder::class]);
       $kegiatan = Kegiatan::limit(1)->first();
       $this->put('/api/kegiatan/'.$kegiatan->id,
       [
            'nagari_kunjungan'  => 'lalatina',

       ],

       [
        'Authorization' => 'test'
       ])->assertStatus(200)
        ->assertJson([
            "data" =>[
                'nagari_kunjungan'  => 'lalatina',

            ]
        ]);
    }


    public function testUpdateKegiatanFailed(): void
    {
       $this->seed([UserSeeder::class,KegiatanSeeder::class]);
       $kegiatan = Kegiatan::limit(1)->first();
       $this->put('/api/kegiatan/'.$kegiatan->id+111,
       [
            'nagari_kunjungan'  => 'lalatina',

       ],

       [
        'Authorization' => 'test'
       ])->assertStatus(404)
        ->assertJson([
            "errors" =>[
                'message' =>[
                    'Not Found'
                ]
            ]
        ]);
    }

    public function testKegitanDelete(): void
    {
       $this->seed([UserSeeder::class,KegiatanSeeder::class]);
       $kegiatan = Kegiatan::limit(1)->first();
       $this->delete('/api/kegiatan/'.$kegiatan->id,
       [

       ],

       [
        'Authorization' => 'test'
       ])->assertStatus(200)
        ->assertJson([
            "data" =>[
                true
            ]
        ]);
    }

    public function testSearch(): void
    {
       $this->seed([UserSeeder::class,KegiatanSeeder::class]);

       $response = $this->get('/api/kegiatan/search?nagari=kontol',
       [
        'Authorization' => 'test'
       ])->assertStatus(200)->json();

       Log::info(json_encode($response, JSON_PRETTY_PRINT));

       self::assertEquals(10, count($response['data']));
       self::assertEquals(20, $response['meta']['total']);


    }


    public function testSearchFailed(): void
    {
       $this->seed([UserSeeder::class,KegiatanSeeder::class]);

       $response = $this->get('/api/kegiatan/search?nagari=ptk',
       [
        'Authorization' => 'test'
       ])->assertStatus(200)->json();

       Log::info(json_encode($response, JSON_PRETTY_PRINT));

       self::assertEquals(0, count($response['data']));


    }

    public function testPagination(): void
    {
       $this->seed([UserSeeder::class,KegiatanSeeder::class]);

       $response = $this->get('/api/kegiatan/search?size=5&page=2',
       [
        'Authorization' => 'test'
       ])->assertStatus(200)->json();

       Log::info(json_encode($response, JSON_PRETTY_PRINT));

       self::assertEquals(5, count($response['data']));
       self::assertEquals(21, $response['meta']['total']);
       self::assertEquals(2, $response['meta']['current_page']);


    }


    public function testLatest(): void
    {
       $this->seed([UserSeeder::class,KegiatanSeeder::class]);

       $response = $this->get('/api/kegiatan/latest?size=5&page=2',
       [
        'Authorization' => 'test'
       ])->assertStatus(200)->json();

       Log::info(json_encode($response, JSON_PRETTY_PRINT));

       self::assertEquals(5, count($response['data']));
       self::assertEquals(21, $response['meta']['total']);
       self::assertEquals(2, $response['meta']['current_page']);


    }


    public function testFilterDataBydate(): void
    {
       $this->seed([UserSeeder::class,KegiatanSeeder::class]);

       $response = $this->get('/api/kegiatan/filterBydate?start_date=2023-12-01&end_date=2023-12-29',
       [
        'Authorization' => 'test'
       ])->assertStatus(200)->json();

       Log::info(json_encode($response, JSON_PRETTY_PRINT));

       self::assertEquals(21, count($response['data']));



    }




}
