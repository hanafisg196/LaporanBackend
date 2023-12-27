<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'test',
            'password' => Hash::make('rahasia'),
            'nama' => 'test',
            'email' => 'test@gmail',
            'token'=> 'test',
        ]);


        User::create([
            'username' => 'hafis',
            'password' => Hash::make('123456'),
            'nama' => 'test2',
            'email' => 'test2@gmail',
            'token'=> 'test2',
            'role'=> 'admin',

        ]);



    }
}
