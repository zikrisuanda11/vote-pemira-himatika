<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index()
    {
        $dataCandidate = $this->getVotePersentage();
        $totalVote = Vote::count();
        $dataCandidateSatu = $this->getVoteCandidatePerDay(1);
        $dataCandidateDua = $this->getVoteCandidatePerDay(2);
        $dataCandidateTiga = $this->getVoteCandidatePerDay(3);

        return inertia('statistic/index', [
            'dataCandidate' => $dataCandidate,
            'totalVote' => $totalVote,
            'dataCandidateSatu' => $dataCandidateSatu,
            'dataCandidateDua' => $dataCandidateDua,
            'dataCandidateTiga' => $dataCandidateTiga,
        ]);
    }

    public function getVotePersentage()
    {
        $data = DB::table('votes')
            ->select('id_candidate', DB::raw('COUNT(*) as total_suara'))
            ->groupBy('id_candidate')
            ->get();

        $totalSuara = $data->sum('total_suara');
        $data->transform(function ($item) use ($totalSuara) {
            $item->persentase_suara = round(($item->total_suara / $totalSuara) * 100, 2);
            return $item;
        });

        return response()->json($data);
    }

    public function getVoteCandidatePerDay($id_candidate)
    {
        $data = DB::table('votes')
            ->select(DB::raw('DATE(created_at) as tanggal'), DB::raw('COUNT(*) as total_suara'))
            ->where('id_candidate', $id_candidate)
            ->groupBy('tanggal')
            ->orderBy('tanggal')
            ->get();

        $data->transform(function ($item, $key) use ($data) {
            if ($key > 0) {
                $item->total_suara += $data[$key - 1]->total_suara;
            }
            return $item;
        });

        return response()->json($data);
    }

}
