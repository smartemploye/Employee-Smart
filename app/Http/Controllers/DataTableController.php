<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DataTable;
use Illuminate\Support\Facades\View;

class DataTableController extends Controller
{
        public function datatable()
        {

                $siswaData = DB::table('siswa')
                        ->leftJoin('sekolah', 'sekolah.id', '=', 'siswa.sekolah_id')
                        ->leftJoin('data_magang', 'data_magang.nisn', '=', 'siswa.nisn')
                        ->get([

                                'siswa.nisn',

                                'nama_siswa',

                                'tanggal_mulai',
                                'tanggal_selesai',

                                'data_magang.status_magang',

                        ]);

                return View::make('report.datatable', ['siswaData' => $siswaData]);
        }
}
