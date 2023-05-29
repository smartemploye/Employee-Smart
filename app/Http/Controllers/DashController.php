<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class DashController extends Controller
{
    public function utama()
    {
        // Berhasil-fix
        Session::put('nisn', '23104120');
        return view ('welcome');
        
    }

    public function scan()
    {
        // Berhasil-fix
        $absen = DB::table('absen')->where('nisn', '=', Auth :: user()->siswa->nisn)->whereDate('created_at', date('Y-m-d'))->first();
    
        // dd($absen);
        $data = [
            'masuk' => '',
            'pulang' => '',
            'absen' => $absen
        ];
        if(!empty ($absen->absen_masuk)) {
            $data [ 'masuk'] = 'disabled';
        } 

        if (!empty ($absen->absen_pulang)) {
            $data [ 'pulang'] = 'disabled';
        }
        // dd($data);
        return view('apsen.scan', $data);
    
        // return view ('apsen.scan');
        
    }
}


