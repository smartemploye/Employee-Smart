<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SettingMagang;
use App\Models\DataMagang;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Siswa;



class ReportdanSertifikatController extends Controller
{
    public function tampilan()
    {
    $siswa = Auth::user()->siswa;
    $pembimbing = Auth::user()->siswa->pembimbing;
// dd($pembimbing->format_laporan_akhir);
    return view('ReportdanSertifikat.reports', compact('siswa', 'pembimbing'));
    }

    public function lihat($nisn)
{
    $siswa = Siswa::with('pembimbing')->where('nisn', $nisn)->first();
    $pembimbing = $siswa->pembimbing;

    return view('ReportdanSertifikat.reports', compact('siswa', 'pembimbing'));
}

    

    public function showImage($nisn)
    {

        $siswa = DB::table('siswa')->where('nisn', $nisn)->first();
        // dd($siswa);
        $settingMagang = SettingMagang::select('Sertifikat')->first();
        // dd($settingMagang->Sertifikat);
    
        // // Mengambil URL gambar sertifikat
        // $sertifikatUrl = $settingMagang[0]->Sertifikat;
    
        // // Mengatur header untuk respon unduhan
        // $headers = [
        //     'Content-Type' => 'application/pdf',
        // ];
        // // Mendownload sertifikat
        // return response()->download($sertifikatUrl, 'sertifikat.pdf', $headers);
        $pdf = PDF::loadview('ReportdanSertifikat.sertifikat',['settingMagang'=>$settingMagang, 'siswa'=>$siswa]);
        // $pdf->set_paper(PDF::DEFAULT_PDF_PAPER_SIZE, 'portrait');
        $pdf->setPaper('A4', 'landscape');
    	return $pdf->download('laporan-pegawai.pdf');
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



}
