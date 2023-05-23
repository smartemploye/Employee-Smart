<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrController extends Controller
{
    public function generateQrCode()
    {
        return view ('Qr.qr-code');
        
    }
}
