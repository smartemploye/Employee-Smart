<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ProfilePembimbingController extends Controller
{
    public function index()
    {
        $pembimbing = DB::table('pembimbing')
        ->join('sekolah','sekolah.id','=','pembimbing.sekolah_id')
        ->join('siswa','siswa.nip_pembimbing','=','pembimbing.nip_pembimbing')
        ->join('data_magang','data_magang.nisn','=','siswa.nisn')
        ->where('pembimbing.nip_pembimbing','=', auth()->user()->pembimbing->nip_pembimbing)
        ->get([
            'pembimbing.id AS pembimbing_id','pembimbing.nip_pembimbing', 'nama_pembimbing', 'no_wa_pembimbing', 'nama_sekolah',
            'nama_siswa','tanggal_mulai','tanggal_selesai','keterangan','status_magang','nama_sekolah','judul_project',
            'siswa.id AS siswa_id'
        ]);

        return view('profile_pembimbing.index',compact('pembimbing'));
    }

    public function show($id)
    {
        //ambil gambar dari tabel data_magang kolom Bukti pembayaran

        $siswa = DB::table('siswa')
        ->leftJoin('sekolah', 'sekolah.id', '=', 'siswa.sekolah_id')
        ->leftJoin('data_magang', 'data_magang.nisn', '=', 'siswa.nisn')
        ->leftJoin('pembimbing', 'pembimbing.nip_pembimbing', '=', 'siswa.nip_pembimbing')
        ->leftJoin('data_bidang', 'data_bidang.id', '=', 'data_magang.bidang_id')
        ->leftJoin('akuns', 'akuns.nisn', '=', 'siswa.nisn')
        ->where('siswa.id','=',$id)
        ->get([
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
            'data_magang.bukti_pembayaran'
        ]);


        // ambil url gambar
        $gambar = $siswa[0]->bukti_pembayaran;
        // dd($siswa->all());

        return view('peserta.show', compact('siswa', 'gambar'));
    }

}
