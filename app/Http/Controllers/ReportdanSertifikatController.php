<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SettingMagang;

class ReportdanSertifikatController extends Controller
{
    public function showImage()
    {
        $settingMagang = SettingMagang::select('Sertifikat')->get();
        
        // return view('auth.report', ['settingMagang' => $settingMagang]);
        return view('ReportdanSertifikat.reports', ['settingMagang' => $settingMagang]);
    }
}
