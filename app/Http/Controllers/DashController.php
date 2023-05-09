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
        // function scan() {
        //     let date = new Date();
        //     const tag = document.getElementById('reader');
        //     if (tag !== null) {
        //         const HTML5Qrcode = new Html5Qrcode('reader');
        //         const qrCodeSuccessCallback = (decodedText, decodedResult) => {
        //             if (decodedText) {
        //                 $.ajax({
        //                     url: decodedText,
        //                     type: "POST",
        //                     dataType: 'JSON',
        //                     data: {
        //                         uuid: mobileDeviceId(),
        //                         time: date.getFullYear,
        //                     },
        //                     success: function(response) {
        //                         window.location = response.url;
        //                     }
        //                 })
        //                 HTML5Qrcode.stop();
        //             }
        //         }
        //         const config = {
        //             fps: 10,
        //             qrbox: {
        //                 width: 250,
        //                 height: 250
        //             }
        //         }
        //         HTML5Qrcode.start({
        //             facingMode: "environment"
        //         }, config, qrCodeSuccessCallback);
        //     }
        // }
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

