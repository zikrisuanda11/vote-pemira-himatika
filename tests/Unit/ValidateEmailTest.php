<?php

namespace Tests\Unit;

use App\Http\Controllers\GoogleLoginController;
use PHPUnit\Framework\TestCase;

class ValidateEmailTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_email()
    {
        $googleLogin = new GoogleLoginController();

        $this->assertFalse( $googleLogin->validateEmail('zikri@gmail.com'));
        $this->assertTrue( $googleLogin->validateEmail('zasdfasdfikri@students.universitasmulia.ac.id'));
        // $this->assertTrue( $googleLogin->validateEmail('zasdfasdfikri@students.universitasmulia.ac.idd'));

        dd(
            $googleLogin->validateEmail('zikri@gmail.com'), 
            $googleLogin->validateEmail('zikri@students.universitasmulia.ac.id'),
            $googleLogin->validateEmail('zasdfasdfikri@sudents.universitasmulia.ac.id')
        );
        
    }
}
