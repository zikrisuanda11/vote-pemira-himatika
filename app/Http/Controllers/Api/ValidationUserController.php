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
            ->with('voter')
            ->paginate();

        return $this->success($data);
    }

    public function validating($id_voter)
    {
        $validationUser = ValidationUser::find($id_voter);

        if (!$validationUser) {
            return $this->error('User not found', 404);
        }

        $validationUser->update([
            'status' => 'verified'
        ]);

        return $this->success($validationUser);
    }
}
