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
            'google_id' => '123456789',
            'nim' => '123123123',
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);
        
    }
}
