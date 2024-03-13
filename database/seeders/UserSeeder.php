<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::truncate();
        $faker = \Faker\Factory::create();
        
        $password = Hash::make('123123');
        User::create([
            'name' => 'Usuario Pruebas',
            'email' => 'pruebas@algo.com', 
            'password' => $password
        ]);
    }
}
