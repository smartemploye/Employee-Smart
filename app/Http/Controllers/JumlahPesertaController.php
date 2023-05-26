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
            ->join('data_magang', 'data_magang.nisn', '=', 'data_magang.nisn')
            ->whereMonth('siswa.tanggal_mulai', '=', date('m'))
            ->whereMonth('siswa.tanggal_selesai', '>=', date('m'))
            ->whereIn('data_magang.status_magang', ['Aktif','Lulus'])
            ->count();
// dd( $jumlahSiswaMagangBulanIni->toSql());
// dd(DB::getQueryLog());
// $query = str_replace(array('?'), array('\'%s\''),  $jumlahSiswaMagangBulanIni->toSql());
// $query = vsprintf($query,  $jumlahSiswaMagangBulanIni->getBindings());
// dd($query);
        return View::make('Jumlahpeserta.dashAdmin', [
            'jumlahSiswaHariIni' => $jumlahSiswaHariIni,
            'jumlahSiswaMagangBulanIni' => $jumlahSiswaMagangBulanIni
        ]);
    }
}
