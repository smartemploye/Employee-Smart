<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $id)
    {
        $user=Auth::guard('akun')->user();
        // dd($user);
        $siswa = DB::table('siswa')
        ->leftJoin('sekolah', 'sekolah.id', '=', 'siswa.sekolah_id')
        ->leftJoin('data_magang', 'data_magang.nisn', '=', 'siswa.nisn')
        ->leftJoin('pembimbing', 'pembimbing.nip_pembimbing', '=', 'siswa.nip_pembimbing')
        ->leftJoin('data_bidang', 'data_bidang.id', '=', 'data_magang.bidang_id')
        ->leftJoin('akuns', 'akuns.nisn', '=', 'siswa.nisn')
        ->where('siswa.nisn','=',$user->nisn)
        ->select([
            'siswa.id',
            'siswa.nisn',
            'nama_sekolah',
            'nama_siswa',
            'foto_siswa',
            'no_wa',
            'nama_bidang',
            'tanggal_mulai',
            'tanggal_selesai',
            'nama_pembimbing',
            'status_magang',
            'judul_project',
            'sekolah.id as id_sekolah',
            'siswa.nip_pembimbing as nip',
            'jurusan',
            'tanggal_lahir', 'no_wa_pembimbing', 'username', 'akuns.password AS password',
            'data_magang.bukti_pembayaran','surat_pengajuan'
        ])->first();

        $gambar = $siswa->bukti_pembayaran;

        // dd($siswa);

        // dd(Auth::guard('akun')->user()->siswa->nama_siswa);
        // die();

        // dd(auth()->user()->siswa);


        return view('profile.index', compact('siswa','gambar'));
    }
    public function edit(Request $request)
    {
        return view('profile.edit', [
            'user' => $request->user()
        ]);
    }

}

