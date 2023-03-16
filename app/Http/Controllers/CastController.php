<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CastController extends Controller
{
    public function create()
    {
        return view('cast.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'umur' => 'required',
            'bio' => 'required'
        ]);

        DB::table('cast')->insert([
            'nama' => $request['nama'],
            'umur' => $request['umur'],
            'bio' => $request['bio']
        ]);

        return redirect('/cast');
    }

    public function index()
    {
        $cast = DB::table('cast')->get();
        // dd($cast);
        return view('cast.tampil', ['cast' => $cast]);
    }

    public function show($id)
    {
        $cast = DB::table('cast')->where('id', $id)->first();

        return view('cast.detail', ['cast' => $cast]);
    }

    public function edit($id)
    {
        $cast = DB::table('cast')->where('id', $id)->first();
        return view('cast.edit', ['cast' => $cast]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'umur' => 'required',
            'bio' => 'required'
        ]);
        $data = [
            'nama' => $request['nama'],
            'umur' => $request['umur'],
            'bio' => $request['bio'],
        ];
        $result  = DB::table('cast')->where('id', $id)->update($data);

        return  redirect('/cast');
    }

    public function destroy($id)
    {
        DB::table('cast')->where('id', $id)->delete();

        return redirect('/cast');
    }
}
