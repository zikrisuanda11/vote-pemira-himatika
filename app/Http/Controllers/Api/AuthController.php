<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ValidationUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if (!$token = auth()->attempt($request->only('email', 'password'))) {
            return response()->json([
                'status' => 'error',
                'message' => 'invalid credentials'
            ], 401);
        }

        $token = auth()->user()->createToken('token')->accessToken;

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil Login',
            'token' => $token
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
            'nik' => 'string',
            'nim' => 'string',
            'validation_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $path = Storage::put('public/voter_identity', $request->file('validation_image'));
        $pathUrl = Storage::url($path);

        $user = User::query()->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'voter',
        ]);

        ValidationUser::create([
            'id_voter' => $user->id,
            'nik' => $request->nik,
            'nim' => $request->nim,
            'staus' => 'not_verified',
            'validation_image' => $pathUrl
        ]);

        $user->load('voter');

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil Register',
            'data' => $user
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil Logout'
        ]);
    }
}
