<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Penilaian;
use App\Models\KomponenPenilaian;
use Illuminate\Database\Migrations\Migration;
// use File;

class PenilaianController extends Controller
{

    //Berhasil

    public function index()
    {
        $komponen = KomponenPenilaian::all();
        $penilaian = DB::table('siswa')->leftjoin('penilaian', 'siswa.id', '=', 'penilaian.id_siswa')->get();
        // $penilaian = DB::table('siswa')->get();
        // dd($penilaian);
        // dd($penilaian);
        return view('penilaian.tampil', ['penilaian' => $penilaian, 'komponen' => $komponen]);
    }


    public function edit($id)
    {
        $komponen = KomponenPenilaian::all();
        $penilaian = DB::table('siswa')->select('siswa.id', 'siswa.nama_siswa', 'penilaian.*')->leftjoin('penilaian', 'penilaian.id_siswa', '=', 'siswa.id')->where('siswa.id', $id)->first();
        // dd($penilaian);
        return view('penilaian.edit', ['penilaian' => $penilaian, 'komponen' => $komponen]);
    }

    // public function update(Request $request, $id)
    // {

    //     $data = $request->all();
    //     $check = DB::table('penilaian')->where('id_siswa', $id)->count();
    //     if ($check > 0) {
    //         DB::table('penilaian')
    //         ->where('id_siswa', $id)
    //         ->update(
    //             $data
    //         );
    //     } else {
    //         $data['id_siswa'] = $id;
    //         // dd($data);
    //         DB::table('penilaian')->create($data);
    //     }
    //     return redirect('/penilaian');
    // }

    //openAI solusi
        public function update(Request $request, $id)
    {
        $data = $request->except(['_token', '_method']);
        $check = DB::table('penilaian')->where('id_siswa', $id)->count();
        if ($check > 0) {
            DB::table('penilaian')
                ->where('id_siswa', $id)
                ->update($data);
        } else {
            $data['id_siswa'] = $id;
            DB::table('penilaian')->insert($data);
        }
        return redirect('/penilaian');
    }


    public function destroy($id)
    {
        DB::table('penilaian')->where('id_penilaian', $id)->delete();

        return redirect('/penilaian');
    }
}
