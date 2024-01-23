<?php

namespace Tests\Unit;

use App\Http\Controllers\GoogleLoginController;
use PHPUnit\Framework\TestCase;

class ValidateUserTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_validate_user()
    {
        $googleUser = (object) [
            'email' => 'zasdfasdfikri@students.universitasmulia.ac.id',
            'user' => [
                'given_name' => '2111003'
            ]
        ];

        $falseGoogleUser = (object) [
            'email' => 'zasdfasdfikri@students.universitasmulia.ac.id',
            'user' => [
                'given_name' => '2188003'
            ]
        ];

        $validateUser = new GoogleLoginController();
        $this->assertTrue($validateUser->validateUser($googleUser)['success']);
        $this->assertFalse($validateUser->validateUser($falseGoogleUser)['success']);
    }
}
