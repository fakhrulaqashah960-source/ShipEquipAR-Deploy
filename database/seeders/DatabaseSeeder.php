<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class DatabaseSeeder extends Seeder
{

    public function run(): void
    {

        User::create([

            'name' => 'Admin',

            'email' => 'admin@gmail.com',

            'password' => Hash::make('password'),

            'role' => 'admin',

        ]);



        User::create([

            'name' => 'Test User',

            'email' => 'test@example.com',

            'password' => Hash::make('password'),

            'role' => 'user',

        ]);

    }

}