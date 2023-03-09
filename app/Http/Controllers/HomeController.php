<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function utama()
    {
        return view('welcome');
    }

    public function bio()
    {
        return view('halaman.biodata');
    }

    public function kirim(Request $request)
    {
        $nama = $request['name'];
        $alamat = $request['alamat'];
        $jeniskelamin = $request['jk'];

        return view('halaman.home',['nama'=>$nama, 'alamat'=>$alamat, 'jeniskelamin'=>$jeniskelamin]);
    }
}
