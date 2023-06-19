<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SettingMagang;
use App\Models\DataMagang;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Siswa;
use Dompdf\Dompdf;
use Dompdf\Options;


class ReportdanSertifikatController extends Controller
{

    public function tampilan()
    {
        $siswa = Auth::user()->siswa;
        $pembimbing = Auth::user()->siswa->pembimbing;
        $settingMagang = SettingMagang::select('Sertifikat')->first();
        // dd($pembimbing->format_laporan_akhir);
        return view('ReportdanSertifikat.reports', compact('siswa', 'pembimbing', 'settingMagang'));
    }

    public function lihat($nisn)
    {
        $siswa = Siswa::with('pembimbing')->where('nisn', $nisn)->first();
        $pembimbing = $siswa->pembimbing;
        $settingMagang = SettingMagang::select('Sertifikat')->first();
        return view('ReportdanSertifikat.reports', compact('siswa', 'pembimbing', 'settingMagang'));
    }

    public function showImage($nisn)
    {

        $siswa = DB::table('siswa')->where('nisn', $nisn)->first();
        $settingMagang = SettingMagang::select('Sertifikat')->first();
        $pdf = PDF::loadview('ReportdanSertifikat.sertifikat', ['settingMagang' => $settingMagang, 'siswa' => $siswa]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('sertifikat.pdf');
        // return view('ReportdanSertifikat.sertifikat', ['settingMagang' => $settingMagang, 'siswa' => $siswa]);
    }

    public function store(Request $request, $nisn)
    {
        // Validasi file yang diunggah adalah PDF
        $request->validate([
            'laporan_akhir' => 'required|mimes:pdf'
        ]);

        // Simpan file PDF
        $file = $request->file('laporan_akhir');
        $filename = $file->getClientOriginalName();
        $file->move(public_path('laporan_akhir'), $filename);

        // Update kolom laporan_akhir di tabel data_magang
        $data_magang = DataMagang::where('nisn', $nisn)->firstOrFail();
        $data_magang->laporan_akhir = $filename;
        $data_magang->save();

        return redirect('/tampilan')->with('success', 'File laporan akhir berhasil diunggah.');
    }
<<<<<<< HEAD

    public function store(Request $request, $nisn)
{
    // Validasi file yang diunggah adalah PDF
    $message = [ 'laporan_akhir.required' => 'Form harus diisi!',
    'laporan_akhir.mimes' => 'File dalam bentuk pdf!'];

    $request->validate([
        'laporan_akhir' => 'required|mimes:pdf'
    ], $message);


    // Simpan file PDF
    $file = $request->file('laporan_akhir');
    $filename = $file->getClientOriginalName();
    $file->move(public_path('laporan_akhir'), $filename);

    // Update kolom laporan_akhir di tabel data_magang
    $data_magang = DataMagang::where('nisn', $nisn)->firstOrFail();
    $data_magang->laporan_akhir = $filename;
    $data_magang->save();

    return redirect('/tampilan')->with('success', 'File laporan akhir berhasil diunggah.');
}



=======

>>>>>>> 8c4c72b094c42ee4bab38b6c00aa4d9cc6746667
}
