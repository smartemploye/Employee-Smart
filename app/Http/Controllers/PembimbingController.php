<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PembimbingController extends Controller
{
    public function index()
    {
        $pembimbing = DB::table('pembimbing')
        ->join('sekolah','sekolah.id','=','pembimbing.sekolah_id')
        ->get(['pembimbing.id','nip_pembimbing', 'nama_pembimbing', 'no_wa_pembimbing', 'nama_sekolah']);

        return view('pembimbing.index', compact('pembimbing'));
    }

    public function create()
    {
        return view('pembimbing.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        Absen::create([
            'nip_pembimbing' => $request->nip_pembimbing,
            'nama_pembimbing' => $request->nama_pembimbing,
            'no_wa_pembimbing' => $request->no_wa_pembimbing,
            'sekolah_id' => $request->sekolah_id,
        ]);
        return redirect('/pembimbing');
    }

    public function edit($id)
    {
        $pembimbing = DB::table('pembimbing')
        ->where('id','=',$id)
        ->get();

        $sekolah = DB::table('sekolah')
        ->get();

        return view('pembimbing.edit', compact('pembimbing','sekolah'));
    }

    public function update(Request $request, $id)
    {
        $pembimbing = DB::table('pembimbing')
        ->where('id','=',$id)
        ->update([
            'nip_pembimbing' => $request['nip_pembimbing'],
            'nama_pembimbing' => $request['nama_pembimbing'],
            'no_wa_pembimbing' => $request['no_wa_pembimbing'],
            'sekolah_id' => $request['sekolah_id'],
        ]);
        return redirect('/pembimbing');
    }

    public function destroy($id)
    {
        $pembimbing = DB::table('pembimbing')
        ->where('id','=',$id)
        ->delete();

        return back();
    }

}
