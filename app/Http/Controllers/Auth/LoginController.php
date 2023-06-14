<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
// use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use App\Models\SettingMagang;
use App\Models\DataMagang;
use Illuminate\Support\Facades\DB;



class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout','changePassword']);
    }

    public function index()
    {
        return view('login.index', [
            'title' => 'login',
            'active' => 'login'
        ]);
        // return redirect('/login');
    }

    public function postlogin(Request $request)
    {
        // var_dump($request->all());

        // if (Auth::attempt(['email'=>$request->email, 'password'=>$request->password])) {
        //     return redirect('/bayar');
        // }

        // var_dump(Auth::guard('akun')->attempt(['username' => $request->email, 'password' => $request->password]));

        // if (Auth::guard('akun')->attempt(['username' => $request->email, 'password' => $request->password])) {
        //     return redirect('/dashboard');
        // } else if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
        //     return redirect('/dashboard');
        // } else if (Auth::guard('pembimbing')->attempt(['nip_pembimbing' => $request->email, 'password' => $request->password])) {
        //     return redirect('/dashboard');
        // }

        if (Auth::guard('akun')->attempt(['username' => $request->email, 'password' => $request->password])) {
            // dd(Auth::user()->role);
            if (Auth::user()->role=='siswa'){
                // dd(Auth::user()->siswa->data_magang->status_magang);
                $status_magang = Auth::user()->siswa->data_magang->status_magang;
                if ($status_magang == "Belum Bayar" || $status_magang == NULL) {
                    return redirect('/bayar');
                } elseif ($status_magang == "tidak aktif" || $status_magang == "Drop Out" || $status_magang == "Seleksi" ){
                    return redirect('/logout');
                } elseif ($status_magang == 'Aktif' || $status_magang == "Lulus") {
                    return redirect('/scan');
                // } elseif ($status_magang == 'Lulus') {
                    // return redirect('/lihat');
                }
            } elseif (Auth::user()->role == 'pembimbing') {
                return redirect('/profile_pembimbing');
            }
            
            //cek dulu yg login sebagai siswa atau bukan, kalo dia siswa cek dulu statusnya.

            //status seleksi, belu bayar, kosong hasib register/ null dia redirect ke halaman bayar
            // $settingmagang = SettingMagang::first();

            // $status_magang = $request->status_magang;
            // // dd($status_magang);
            // if ($status_magang == "Belum Bayar" || $status_magang == "Seleksi") {

            // } elseif ($status_magang == "tidak aktif" || $status_magang == "Drop Out"){

            // } elseif ($status_magang == 'Aktif'){

            // }
            //status drop out atau tidak aktif langsung redirect ke route('logout') tampilkan pesan (statusnya drop out atau tdk aktif)

            return redirect('/jumlah-peserta');
        }
        // die();

        // var_dump(Auth::guard('akun')->attempt(['username' => $request->email, 'password' => $request->password]));
        // var_dump(Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password]));

        // die();

        // if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])) {
        //     return redirect()->route('bayar');
        // } else if (Auth::guard('akun')->attempt(['username' => $request->email, 'password' => $request->password])) {
        //     return redirect()->route('bayar');
        // }
        //pengecekan
        return redirect()->route('login')->with('error', 'Invalid email or password.');
        // }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }

    public function showChangePasswordForm()
    {
        return view('peserta.show');
    }

    public function changePassword(Request $request)
    {

        if ($request->password != $request->confpassword) {
            // The passwords matches
            return redirect()->back()->with("error", "Password should be same as your confirmed password. Please retype new password");
        }


        // //Change Password
        // $user = Auth::user();
        // $user->password = encrypt($request->get('new-password'));
        // $user->save();
        $result = DB::table('akuns')->where('username', $request->username)->update(['password' => Hash::make($request->password)]);

        return redirect()->back()->with("success", "Password changed successfully !");
    }
}
