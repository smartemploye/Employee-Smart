<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashController;
// use App\Http\Controllers\CastController;
// use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\LogbookController;
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
Route::post('/postregister',[RegisterController::class, 'store'])->name('register');
Route::post('/postlogin',[LoginController::class, 'postlogin'])->name('postlogin');

//pembayaran
Route::get('/bayar', [BayarController::class, 'bayar'])->name('bayar');

//admin
// Route::get('/admin/dashboard', function () {
//     // Only users with the "admin" role can access this route
// })->middleware('auth', 'role:admin');
// Route::get('/register', [RegisterController::class, 'index']);
// Route::post('/register', [RegisterController::class, 'store']);
Route::get('/logbook',[LogbookController::class, 'index'])->name('logbook');
Route::get('/perizinan',[PerizinanController::class, 'index'])->name('perizinan');
Route::get('/report',[ReportController::class, 'index'])->name('report');
Route::get('/profile',[ProfileController::class, 'index'])->name('profile');
Route::get('/admin/profile',[ProfileController::class, 'index'])->name('profile');
