<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\KomponenPenilaian;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
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
            // 'penilaian_kepribadian' => 'required',
            // 'penilaian_keahlian' => 'required',
            // 'operating_system' => 'required',

            'nama_komponen' => 'required',
            'presentase' => 'required',


        ]);



        DB::table('komponen_penilaian')->insert([
            // 'penilaian_kepribadian' => $request['penilaian_kepribadian'],
            // 'disiplin_waktu' => 100,
            // 'inisatif_dan_kreatifitas' => 100,
            // 'sikap_dan_disiplin' => 100,

            // 'penilaian_keahlian' => $request['penilaian_keahlian'],
            // 'operating_system' => $request['operating_system'],
            // 'ms_office' => 100,
            // 'instalasi_sistem' => 100,

            'nama_komponen' => $request['nama_komponen'],
            'presentase' => $request['presentase'],



        ]);
        Artisan::call('migrate:refresh', array('--path' => '/database/migrations/2023_05_11_013827_add_column_to_penilaian.php', '--force' => true));

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
        // dd($komponenpenilaian);h', array('--path' => '/database/migrations/2023_05_11_013827_add_column_to_penilaian.php', '--force' => true));

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
            // 'penilaian_kepribadian' => 'required',
            // 'penilaian_keahlian' => 'required',
            // 'operating_system' => 'required',

            'nama_komponen' => 'required',
            'presentase' => 'required',

        ]);
        $data = KomponenPenilaian::where('id', $id)->first();
        Session::put(['oldColumn' => $data->nama_komponen, 'newColumn' => $request['nama_komponen']]);
        Artisan::call('migrate:refresh', array('--path' => '/database/migrations/2023_05_11_020200_edit_column_to_penilaian.php', '--force' => true));
        DB::table('komponen_penilaian')
            ->where('id', $id)
            ->update(
                [
                    // 'penilaian_kepribadian' => $request['penilaian_kepribadian'],
                    // 'disiplin_waktu' => 100,
                    // 'inisatif_dan_kreatifitas' => 100,
                    // 'sikap_dan_disiplin' => 100,

                    // 'penilaian_keahlian' => $request['penilaian_keahlian'],
                    // 'operating_system' => $request['operating_system'],
                    // 'ms_office' => 100,
                    // 'instalasi_sistem' => 100,

                    'nama_komponen' => $request['nama_komponen'],
                    'presentase' => $request['presentase'],

                ],
            );
        return redirect('/komponenpenilaian');
    }

    public function destroy($id)
    {
        $db = DB::table('komponen_penilaian')->where('id', $id);

        $komponen = $db->first()->nama_komponen;
        Session::put('columnName', $komponen);

       
        Artisan::call('migrate:refresh', array('--path' => '/database/migrations/2023_05_11_024319_delete_column_to_penilaian.php', '--force' => true));

        $db->delete();

        return redirect('/komponenpenilaian');
    }
}
