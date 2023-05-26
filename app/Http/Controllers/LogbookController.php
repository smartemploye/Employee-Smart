<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        ];

        $request->validate([
            'logbook' => 'required',
            'tanggal_logbook' => 'required|date|before_or_equal:today',
            'dokumentasi' => 'required|image|mimes:jpg,png,jpeg',
        ], $message);

        $fileName = time().'.'.$request->dokumentasi->extension();
        $request->dokumentasi->move(public_path('image'), $fileName);
        $logbook = new Logbook;

        DB::table('kegiatan_harian')->insert([
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
        $logbook = DB::table('kegiatan_harian')->get();
        // dd($logbook);

        return view('logbook.tampil', ['logbook' => $logbook]);
    }

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
            'dokumentasi' => 'required|image|mimes:jpg,png,jpeg',
            // 'dokumentasi' => "bla",
            // 'admin_id' => 1,
            // 'siswa_id' => 1,

        ]);

        $fileName = time().'.'.$request->dokumentasi->extension();
        $request->dokumentasi->move(public_path('image'), $fileName);
        // $logbook = new Logbook;
        // $logbook->dokumentasi = $fileName;
        // $logbook->save();

        DB::table('kegiatan_harian')
              ->where('id', $id)
              ->update(
                [
                    'logbook' => $request['logbook'],
                    'tanggal_logbook' => $request['tanggal_logbook'],
                    'dokumentasi' => $fileName,
                    'admin_id' => 1,
                    'siswa_id' => 1,
                ],
            );
        return redirect('/logbook');
    }

    public function destroy($id)
    {
        DB::table('kegiatan_harian')->where('id', $id)->delete();

        return redirect('/logbook');
    }

}
