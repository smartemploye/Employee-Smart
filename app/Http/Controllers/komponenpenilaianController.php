<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\KomponenPenilaian;
// use File;

class komponenpenilaianController extends Controller
{

    //Berhasil
    public function create()
    {
        return view('komponenpenilaian.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'penilaian_kepribadian' => 'required',
            'penilaian_keahlian' => 'required',
            'operating_system' => 'required',

        ]);



        DB::table('komponen_penilaian')->insert([
            'penilaian_kepribadian' => $request['penilaian_kepribadian'],
            'disiplin_waktu' => 100,
            'inisatif_dan_kreatifitas' => 100,
            'sikap_dan_disiplin' => 100,
            
            'penilaian_keahlian' => $request['penilaian_keahlian'],
            'operating_system' => $request['operating_system'],
            'ms_office' => 100,
            'instalasi_sistem' => 100,


        ]);

        return redirect('/komponenpenilaian');

    }

    public function index()
    {
        $komponenpenilaian = DB::table('komponen_penilaian')->get();
        // dd($logbook);
 
        return view('komponenpenilaian.tampil', ['komponenpenilaian' => $komponenpenilaian]);
    }

    public function show($id)
    {
        $komponenpenilaian = KomponenPenilaian::find($id);
        // dd($komponenpenilaian);

        return view('komponenpenilaian.detail', ['komponenpenilaian' => $komponenpenilaian]);
    }

    public function edit($id)
    {
        $komponenpenilaian = DB::table('komponen_penilaian')->where('id', $id)->first();

        return view('komponenpenilaian.edit', ['komponenpenilaian' => $komponenpenilaian]); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'penilaian_kepribadian' => 'required',
            'penilaian_keahlian' => 'required',
            'operating_system' => 'required',

        ]);

        DB::table('komponen_penilaian')
              ->where('id', $id)
              ->update(
                [
                    'penilaian_kepribadian' => $request['penilaian_kepribadian'],
                    'disiplin_waktu' => 100,
                    'inisatif_dan_kreatifitas' => 100,
                    'sikap_dan_disiplin' => 100,
                    
                    'penilaian_keahlian' => $request['penilaian_keahlian'],
                    'operating_system' => $request['operating_system'],
                    'ms_office' => 100,
                    'instalasi_sistem' => 100,
                ],
            );
        return redirect('/komponenpenilaian');
    }

    public function destroy($id)
    {
        DB::table('komponen_penilaian')->where('id', $id)->delete();

        return redirect('/komponenpenilaian');
    }
    
}

