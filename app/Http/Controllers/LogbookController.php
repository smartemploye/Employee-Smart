<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Logbook;
use File;

class LogbookController extends Controller
{

    //Berhasil
    public function create()
    {
        return view('logbook.tambah');
    }

    public function store(Request $request)
{
    $message = [
        'logbook.required' => 'Logbook harus diisi.',
        'tanggal_logbook.before_or_equal' => 'Tanggal logbook tidak boleh diisi dengan tanggal besoknya.',
        'dokumentasi.required' => 'Dokumentasi harus diisi.',
        'dokumentasi.mimes' => 'Dokumentasi harus berupa file dengan format JPG, PNG, atau JPEG.',
    ];

    $request->validate([
        'logbook' => 'required',
        'tanggal_logbook' => 'required|date|before_or_equal:today',
        'dokumentasi' => 'required|image|mimes:jpg,png,jpeg',
    ], $message);

    $fileName = time().'.'.$request->dokumentasi->extension();
    $request->dokumentasi->move(public_path('image'), $fileName);

    // Mengubah pengguna terautentikasi untuk mendapatkan nisn
    $nisn = Auth::user()->siswa->nisn;

    DB::table('kegiatan_harian')->insert([
        'nisn' => $nisn,
        'logbook' => $request['logbook'],
        'tanggal_logbook' => $request['tanggal_logbook'],
        'dokumentasi' => $fileName,
        'admin_id' => 1,
        'siswa_id' => 1,
    ]);

    return redirect('/logbook');
}

    

public function index()
{
    // Mendapatkan logbook berdasarkan nisn pengguna yang terautentikasi
    if (Auth::user()->role == 'siswa') {
        $nisn = Auth::user()->siswa->nisn;
    } else {
        // dd($nisn);
    }

    // Auth::user()->role = 'siswa';
    // $nisn = Auth::user()->siswa->nisn;
    $logbook = DB::table('kegiatan_harian')->where('nisn', $nisn)->get();

    return view('logbook.tampil', compact('logbook'));
}

public function detail($nisn)
{
    // Mendapatkan logbook berdasarkan nisn pengguna yang terautentikasi


    // Auth::user()->role = 'siswa';
    // $nisn = Auth::user()->siswa->nisn;
    $logbook = DB::table('kegiatan_harian')->where('nisn', $nisn)->get();

    return view('logbook.tampil', compact('logbook'));
}
    // public function index()
    // {
    //     //berdasarkan nisn

    //     $logbook = DB::table('kegiatan_harian')->get();
    //     // dd($logbook);

    //     return view('logbook.tampil', ['logbook' => $logbook]);
    // }

    public function show($id)
    {
        $logbook = Logbook::find($id);
        // dd($logbook);

        return view('logbook.detail', ['logbook' => $logbook]);
    }

    public function edit($id)
    {
        $logbook = DB::table('kegiatan_harian')->where('id', $id)->first();

        return view('logbook.edit', ['logbook' => $logbook]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'logbook' => 'required',
            'tanggal_logbook' => 'required',
            'dokumentasi' => 'nullable|image|mimes:jpg,png,jpeg',
        ]);
    
        $logbook = Logbook::findOrFail($id);
        $logbook->logbook = $request->logbook;
        $logbook->tanggal_logbook = $request->tanggal_logbook;
    
        if ($request->hasFile('dokumentasi')) {
            $request->validate([
                'dokumentasi' => 'image|mimes:jpg,png,jpeg',
            ]);
    
            $fileName = time().'.'.$request->file('dokumentasi')->getClientOriginalExtension();
            $request->file('dokumentasi')->move(public_path('image'), $fileName);
            $logbook->dokumentasi = $fileName;
        }
    
        $logbook->save();
    
        return redirect('/logbook');
    }
    

    public function destroy($id)
    {
        DB::table('kegiatan_harian')->where('id', $id)->delete();

        return redirect('/logbook');
    }

}
