<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function utama()
    {
        return view ('welcome');
    }

    public function table()
    {
        return view('halaman.table');
    }

    // public function welcome(Request $request)
    // {
    //     $firstname = $request['fname'];
    //     $lastname = $request['lname'];

    //     return view('halaman.home',['firstname'=>$firstname, 'lastname'=>$lastname ]);
    // }
}
