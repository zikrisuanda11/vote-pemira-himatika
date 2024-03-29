<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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

        return inertia('statistic/index', [
            'dataCandidate' => $dataCandidate,
            'totalVote' => $totalVote,
            'dataCandidateSatu' => $dataCandidateSatu,
            'dataCandidateDua' => $dataCandidateDua,
        ]);
    }

    public function getVotePersentage()
    {
        $data = DB::table('votes')
            ->select('id_candidate', DB::raw('COUNT(*) as total_suara'))
            ->groupBy('id_candidate')
            ->orderBy('id_candidate', 'asc')
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

        if ($data->count() > 0) {
            $startDate = Carbon::parse($data->first()->tanggal);
            $endDate = Carbon::parse($data->last()->tanggal);

            for($i = $startDate; $i <= $endDate; $i->addDay()){
                if($data->where('tanggal', $i->toDateString())->count() == 0){
                    $missingData = (object) [
                        'tanggal' => $i->toDateString(),
                        'total_suara' => 0,
                    ];
                    $data->push($missingData);
                    $data = $data->sortBy('tanggal')->values();
                }
            }
        }

        $data->transform(function ($item, $key) use ($data) {
            if ($key > 0) {
                $item->total_suara += $data[$key - 1]->total_suara;
            }
            return $item;
        });

        return response()->json($data);
    }
}
