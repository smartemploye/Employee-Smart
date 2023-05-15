<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Bayar;
class BayarController extends Controller
{
    //Berhasil
    public function create()
    {
        return view('auth.bayar');
    }

    public function store(Request $request)
    {
    
        //Perbaiki validasinya
        
        // $request->validate([
        //     'bukti_pembayaran' => 'required|image|mimes:jpg,png,jpeg',
        // ]);

        $fileName = time().'.'.$request->bukti->extension();  
        $request->bukti->move(public_path('image'), $fileName);
        $bayar = new Bayar;
        // dd(Auth::user()->nisn);
        $nisn = Auth::user()->nisn;
        DB::table('data_magang')
        ->where('nisn', $nisn)
        ->update([
            'bukti_pembayaran' => $fileName,
        ]);
// var_dump($bayar);

        return redirect('/');
        // dd($bayar);
    }

    public function bayar()
    {
        $settingmagang = DB::table('setting_magang')->get()->first();
        // echo $settingmagang->no_va;
        return view('auth.bayar', ["data"=>$settingmagang->no_va]);  
    }
}
