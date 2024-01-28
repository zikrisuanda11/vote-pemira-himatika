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

        $validNim = '2111003';
        $this->assertTrue($controller->validateNim($validNim));

        $invalidNim = '2188002';
        $this->assertFalse($controller->validateNim($invalidNim));

        $invalidNim = '1911001';
        $this->assertTrue($controller->validateNim($invalidNim));
    }
}
