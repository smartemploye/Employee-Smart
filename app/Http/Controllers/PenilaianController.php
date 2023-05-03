<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Penilaian;
// use File;

class PenilaianController extends Controller
{

    //Berhasil
    public function create()
    {
        return view('penilaian.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'penilaian_kepribadian' => 'required',
            'penilaian_keahlian' => 'required',
            'operating_system' => 'required',

        ]);



        DB::table('penilaian')->insert([
            'penilaian_kepribadian' => $request['penilaian_kepribadian'],
            'disiplin_waktu' => 100,
            'inisatif_dan_kreatifitas' => 100,
            'sikap_dan_disiplin' => 100,
            
            'penilaian_keahlian' => $request['penilaian_keahlian'],
            'operating_system' => $request['operating_system'],
            'ms_office' => 100,
            'instalasi_sistem' => 100,


        ]);

        return redirect('/penilaian');

    }

    public function index()
    {
        $penilaian = DB::table('penilaian')->get();
        // dd($logbook);
 
        return view('penilaian.tampil', ['penilaian' => $penilaian]);
    }

    public function show($id)
    {
        $penilaian = Penilaian::find($id);
        // dd($komponenpenilaian);

        return view('penilaian.detail', ['penilaian' => $penilaian]);
    }

    public function edit($id)
    {
        $penilaian = DB::table('penilaian')->where('id', $id)->first();

        return view('penilaian.edit', ['penilaian' => $penilaian]); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'penilaian_kepribadian' => 'required',
            'penilaian_keahlian' => 'required',
            'operating_system' => 'required',

        ]);

        DB::table('penilaian')
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
        return redirect('/penilaian');
    }

    public function destroy($id)
    {
        DB::table('penilaian')->where('id', $id)->delete();

        return redirect('/penilaian');
    }
    
}

