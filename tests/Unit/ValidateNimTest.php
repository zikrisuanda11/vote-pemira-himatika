<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Controllers\GoogleLoginController;

class ValidateNimTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function testValidateNim(): void
    {
        $controller = new GoogleLoginController();

        // Test with a valid NIM
        $validNim = '2111003';
        $this->assertTrue($controller->validateNim($validNim));

        // Test with an invalid NIM
        $invalidNim = '2188002';
        $this->assertFalse($controller->validateNim($invalidNim));
    }
}
