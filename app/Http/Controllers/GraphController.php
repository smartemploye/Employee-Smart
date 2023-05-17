<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GraphController extends Controller
{
    public function showMap()
    {
        return view('report.showMap');
    }
    public function Chart(Request $request)
    {
        $db = DB::table('data_magang');
        $db->join('siswa', 'siswa.nisn', '=', 'data_magang.nisn');
        $db->where(DB::raw('substr(siswa.tanggal_mulai,1,7)'), '=', $request->tanggal);
        $statuses = $db->pluck('status_magang')->toArray();

        // Menghapus nilai non-string dan non-integer dari array $statuses
        $statuses = array_filter($statuses, function ($value) {
            return is_string($value) || is_int($value);
        });

        $statusCounts = array_count_values($statuses);

        $labels = [];
        $prices = [];

        foreach ($statusCounts as $status => $count) {
            $labels[] = $status;
            $prices[] = $count;
        }
        return response()->json(['labels' => $labels, 'prices' => $prices]);
    }
}
