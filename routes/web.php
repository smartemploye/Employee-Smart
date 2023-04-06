<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
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
use App\Http\Controllers\PerizinanController;
use App\Http\Controllers\Auth\BayarController;
use App\Http\Controllers\Auth\LoginController;
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

Auth::routes(['verify' => true]);
Auth::routes();

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

Route::get('/pembimbing', function(){
    return view('admin.pembimbing');
});

Route::get('/data_sekolah', function(){
    return view('admin.data_sekolah');
});

Route::get('/data_bidang', function(){
    return view('admin.data_bidang');
});

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

Route::get('/detail', function(){
    return view('admin.peserta.detail');
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
Route::PUT('/peserta/update/{id}', [PesertaController::class, 'update'])->name('peserta.update');
Route::get('/peserta/hapus/{id}', [PesertaController::class, 'destroy'])->name('peserta.hapus');
