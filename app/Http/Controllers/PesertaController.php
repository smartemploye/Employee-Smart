<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\DataMagang;
use App\Models\Sekolah;
use App\Models\Siswa;

class PesertaController extends Controller
{
    public function index()
    {
        $data = DB::table('siswa')
        ->distinct()
        ->join('sekolah','sekolah.id','=','siswa.sekolah_id')
        ->join('data_magang','data_magang.nisn','=','siswa.nisn')
        ->join('pembimbing','pembimbing.nip_pembimbing','=','siswa.nip_pembimbing')
        ->get([
            'siswa.id','nama_siswa','nama_sekolah','tanggal_mulai','tanggal_selesai',
            'judul_project','status_magang','nama_pembimbing'
        ]);
        return view('peserta.index', compact('data'));
    }

    public function create()
    {
        $dtsklh = DB::table('sekolah')
        ->get();
        return view('peserta.create', compact('dtsklh'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        Siswa::create([
            'nama_siswa' => $request->nama_siswa,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'sekolah_id' => $request->sekolah_id,
            'nama_pembimbing' => $request->nama_pembimbing,
        ]);

        DataMagang::create([
            'status_magang' => $request->status_magang,
            'judul_project' => $request->judul_project,
        ]);
        return redirect('/peserta');
    }

    public function edit($id)
    {
        $siswa = DB::table('siswa')
        ->where('id','=',$id)
        ->get();

        return view('peserta.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $siswa = DB::table('siswa')
        ->where('id','=',$id)
        ->update([
            'izin_dari' => $request['izin_dari'],
            'nama_siswa' => $request['nama_siswa'],
            'tanggal_mulai' => $request['tanggal_mulai'],
            'tanggal_selesai' => $request['tanggal_selesai'],
            'nama_sekolah' => $request['nama_sekolah'],
            'nama_pembimbing' => $request['nama_pembimbing'],
        ]);
        $datamagang = DB::table('data_magang')
        ->where('id','=',$id)
        ->update([
            'status_magang' => $request['status_magang'],
            'judul_project' => $request['judul_project'],
        ]);
        return redirect('/peserta');
    }

    public function destroy($id)
    {
        $siswa = DB::table('siswa')
        ->where('id','=',$id)
        ->delete();

        return back();
    }

}
