<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DataTable;

class DataTableController extends Controller
{
        public function datatable()
        {
        return view('report.datatable');
        }
}
