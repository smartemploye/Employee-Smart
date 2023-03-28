<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BayarController extends Controller
{
    public function bayar()
    {
        return view('auth.bayar');
    }
}
