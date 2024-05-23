<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@example.com',
            'username' => 'admin',
            'role' => 'admin',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'TestUser',
            'email' => 'user@example.com',
            'username' => 'user',
            'role' => 'user',
        ]);
    }
}
