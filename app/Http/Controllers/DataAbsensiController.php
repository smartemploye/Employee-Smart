<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class DataAbsensiController extends Controller
{
    public function absensi()
    {
        $siswaData = DB::table('absen')
            ->join('siswa', 'absen.nisn', '=', 'siswa.nisn')
            ->select('siswa.nama_siswa', 'siswa.nisn', 'absen.absen_masuk', 'absen.absen_pulang', 'absen.status_absen', 'absen.keterangan')
            ->get();
    
        return View::make('dataabsensi.absensi', ['siswaData' => $siswaData]);
    }
    
}
