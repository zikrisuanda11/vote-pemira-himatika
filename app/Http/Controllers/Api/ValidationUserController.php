<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\ValidationUser;
use App\Http\Controllers\Controller;
use App\Models\User;

class ValidationUserController extends Controller
{
    public function index()
    {
        // TODO buat filter sesuai status
        $data = User::query()
            ->where('role', 'voter')
            ->with('voter')
            ->paginate();

        return $this->success($data);
    }

    public function validating($id_voter)
    {
        // cari dari data user
        $user = User::with('voter')->find($id_voter);
        $validationUser = ValidationUser::find($user->voter->id);

        if (!$validationUser) {
            return $this->error('User not found', 404);
        }

        $validationUser->update([
            'status' => 'verified'
        ]);

        $validationUser->load('user');

        return $this->success($validationUser);
    }
}
