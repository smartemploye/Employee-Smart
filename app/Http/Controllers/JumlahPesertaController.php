<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class JumlahPesertaController extends Controller
{
    public function jumlahPeserta()
    {
        $jumlahSiswaHariIni = DB::table('absen')
            ->whereDate('absen.absen_masuk', date('Y-m-d'))
            ->count();

        $jumlahSiswaMagangBulanIni = DB::table('siswa')
            ->join('absen', 'siswa.nisn', '=', 'absen.nisn')
            ->whereMonth('siswa.tanggal_mulai', '=', date('m'))
            ->whereMonth('siswa.tanggal_selesai', '>=', date('m'))
            ->count();

        return View::make('Jumlahpeserta.dashAdmin', [
            'jumlahSiswaHariIni' => $jumlahSiswaHariIni,
            'jumlahSiswaMagangBulanIni' => $jumlahSiswaMagangBulanIni
        ]);
    }
}
