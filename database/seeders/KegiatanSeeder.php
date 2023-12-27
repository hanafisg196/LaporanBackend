<?php

namespace Database\Seeders;

use App\Models\Kegiatan;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('username', 'test')->first();

        for($i=0; $i < 20; $i++){
            Kegiatan::create([
                'nagari_kunjungan'  => 'kontol'.$i,
                'kegiatan'          =>  'test'.$i,
                'hasil'             =>  'test'.$i,
                'langkah'           =>  'test'.$i,
                'rekomendasi'       =>  'test'.$i,
                'user_id'       =>  $user->id

            ]);
        }

        Kegiatan::create([
            'nagari_kunjungan'  => 'labuan bajo',
            'kegiatan'          =>  'test',
            'hasil'             =>  'test',
            'langkah'           =>  'test',
            'rekomendasi'       =>  'test',
            'user_id'       =>  $user->id

        ]);




    }
}
