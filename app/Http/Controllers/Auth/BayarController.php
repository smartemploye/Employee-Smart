<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class BayarController extends Controller
{
    public function bayar()
    {
        $settingmagang = DB::table('setting_magang')->get()->first();
        // echo $settingmagang->no_va;
        return view('auth.bayar', ["data"=>$settingmagang->no_va]);



        // $logbook = DB::table('kegiatan_harian')->get()->first();
        // echo $logbook->admin_id;
        // return view('auth.bayar', ["data"=>$logbook, "contoh"=>'Jangkrik']);
    }
}
