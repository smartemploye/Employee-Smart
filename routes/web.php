<?php

use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashController;
// use App\Http\Controllers\CastController;
// use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\PerizinanController;
use App\Http\Controllers\Auth\BayarController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DataBidangController;
use App\Http\Controllers\PembimbingController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/send-email',function(){
    $data = [
        'name' => 'Syahrizal As',
        'body' => 'Testing Kirim Email di Santri Koding'
    ];

    Mail::to('oriza.200170194@mhs.unimal.ac.id')->send(new SendEmail($data));

    dd("Email Berhasil dikirim.");
});



// Auth::routes([
//     'verify' => true
// ]);
//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/',[DashController::class, 'utama']);
// Route::get('/table',[AuthController::class, 'table']);
// Route::post('/welcome', [AuthController::class, 'welcome']);
Route::get('/data-table', function(){
    return view('halaman.datatable');
});
;

Route::get('/login',[LoginController::class, 'index'])->name('login');

Route::get('/register',[RegisterController::class, 'index'])->name('register');
Route::post('/postregister',[RegisterController::class, 'store'])->name('postregister');
Route::post('/postlogin',[LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');

// Route::group(['middleware'=>['auth:user,akun']], function(){

// });
Route::get('/bayar', [BayarController::class, 'bayar'])->name('bayar');
//pembayaran

//admin
// Route::get('/admin/dashboard', function () {
//     // Only users with the "admin" role can access this route
// })->middleware('auth', 'role:admin');
// Route::get('/register', [RegisterController::class, 'index']);
// Route::post('/register', [RegisterController::class, 'store']);
Route::get('/logbook',[LogbookController::class, 'index'])->name('logbook');
Route::get('/report',[ReportController::class, 'index'])->name('report');
Route::get('/profile',[ProfileController::class, 'index'])->name('profile');
Route::get('/admin/profile',[ProfileController::class, 'index'])->name('profile');
Route::post('/postlogin',[LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/dashboard', function(){
    return view('admin.dashboard');
});

// Route::get('/pembimbing', function(){
//     return view('admin.pembimbing');
// });

Route::get('/komponen_penilaian', function(){
    return view('admin.komponen_penilaian');
});

Route::get('/penilaian', function(){
    return view('admin.penilaian');
});

Route::get('/absensi', function(){
    return view('template.absensi');
});

Route::get('/setting_magang', function(){
    return view('admin.setting_magang');
});

Route::get('send',[MailController::class, 'index']);

//perizinan
Route::get('/perizinan',[PerizinanController::class, 'index'])->name('perizinan.index');
Route::get('/perizinan/create', [PerizinanController::class, 'create'])->name('perizinan.create');
Route::PUT('/perizinan/store', [PerizinanController::class, 'store'])->name('perizinan.store');
Route::get('/perizinan/edit/{id}', [PerizinanController::class, 'edit'])->name('perizinan.edit');
Route::PUT('/perizinan/update/{id}', [PerizinanController::class, 'update'])->name('perizinan.update');
Route::get('/perizinan/hapus/{id}', [PerizinanController::class, 'destroy'])->name('perizinan.hapus');

//peserta
Route::get('/peserta',[PesertaController::class, 'index'])->name('peserta.index');
Route::get('/peserta/create', [PesertaController::class, 'create'])->name('peserta.create');
Route::PUT('/peserta/store', [PesertaController::class, 'store'])->name('peserta.store');
Route::get('/peserta/edit/{id}', [PesertaController::class, 'edit'])->name('peserta.edit');
Route::put('/peserta/update/{id}', [PesertaController::class, 'update'])->name('peserta.update');
Route::get('/peserta/hapus/{id}', [PesertaController::class, 'destroy'])->name('peserta.hapus');
Route::get('/peserta/show/{id}', [PesertaController::class, 'show'])->name('peserta.show');

//pembimbing
Route::get('/pembimbing',[PembimbingController::class, 'index'])->name('pembimbing.index');
Route::get('/pembimbing/create', [PembimbingController::class, 'create'])->name('pembimbing.create');
Route::PUT('/pembimbing/store', [PembimbingController::class, 'store'])->name('pembimbing.store');
Route::get('/pembimbing/edit/{id}', [PembimbingController::class, 'edit'])->name('pembimbing.edit');
Route::PUT('/pembimbing/update/{id}', [PembimbingController::class, 'update'])->name('pembimbing.update');
Route::get('/pembimbing/hapus/{id}', [PembimbingController::class, 'destroy'])->name('pembimbing.hapus');

//sekolah
Route::get('/sekolah',[SekolahController::class, 'index'])->name('sekolah.index');
Route::get('/sekolah/create', [SekolahController::class, 'create'])->name('sekolah.create');
Route::PUT('/sekolah/store', [SekolahController::class, 'store'])->name('sekolah.store');
Route::get('/sekolah/edit/{id}', [SekolahController::class, 'edit'])->name('sekolah.edit');
Route::PUT('/sekolah/update/{id}', [SekolahController::class, 'update'])->name('sekolah.update');
Route::get('/sekolah/hapus/{id}', [SekolahController::class, 'destroy'])->name('sekolah.hapus');

//bidang
Route::get('/bidang',[DataBidangController::class, 'index'])->name('bidang.index');
Route::get('/bidang/create', [DataBidangController::class, 'create'])->name('bidang.create');
Route::PUT('/bidang/store', [DataBidangController::class, 'store'])->name('bidang.store');
Route::get('/bidang/edit/{id}', [DataBidangController::class, 'edit'])->name('bidang.edit');
Route::PUT('/bidang/update/{id}', [DataBidangController::class, 'update'])->name('bidang.update');
Route::get('/bidang/hapus/{id}', [DataBidangController::class, 'destroy'])->name('bidang.hapus');
