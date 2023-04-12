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
        ->join('sekolah','sekolah.id','=','siswa.sekolah_id')
        ->join('data_magang','data_magang.nisn','=','siswa.nisn')
        ->join('pembimbing','pembimbing.nip_pembimbing','=','siswa.nip_pembimbing')
        ->distinct()
        ->get([
            'siswa.id',
            'nama_siswa',
            'sekolah.nama_sekolah',
            'tanggal_mulai',
            'tanggal_selesai',
            'judul_project',
            'status_magang',
            'nama_pembimbing'
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
        ->join('sekolah','sekolah.id','=','siswa.sekolah_id')
        ->join('data_magang','data_magang.nisn','=','siswa.nisn')
        ->join('pembimbing','pembimbing.nip_pembimbing','=','siswa.nip_pembimbing')
        ->where('siswa.id','=',$id)
        ->get([
            'siswa.id',
            'nama_sekolah',
            'nama_siswa',
            'tanggal_mulai',
            'tanggal_selesai',
            'nama_pembimbing',
            'status_magang',
            'judul_project',
            'sekolah.id as id_sekolah',
            'siswa.nip_pembimbing as nip'
        ]);

        $sekolah = DB::table('sekolah')
        ->get();

        $pembimbing = DB::table('pembimbing')
        ->get();

        return view('peserta.edit', compact('siswa','sekolah','pembimbing'));
    }

    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);


        return view('peserta.show', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $siswa = DB::table('siswa')
        ->where('id','=',$id)
        ->update([
            'nama_siswa' => $request['nama_siswa'],
            'tanggal_mulai' => $request['tanggal_mulai'],
            'tanggal_selesai' => $request['tanggal_selesai'],
            'sekolah_id' => $request['sekolah_id'],
            'nip_pembimbing' => $request['nip_pembimbing'],
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
