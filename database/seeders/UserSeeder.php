<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Atmin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'), // Jangan lupa ganti dengan password yang lebih aman
                'role' => 'admin',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Panasea',
                'email' => 'psikolog@example.com',
                'password' => Hash::make('password'), // Ganti juga password ini
                'role' => 'psikolog',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mas Nur',
                'email' => 'user@example.com',
                'password' => Hash::make('password'), // Password user
                'role' => 'user',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
