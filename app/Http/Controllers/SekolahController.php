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
    }

    public function store(Request $request)
    {
        // dd($request->all());
        Sekolah::create([
            'nis' => $request->nis,
            'nam_sekolah' => $request->nama_sekolah,
            'alamat_sekolah' => $request->alamat_sekolah,
        ]);
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
