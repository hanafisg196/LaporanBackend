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

        for($i=0; $i < 600; $i++){
            Kegiatan::create([
                'nagari_kunjungan'  => 'Halaban'.$i,
                'kegiatan'          =>  'Pendampingan
                                         Pembinaan bersama adm inspektorat'.$i,
                'hasil'             =>  'Pendampingan
                                         Pembinaan bersama adm inspektora'.$i,
                'langkah'           =>  'Pembinaan bersama adm inspektorat'.$i,
                'rekomendasi'       =>  'Pembinaan bersama adm inspektora'.$i,
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
