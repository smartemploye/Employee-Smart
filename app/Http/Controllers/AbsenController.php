<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AbsenController extends Controller
{
    public function create()
    {
        return view('apsen.scan');
    }

    public function store(Request $request)
    {
        // dd('simpan');
        // $nisn = $request->input('nisn');
    $nisn = Auth::user()->nisn;
        // Query untuk mendapatkan data siswa berdasarkan NISN
        $siswa = Siswa::where('nisn', $nisn)->first();

        if ($siswa) {
            $existingAbsenMasuk = Absen::where('nisn', $nisn)
                ->whereDate('absen_masuk', Carbon::today()->setTimezone('Asia/Jakarta'))
                ->whereNull('absen_pulang')
                ->first();

            if (empty($existingAbsenMasuk)) {
                $absen = new Absen();
                $absen->nisn = $nisn;
                $absen->siswa_id = $siswa->siswa_id;
                $absen->absen_masuk = Carbon::now('Asia/Jakarta'); // Waktu absen masuk dengan zona waktu WIB
                $absen->status_absen = 'hadir'; // Status absen hadir
                $absen->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Absen masuk berhasil disimpan'
                ]);

                // return redirect()->route('absen.create')->with('success', 'Absen masuk berhasil disimpan.');
            } else {
                $existingAbsenMasuk->absen_pulang = Carbon::now('Asia/Jakarta');
                $existingAbsenMasuk->save();

                return response()->json([
                    'success' => true,
                    'message' => 'Absen pulang berhasil disimpan'
                ]);

                // return redirect()->back()->with('success', 'Absen pulang berhasil disimpan.');
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'NISN tidak valid'
            ]);
            // return redirect()->back()->with('error', 'NISN tidak valid.');
        }
    }

    public function Absen(Request $request)
    {
        $jenis = $request->jenis;
        $login = Auth::user();
        $nisn = $login->nisn;

        if ($jenis == 'masuk') {
            $absen = new Absen();
            $absen->nisn = $nisn;
            $absen->absen_masuk = Carbon::now('Asia/Jakarta');
            $absen->status_absen = 'hadir'; // Set status absen menjadi 'hadir'
            $absen->save();
            $proses = true;
        } else if ($jenis == 'keluar') {
            $absen = Absen::where('nisn', '=', $nisn)
                ->whereDate('absen_masuk', Carbon::today()->setTimezone('Asia/Jakarta'))
                ->whereNull('absen_pulang')
                ->first();

            if ($absen) {
                $absen->absen_pulang = Carbon::now('Asia/Jakarta');
                $absen->save();
                $proses = true;
            } else {
                $proses = false;
            }
        }

        if (!$proses) {
            $result = [
                'status' => 400,
                'message' => 'Tidak bisa absen keluar sebelum absen masuk'
            ];
        } else {
            $result = [
                'status' => 200,
                'message' => 'Berhasil Absen'
            ];
        }

        return response()->json($result);
    }
}
