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
        $message = [
            'izin_dari.required' => 'Form harus diisi.',
            'izin_sampai.after_or_equal' => 'Tanggal izin tidak boleh diisi dengan tanggal sebelum hari ini.',
            'keterangan.required' => 'Keterangan harus diisi.',
        ];

        $request->validate([
            'izin_dari' => 'required',
            'izin_sampai' => 'required|date|after_or_equal:today',
            'keterangan' => 'required',
        ], $message);

        $status = "proses";
        $data = [
            //ica membuat padasaat izin bedasarkan siswa_id. seharusnya menggunakan nisn
            'siswa_id'=>Auth::user()->siswa->id,
            //Abdul membuat Pada saat absen scan menggunakan nisn berdasarkan erd
            'nisn' => Auth::user()->siswa->nisn,
            'izin_dari' => $request->izin_dari,
            'izin_sampai' => $request->izin_sampai,
            'keterangan' => $request->keterangan,
            'approve' => $status,
            // dd($request->all())
        ];
        // dd($data);
        Absen::create($data);
        return redirect('/perizinan');
        session()->flash('success', 'Data berhasil ditambahkan.');
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

        return view('izin_admin.edit', compact('perizinan'));
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

         return view('izin_admin.index', compact('perizinan'));
    }

    public function destroy($id)
    {
        $databsen = DB::table('absen')
        ->where('id','=',$id)
        ->delete();

        return back();
    }

}
