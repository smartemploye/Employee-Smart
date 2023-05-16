<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    public function scanMasuk(Request $request)
    {
        $nisn = $request->result1;

        $absenMasuk = Absen::where('nisn', $nisn)
            ->whereDate('created_at', Carbon::today())
            ->whereNotNull('jam_masuk')
            ->first();

        if ($absenMasuk) {
            return redirect()->back()->with('error', 'Siswa sudah melakukan absen masuk hari ini');
        }

        $absen = new Absen();
        $absen->nisn = $nisn;
        $absen->jam_masuk = Carbon::now();
        $absen->status = 'masuk';
        $absen->save();

        return redirect()->back()->with('success', 'Absen masuk berhasil');
    }

    public function scanKeluar(Request $request)
    {
        $nisn = $request->result2;

        $absenPulang = Absen::where('nisn', $nisn)
            ->whereDate('created_at', Carbon::today())
            ->whereNotNull('jam_pulang')
            ->first();

        if ($absenPulang) {
            return redirect()->back()->with('error', 'Siswa sudah melakukan absen pulang hari ini');
        }

        $absen = Absen::where('nisn', $nisn)
            ->whereDate('created_at', Carbon::today())
            ->first();

        if (!$absen || $absen->jam_pulang !== null) {
            return redirect()->back()->with('error', 'Siswa belum melakukan absen masuk atau sudah melakukan absen pulang');
        }

        $absen->jam_pulang = Carbon::now();
        $absen->status = 'pulang';
        $absen->save();

        return redirect()->back()->with('success', 'Absen pulang berhasil');
    }
}
