<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class DashController extends Controller
{
    public function utama()
    {
        // Berhasil-fix
        return view ('welcome');
        
    }

    public function scan()
    {
        // Berhasil-fix
        return view ('apsen.scan');
        
    }
}

    // public function welcome(Request $request)
    // {
    //     $firstname = $request['fname'];
    //     $lastname = $request['lname'];

    //     return view('halaman.home',['firstname'=>$firstname, 'lastname'=>$lastname ]);
    // }

