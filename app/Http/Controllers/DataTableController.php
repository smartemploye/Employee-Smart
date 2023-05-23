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
                ->leftJoin('absen', 'absen.nisn', '=', 'siswa.nisn')
                ->select('siswa.nisn', 'siswa.nama_siswa', 'siswa.tanggal_mulai', 'siswa.tanggal_selesai', 'data_magang.status_magang', DB::raw('COUNT(absen.status_absen) as jumlah_hadir'))
                ->groupBy('siswa.nisn', 'siswa.nama_siswa', 'siswa.tanggal_mulai', 'siswa.tanggal_selesai', 'data_magang.status_magang')
                ->get();
    
            return View::make('report.datatable', ['siswaData' => $siswaData]);
        }
}
