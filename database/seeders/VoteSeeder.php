<?php

namespace Database\Seeders;

use App\Models\Vote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vote::create([
            'id_candidate' => 1,
            'id_voter' => '123456789'
        ]);
        Vote::create([
            'id_candidate' => 1,
            'id_voter' => '123456789'
        ]);
        Vote::create([
            'id_candidate' => 1,
            'id_voter' => '123456789'
        ]);
        Vote::create([
            'id_candidate' => 1,
            'id_voter' => '123456789'
        ]);

        Vote::create([
            'id_candidate' => 2,
            'id_voter' => '123456781'
        ]);

        Vote::create([
            'id_candidate' => 3,
            'id_voter' => '123456783'
        ]);
        Vote::create([
            'id_candidate' => 3,
            'id_voter' => '123456783'
        ]);
        Vote::create([
            'id_candidate' => 3,
            'id_voter' => '123456783'
        ]);
    }
}
