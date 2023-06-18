<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Bayar;
class BayarController extends Controller
{
    //Berhasil
    public function create()
    {
        return view('auth.bayar');
    }

    public function store(Request $request)
{
    $message = [
        'bukti_pembayaran.required' => 'Form harus diisi!',
        'bukti_pembayaran.image' => 'Format harus dalam bentuk gambar!',
        'bukti_pembayaran.mimes' => 'Foto dalam bentuk jpg, png, jpeg, atau pdf!',
    ];

    $request->validate([
        'bukti_pembayaran' => 'required|image|mimes:jpg,png,jpeg,pdf',
    ], $message);

    $fileName = time().'.'.$request->bukti_pembayaran->extension();
    $request->bukti_pembayaran->move(public_path('image'), $fileName);

    $nisn = Auth::user()->nisn;
    DB::table('data_magang')
        ->where('nisn', $nisn)
        ->update([
            'bukti_pembayaran' => $fileName,
        ]);

    return redirect('/logout');
}

public function bayar()
{
    $settingmagang = DB::table('setting_magang')->get()->first();
    return view('auth.bayar', ["data" => $settingmagang->no_va]);
}

}
