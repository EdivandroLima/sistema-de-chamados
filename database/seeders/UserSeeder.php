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
        \App\Models\User::factory()->create([
            'email' => 'adm@email.com',
        ])->assignRole(['admin']);

        \App\Models\User::factory()->create([
            'email' => 'user@email.com',
        ])->assignRole(['customer']);
        
        for ($i=0; $i < 100; $i++) { 
            \App\Models\User::factory()->create()->assignRole(['customer']);
        }
    }
}
