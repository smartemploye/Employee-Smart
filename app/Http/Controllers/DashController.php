<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $absen = DB::table('absen')->where('nisn', '=', Session::get('nisn'))->whereDate('created_at', date('Y-m-d'))->first();
        if (is_null($absen) || $absen->absen_masuk == '' || $absen->absen_pulang == '') {
            $data = [
                'masuk' => '',
                'keluar' => ''
            ];
        } else if ($absen->absen_masuk != '') {
            $data = [
                'masuk' => 'disabled',
                'keluar' => ''
            ];
        } else if ($absen->absen_keluar != '') {
            $data = [
                'masuk' => 'disabled',
                'keluar' => 'disabled'
            ];
        }
        return view('apsen.scan', $data);
    
        // return view ('apsen.scan');
        
    }
}


