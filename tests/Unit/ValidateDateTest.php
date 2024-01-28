<?php

namespace Tests\Unit;

use App\Http\Controllers\VoteController;
use PHPUnit\Framework\TestCase;

class ValidateDateTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function testValidateDate()
    {
        $vote = new VoteController();

        // $this->assertFalse($vote->validateDate(date('Y-m-d', strtotime('2024-01-23'))));
        // $this->assertTrue($vote->validateDate(date('Y-m-d', strtotime('2024-01-24'))));
        // $this->assertTrue($vote->validateDate(date('Y-m-d', strtotime('2024-01-25'))));
        // $this->assertTrue($vote->validateDate(date('Y-m-d', strtotime('2024-01-26'))));
        // $this->assertFalse($vote->validateDate(date('Y-m-d', strtotime('2024-01-27'))));
        // $this->assertFalse($vote->validateDate(date('Y-m-d', strtotime('2024-01-28'))));
    }
}
