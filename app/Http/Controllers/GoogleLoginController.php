<?php

namespace App\Http\Controllers;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class GoogleLoginController extends Controller
{
    public function loginPage()
    {
        return inertia('auth/SignIn');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();

        // TODO buat filter email pastikan @students.universitasmulia.ac.id
        $validateEmail = $this->validateEmail($googleUser->email);
        
        if (!$validateEmail) {
            return redirect('/')->with('error', 'Bukan Mahasiswa Universitas Mulia!');
        }

        $validateNim = $this->validateNim($googleUser->user['given_name']);

        if (!$validateNim) {
            return redirect('/')->with('error', 'Bukan Mahasiswa Informatika!');
        }

        $findUser = User::where('google_id', $googleUser->id)->first();

        if ($findUser) {
            auth()->login($findUser);

            return to_route('vote')->with('success', 'You have successfully logged in!');
        }

        User::create([
            'google_id' => $googleUser->id,
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'nim' => $googleUser->user['given_name'],
            'picture' => $googleUser->avatar
        ]);

        return redirect('/')->with('success', 'You have successfully logged in!');
    }

    public function logout()
    {
        auth()->logout();

        return to_route('vote')->with('success', 'You have successfully logged out!');
    }

    public function validateNim($nim)
    {
        if (strlen($nim) === 7) {
            $thirdAndFourthChar = substr($nim, 2, 2);
            if ($thirdAndFourthChar !== '11') {
                return false;
            }
        } else {
            return false;
        }
        return true;
    }

    public function validateEmail($email)
    {
        $emailParts = explode('@', $email);
        if (count($emailParts) !== 2) {
            return false;
        }
        
        $domain = $emailParts[1];
        if ($domain !== 'students.universitasmulia.ac.id') {
            return false;
        }
        
        return true;
    }
}
