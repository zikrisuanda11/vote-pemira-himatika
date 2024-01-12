<?php

namespace App\Http\Controllers\Api;

use App\Models\Candidate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    public function index()
    {
        return $this->success(Candidate::all());
    }

    public function show($id)
    {
        $candidate = Candidate::find($id);

        if (!$candidate) {
            return $this->error('Data not found', 404);
        }

        return $this->success($candidate);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'vision' => 'required|string',
            'mission' => 'required|string',
            'candidate_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $path = Storage::put('public/candidate_image', $request->file('candidate_image'));
        $pathUrl = Storage::url($path);

        $candidate = Candidate::create([
            'name' => $request->name,
            'vision' => $request->vision,
            'mission' => $request->mission,
            'candidate_image' => $pathUrl
        ]);

        return $this->success($candidate, 201);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'vision' => 'required|string',
            'mission' => 'required|string',
            'candidate_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $candidate = Candidate::find($request->id);

        if (!$candidate) {
            return $this->error('Data not found', 404);
        }

        if ($request->file('candidate_image')) {
            File::delete(public_path($candidate->candidate_image));

            $path = Storage::put('public/candidate_image', $request->file('candidate_image'));
            $pathUrl = Storage::url($path);

            $candidate->candidate_image = $pathUrl;
        }

        $candidate->update([
            'name' => $request->name,
            'vision' => $request->vision,
            'mission' => $request->mission,
        ]);

        return $this->success($candidate, 200);
    }

    public function destroy($id)
    {
        $candidate = Candidate::find($id);

        if (!$candidate) {
            return $this->error('Data not found', 404);
        }

        File::delete(public_path($candidate->candidate_image));

        $candidate->delete();

        return $this->success('Candidate deleted', 200);
    }
}
