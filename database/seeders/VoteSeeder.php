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
        for ($i = 0; $i < 100; $i++) {
            $idCandidate = rand(1, 2);
            
            $startDate = strtotime('2024-01-24');
            $endDate = strtotime('2024-01-27');

            $createdAt = date('Y-m-d H:i:s', $startDate + rand(0, $endDate - $startDate));

            Vote::create([
                'id_candidate' => $idCandidate,
                'id_voter' => '108921521398512041897',
                'created_at' => $createdAt,
            ]);
        }
    
    }
}
