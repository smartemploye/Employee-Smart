<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SettingMagang;
// use File;

class SettingmagangController extends Controller
{

    //Berhasil
    public function create()
    {
        return view('settingmagang.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jam_Masuk_kerja' => 'required',
            'jam_Pulang_kerja' => 'required',
            'no_va' => 'required',
            'Kuota_Magang' => 'required',
            'Format_WA_Diterima' => 'required',
            'Format_WA_Ditolak' => 'required',
            'Format_Email' => 'required',
            'WA_Kantor' => 'required',
            //'dokumentasi' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        // $fileName = time().'.'.$request->dokumentasi->extension();  
        // $request->dokumentasi->move(public_path('image'), $fileName);
        // $logbook = new Logbook;

        DB::table('setting_magang')->insert([
            'jam_Masuk_kerja' => $request['jam_Masuk_kerja'],
            'jam_Pulang_kerja' => $request['jam_Pulang_kerja'],
            'no_va' => $request['no_va'],
            'Kuota_Magang' => $request['Kuota_Magang'],
            'Format_WA_Diterima' => $request['Format_WA_Diterima'],
            'Format_WA_Ditolak' => $request['Format_WA_Ditolak'],
            'Format_Email' => $request['Format_Email'],
            'WA_Kantor' => $request['WA_Kantor'],
            //'dokumentasi' => $fileName,
            // 'admin_id' => 1,
            // 'siswa_id' => 1,
        ]);

        return redirect('/settingmagang');

    }

    public function index()
    {
        $settingmagang = DB::table('setting_magang')->get();
        // dd($logbook);
 
        return view('settingmagang.tampil', ['settingmagang' => $settingmagang]);
    }

    public function show($id)
    {
        $settingmagang = SettingMagang::find($id);
        // dd($logbook);

        return view('settingmagang.detail', ['settingmagang' => $settingmagang]);
    }

    public function edit($id)
    {
        $settingmagang = DB::table('setting_magang')->where('id', $id)->first();

        return view('settingmagang.edit', ['settingmagang' => $settingmagang]); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jam_Masuk_kerja' => 'required',
            'jam_Pulang_kerja' => 'required',
            'no_va' => 'required',
            'Kuota_Magang' => 'required',
            'Format_WA_Diterima' => 'required',
            'Format_WA_Ditolak' => 'required',
            'Format_Email' => 'required',
            'WA_Kantor' => 'required',

        ]);

        DB::table('setting_magang')
              ->where('id', $id)
              ->update(
                [
                    'jam_Masuk_kerja' => $request['jam_Masuk_kerja'],
                    'jam_Pulang_kerja' => $request['jam_Pulang_kerja'],
                    'no_va' => $request['no_va'],
                    'Kuota_Magang' => $request['Kuota_Magang'],
                    'Format_WA_Diterima' => $request['Format_WA_Diterima'],
                    'Format_WA_Ditolak' => $request['Format_WA_Ditolak'],
                    'Format_Email' => $request['Format_Email'],
                    'WA_Kantor' => $request['WA_Kantor'],
                ],
            );
        return redirect('/settingmagang');
    }

    public function destroy($id)
    {
        DB::table('setting_magang')->where('id', $id)->delete();

        return redirect('/settingmagang');
    }
    
}

