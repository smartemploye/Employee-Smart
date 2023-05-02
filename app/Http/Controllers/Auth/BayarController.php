<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Bayar;
class BayarController extends Controller
{

    
    // public function bayar()
    // {
    //     $settingmagang = DB::table('setting_magang')->get()->first();
    //     // echo $settingmagang->no_va;
    //     return view('auth.bayar', ["data"=>$settingmagang->no_va]);  
    // }

    //Berhasil
    public function create()
    {
        return view('auth.bayar');
    }

    public function store(Request $request)
    {
    
        
        $request->validate([
            'bukti' => 'required|image|mimes:jpg,png,jpeg',
        ]);

        $fileName = time().'.'.$request->bukti->extension();  
        $request->bukti->move(public_path('image'), $fileName);
        $bayar = new Bayar;

        DB::table('bayar')->insert([
            'bukti' => $fileName,
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
