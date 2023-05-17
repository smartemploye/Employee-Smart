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
        $this->middleware('guest')->except('logout');
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
            return redirect('/dashboard');
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
