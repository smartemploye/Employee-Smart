<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraphController extends Controller
{
    public function showMap()
    {
        $statuses = DB::table('data_magang')->pluck('status_magang')->toArray();

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

        return view('report.showMap', ['labels' => $labels, 'prices' => $prices]);
    }
}
