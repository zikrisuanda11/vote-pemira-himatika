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

        $validateDate = $this->validateDate(date('Y-m-d'));

        if(!$validateDate) {
            return session(['error' => 'Voting hanya bisa dilakukan pada tanggal 24, 25, dan 26 Januari 2024']);
        }

        $vote = Vote::where('id_voter', auth()->user()->google_id)->first();

        if($vote) {
            return session(['error' => 'Kamu sudah voting!']);
        }

        $vote = Vote::create([
            'id_candidate' => $request->id_candidate,
            'id_voter' => auth()->user()->google_id
        ]);

        return session(['success' => 'Berhasil Voting!']);
    }

    public function validateDate($dateNow)
    {
        $dateStart = date('Y-m-d', strtotime('2024-01-24'));
        $dateEnd = date('Y-m-d', strtotime('2024-01-26'));

        if($dateNow < $dateStart || $dateNow > $dateEnd) {
            return false;   
        }
        return true;
    }
}
