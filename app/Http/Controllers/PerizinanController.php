<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Absen;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;

class PerizinanController extends Controller
{
    public function index()
    {
        $perizinan = DB::table('absen')
        ->where('nisn','=',auth()->user()->siswa->nisn)
        ->get(['id','izin_dari','izin_sampai', 'keterangan', 'approve', 'dokumentasi']);
        // dd($perizinan);
        return view('perizinan.index', compact('perizinan'));
    }

    public function index_admin()
    {
        $perizinan = DB::table('absen')
        ->get();
        return view('izin_admin.index', compact('perizinan'));
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
            'dokumentasi.required' => 'Form harus diisi!',

        ];

        $request->validate([
            'izin_dari' => 'required',
            'izin_sampai' => 'required|date|after_or_equal:today',
            'keterangan' => 'required',
            'dokumentasi' => 'required',
        ], $message);

        $dokumentasi = $request->dokumentasi;
        $file_dokumentasi = $dokumentasi->getClientOriginalName();
        // dd($file_dokumentasi);

        $status = "proses";
        $data = [
            //ica membuat padasaat izin bedasarkan siswa_id. seharusnya menggunakan nisn
            // 'siswa_id'=>Auth::user()->siswa->id,
            //Abdul membuat Pada saat absen scan menggunakan nisn berdasarkan erd
            'nisn' => Auth::user()->siswa->nisn,
            'izin_dari' => $request->izin_dari,
            'izin_sampai' => $request->izin_sampai,
            'keterangan' => $request->keterangan,
            'dokumentasi' =>  $file_dokumentasi,
            'approve' => $status,
            // dd($request->all())
        ];


        // dd($data);
        Absen::create($data);

        $dokumentasi->move(public_path().'/image/dokumentasi', $file_dokumentasi);
        return redirect('/perizinan');
        session()->flash('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $perizinan = DB::table('siswa')
        ->join('absen','absen.nisn','=','siswa.nisn')
        ->where('absen.id','=',$id)
        ->whereNotIn('absen.keterangan',[''])
        ->get([
            'izin_dari','izin_sampai','absen.keterangan AS keterangan','approve','absen.siswa_id AS id',
            'siswa.nama_siswa','absen.id AS absen_id','dokumentasi','siswa.nisn'
        ]);

        return view('izin_admin.edit', compact('perizinan'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        $databsen = DB::table('absen')
        ->where('id','=',$id)
        ->update([
            'approve' => $request->approve,
        ]);

         return redirect('izin_admin');
    }

    public function destroy($id)
    {
        $databsen = DB::table('absen')
        ->where('id','=',$id)
        ->delete();

        return back();
    }

}
