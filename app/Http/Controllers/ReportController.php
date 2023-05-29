<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\DataMagang;
use App\Models\Pembimbing;
use App\Models\Siswa;

class ReportController extends Controller
{
    public function index(Request $request) {
    $data = DB::table('pembimbing')
            ->join('siswa', 'siswa.nip_pembimbing', '=', 'pembimbing.nip_pembimbing')
            ->where('siswa.nisn','=', auth()->user()->siswa->nisn )
            ->get([
                'pembimbing.format_laporan_akhir'
            ]);
        //
        // $data = $data->get([
        //     'format_laporan_akhir',
        //     'laporan_akhir',
        //     'no_sertifikat',
        // ]);

        // return $data;
        return view('reportnsertifikat.index', compact('data'));

    }

    public function create()
    {
        $data = DB::table('data_magang')
            ->get();
        return view('reportnsertifikat.create', compact('data'));
    }

    public function store(Request $request)
    {
        $format_laporan_akhir = $request->format_laporan_akhir;
        $file_format_laporan_akhir = $format_laporan_akhir->getClientOriginalName();
        
        $laporan_akhir = $request->laporan_akhir;
        $file_laporan_akhir = $laporan_akhir->getClientOriginalName();

        // dd($request->all());
        Pembimbing::create([
            'format_laporan_akhir' => $file_format_laporan_akhir,
        ]);
        DataMagang::create([
            'laporan_akhir' => $file_laporan_akhir,
        ]);
        return redirect('/reportnsertifikat');
    }

    public function edit($id)
    {
        $pembimbing = DB::table('pembimbing')
            ->join('pembimbing', 'pembimbing.nip_pembimbing', '=', 'pembimbing.format_laporan_akhir')
            ->join('data_magang', 'data_magang.nisn', '=', 'data_magang.no_sertifikat')
            ->where('pembimbing.id', '=', $id)
            ->get([
                'format_laporan_akhir','no_sertifikat',
            ]);

        $pembimbing = DB::table('pembimbing')
            ->get();

        $data_magang = DB::table('data_magang')
            ->get();

        return view('reportnsertifikat.edit', compact( 'pembimbing','data_magang'));
    }
}
