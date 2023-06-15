<?php

namespace App\Http\Controllers;

use App\Models\DataBidang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DataBidangController extends Controller
{
    public function index()
    {
        $bidang = DB::table('data_bidang')
        ->get(['id','nama_bidang','jenis_jurusan']);

        return view('bidang.index', compact('bidang'));
    }

    public function create()
    {
        return view('bidang.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        DataBidang::create([
            'nama_bidang' => $request->nama_bidang,
            'jenis_jurusan' => $request->jenis_jurusan,
        ]);
        return redirect('/bidang');
    }

    public function edit($id)
    {
        $bidang = DB::table('data_bidang')
        ->where('id','=',$id)
        ->get();

        return view('bidang.edit', compact('bidang'));
    }

    public function update(Request $request, $id)
    {
        $bidang = DB::table('data_bidang')
        ->where('id','=',$id)
        ->update([
            'nama_bidang' => $request['nama_bidang'],
            'jenis_jurusan' => $request['jenis_jurusan'],
        ]);
        return redirect('/bidang');
    }

    public function destroy($id)
    {
        $bidang = DB::table('data_bidang')
        ->where('id','=',$id)
        ->delete();

        return back();
    }

}
