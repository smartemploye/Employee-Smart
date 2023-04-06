<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Mail;
use App\Mail\MailNotify;
use Illuminate\Support\Facades\Mail as FacadesMail;

class MailController extends Controller
{
    public function index()
    {
        $data = [
            'subject'=>'Cambo Tutorial Mail',
            'body'=> 'Hello This is my email delivery!'
        ];
        try
        {
            FacadesMail::to('ruinshireka@gmail.com')->send(new MailNotify($data));
            return response()->json(['Great check your mail box']);
        }catch (Exception $th)
        {
            return response()->json(['Sorry something went wrong!']);
        }
    }
}
