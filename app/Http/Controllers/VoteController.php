<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function index()
    {
        $candidates = Candidate::all();

        return inertia('vote/index', [
            'candidates' => $candidates
        ]);
    }

    public function vote(Request $request)
    {
        $request->validate([
            'id_candidate' => 'required|integer|exists:candidates,id',
        ]);

        $vote = Vote::where('id_voter', auth()->user()->google_id)->first();

        if($vote) {
            return session(['error' => 'Kamu sudah voting!']);
        }

        $vote = Vote::create([
            'id_candidate' => $request->id_candidate,
            'id_voter' => auth()->user()->google_id
        ]);

        return session(['success' => 'Berhasil Voting Cuy!']);
    }
}
