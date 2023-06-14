<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SekolahController extends Controller
{
    public function index()
    {
        $sekolah = DB::table('sekolah')
        ->get(['id','nis','nama_sekolah', 'alamat_sekolah']);

        return view('sekolah.index', compact('sekolah'));
    }

    public function create()
    {
        return view('sekolah.create');

        return back()->with('success','Item created successfully!');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        {
            $validatedData = $request->validate(Sekolah::rules());
            // proses penyimpanan data
        }
        if (Sekolah::where('nis', $request->nis)->exists()) {
            // Set pesan alert jika data sudah ada
            $request->session()->flash('error', 'Data sudah ada dalam database.');
            return redirect()->back();
        }

        // Proses penyimpanan data
        Sekolah::create([
            'nis' => $request->nis,
            'nama_sekolah' => $request->nama_sekolah,
            'alamat_sekolah' => $request->alamat_sekolah,
        ]);
        // Set pesan alert jika data berhasil disimpan
        $request->session()->flash('success', 'Data berhasil disimpan.');

        return redirect('/sekolah');
    }

    public function edit($id)
    {
        $sekolah = DB::table('sekolah')
        ->where('id','=',$id)
        ->get();

        return view('sekolah.edit', compact('sekolah'));
    }

    public function update(Request $request, $id)
    {
        $sekolah = DB::table('sekolah')
        ->where('id','=',$id)
        ->update([
            'nis' => $request['nis'],
            'nama_sekolah' => $request['nama_sekolah'],
            'alamat_sekolah' => $request['alamat_sekolah'],
        ]);
        return redirect('/sekolah');
    }

    public function destroy($id)
    {
        $sekolah = DB::table('sekolah')
        ->where('id','=',$id)
        ->delete();

        return back();
    }

}
