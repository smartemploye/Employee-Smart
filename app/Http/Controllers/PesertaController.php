<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\DataMagang;
use App\Models\Sekolah;
use App\Models\Siswa;
use Illuminate\Support\Facades\Crypt;

class PesertaController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = Siswa::where('tanggal_masuk','LIKE','%' .$request->search.'%')->paginate(5);
        }else{
            $data = Siswa::paginate(5);
        }

        $data = DB::table('siswa')
        ->join('sekolah','sekolah.id','=','siswa.sekolah_id')
        ->join('data_magang','data_magang.nisn','=','siswa.nisn')
        ->join('pembimbing','pembimbing.nip_pembimbing','=','siswa.nip_pembimbing')
        ->distinct();
        //
        $data= $data ->get([
            'siswa.id',
            'nama_siswa',
            'sekolah.nama_sekolah',
            'tanggal_mulai',
            'tanggal_selesai',
            'judul_project',
            'status_magang',
            'nama_pembimbing',
            'keterangan'
        ]);
        // $enkrip = Crypt::encrypt('8888');
        // echo $enkrip.'<br>';
        // echo Crypt::decrypt($enkrip);
        return view('peserta.index', compact('data'));
        // dd($data);
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
            'keterangan' => $request->keterangan,
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
            'siswa.nisn',
            'nama_sekolah',
            'nama_siswa',
            'tanggal_mulai',
            'tanggal_selesai',
            'nama_pembimbing',
            'status_magang',
            'keterangan',
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

        $siswa = DB::table('siswa')
        ->leftJoin('sekolah','sekolah.id','=','siswa.sekolah_id')
        ->leftJoin('data_magang','data_magang.nisn','=','siswa.nisn')
        ->leftJoin('pembimbing','pembimbing.nip_pembimbing','=','siswa.nip_pembimbing')
        ->leftJoin('data_bidang','data_bidang.id','=','data_magang.bidang_id')
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
            'tanggal_lahir', 'no_wa_pembimbing', 'username', 'password'
        ]);



        // dd($siswa->all());

        return view('peserta.show', compact('siswa'));
    }

    public function update(Request $request/*, $id*/)
    {
        // dd($request->all());
        // $siswa = DB::table('siswa')
        // ->where('id','=',$id)
        // ->update([
        //     'nama_siswa' => $request['nama_siswa'],
        //     'tanggal_mulai' => $request['tanggal_mulai'],
        //     'tanggal_selesai' => $request['tanggal_selesai'],
        //     'sekolah_id' => $request['sekolah_id'],
        //     'nip_pembimbing' => $request['nip_pembimbing'],
        // ]);

        // $nisn = $request['nisn'];

        // $datamagang = DB::table('data_magang')
        // ->where('nisn','=',$nisn)
        // ->update([
        //     'status_magang' => $request['status_magang'],
        //     'judul_project' => $request['judul_project'],
        // ]);
        $updated = Siswa::find($request->id);
            $updated->nama_siswa = $request->nama_siswa;
            $updated->tanggal_mulai = $request->tanggal_mulai;
            $updated->tanggal_selesai = $request->tanggal_selesai;
            $updated->sekolah_id = $request->sekolah_id;
            $updated->nip_pembimbing = $request->nip_pembimbing;
            $updated->keterangan = $request->keterangan;
            $updated->save();
            $nisn_update = $request->nisn;

            $data_magang_up = DataMagang::where('nisn', $nisn_update)->firstOrFail();
            $data_magang_up->status_magang = $request->status_magang;
            $data_magang_up->judul_project = $request->judul_project;
            $data_magang_up->save();
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
