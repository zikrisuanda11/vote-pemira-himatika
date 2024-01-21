<?php

namespace Tests\Unit;

use App\Http\Controllers\StatisticController;
use Tests\TestCase;

class StatisticTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_get_data_cadidate_perday()
    {
        $statistic = new StatisticController();
        error_log($statistic->getVoteCandidatePerDay(2));

    }
}
