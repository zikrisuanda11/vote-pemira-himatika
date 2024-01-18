<?php

namespace App\Http\Controllers\Api;

use App\Models\Vote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class VoteController extends Controller
{
    public function index()
    {
        $data = Vote::query()
            ->with('voter')
            ->with('candidate')
            ->paginate();
        
        return $this->success($data);
    }

    public function vote(Request $request)
    {
        $request->validate([
            'id_candidate' => 'required|integer|exists:candidates,id',
        ]);

        $vote = Vote::where('id_voter', auth()->user()->id)->first();

        if($vote) {
            return $this->error('You already vote', 422);
        }

        if(auth()->user()->voter->status != 'verified') {
            return $this->error('You not verified yet', 422);
        }

        $vote = Vote::create([
            'id_candidate' => $request->id_candidate,
            'id_voter' => auth()->user()->id
        ]);

        $vote->load('voter', 'candidate');

        return $this->success($vote, 201);
    }
}
