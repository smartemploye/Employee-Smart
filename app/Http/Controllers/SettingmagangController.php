<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SettingMagang;
// use File;

class SettingmagangController extends Controller
{


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
            'Format_Pembimbing' => 'required',
            'Format_Email' => 'required',
            'WA_Kantor' => 'required',
            'Sertifikat' => 'image|mimes:jpeg,png,jpg|max:2048', // Menambahkan validasi file gambar dengan format yang diizinkan dan ukuran maksimum 2MB
        ]);
    
        if ($request->hasFile('Sertifikat')) {
            $file = $request->file('Sertifikat');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('image'), $fileName);
            // Lanjutkan pemrosesan jika file Sertifikat telah diunggah
        } else {
            $fileName = null; // Atau nilai default yang sesuai jika file tidak diunggah
        }
        
        $SettingMagang = new SettingMagang;
        
        DB::table('setting_magang')
            ->where('id', $id)
            ->update([
                'jam_Masuk_kerja' => $request['jam_Masuk_kerja'],
                'jam_Pulang_kerja' => $request['jam_Pulang_kerja'],
                'no_va' => $request['no_va'],
                'Kuota_Magang' => $request['Kuota_Magang'],
                'Format_WA_Diterima' => $request['Format_WA_Diterima'],
                'Format_WA_Ditolak' => $request['Format_WA_Ditolak'],
                'Format_Pembimbing' => $request['Format_Pembimbing'],
                'Format_Email' => $request['Format_Email'],
                'WA_Kantor' => $request['WA_Kantor'],
                'Sertifikat' => $fileName, // Gunakan nilai file yang sudah diunggah atau null jika tidak ada
            ]);
        return redirect('/settingmagang');
    }
    

    // Kamis 25 Mei 2023
    public function getFormatWA()
    {
        $settingmagang = SettingMagang::first();
        return $settingmagang->Format_WA_Diterima;
    }
    // public function getFormatWA()
    // {
    // $settingmagang = SettingMagang::first();
    // return [
    //     'Format_WA_Diterima' => $settingmagang->Format_WA_Diterima,
    //     'Format_Pembimbing' => $settingmagang->Format_Pembimbing
    // ];
    // }

}

