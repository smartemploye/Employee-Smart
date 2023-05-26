<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Absen;
use Illuminate\Support\Facades\Auth;

class PerizinanController extends Controller
{
    public function index()
    {
        $perizinan = DB::table('absen')
        ->where('siswa_id','=',auth()->user()->siswa->id)
        ->get(['id','izin_dari','izin_sampai', 'keterangan', 'approve']);
        // dd($perizinan);
        return view('perizinan.index', compact('perizinan'));
    }

    public function create()
    {
        return view('perizinan.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $status = "proses";
        $data = [
            'siswa_id'=>Auth::user()->siswa->id,
            'izin_dari' => $request->izin_dari,
            'izin_sampai' => $request->izin_sampai,
            'keterangan' => $request->keterangan,
            'approve' => $status,
            // dd($request->all())
        ];
        // dd($data);
        Absen::create($data);
        return redirect('/perizinan');
    }

    public function edit($id)
    {
        $perizinan = DB::table('siswa')
        ->join('absen','absen.siswa_id','=','siswa.id')
        ->where('absen.siswa_id','=',$id)
        ->whereNotIn('absen.keterangan',[''])
        ->get([
            'izin_dari','izin_sampai','absen.keterangan AS keterangan','approve','absen.siswa_id AS id',
            'siswa.nama_siswa','absen.id AS absen_id'
        ]);

        return view('izin_admin.index', compact('perizinan'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $databsen = DB::table('absen')
        ->where('siswa_id','=',$id)
        ->update([
            'approve' => $request->approve,
        ]);

        $perizinan = DB::table('siswa')
        ->join('absen','absen.siswa_id','=','siswa.id')
        ->where('absen.siswa_id','=',$id)
        ->whereNotIn('absen.keterangan',[''])
        ->get([
            'izin_dari','izin_sampai','absen.keterangan AS keterangan','approve','absen.siswa_id AS id',
            'siswa.nama_siswa','absen.id AS absen_id'
        ]);

         return view('perizinan.index', compact('perizinan'));
    }

    public function destroy($id)
    {
        $databsen = DB::table('absen')
        ->where('id','=',$id)
        ->delete();

        return back();
    }

}
