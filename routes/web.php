<?php

use App\Mail\SendEmail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;
// use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\QrController;
// use App\Http\Controllers\CastController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\GraphController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileAdminController;
use App\Http\Controllers\ProfilePembimbingController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\DataTableController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PerizinanController;
use App\Http\Controllers\Auth\BayarController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DataBidangController;
use App\Http\Controllers\PembimbingController;
use App\Http\Controllers\DataAbsensiController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\JumlahPesertaController;
use App\Http\Controllers\SettingmagangController;
use App\Http\Controllers\komponenpenilaianController;
use App\Http\Controllers\ReportdanSertifikatController;

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
    return view('login.index');
});
//absen
// Route::resource('/absen', [AbsenController::class, 'create']);

Route::get('/send-email', function () {
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


Route::get('/izin_admin', [PerizinanController::class, 'index_admin'])->name('izin_admin.index');
Route::get('/izin_admin/edit/{id}', [PerizinanController::class, 'edit'])->name('izin_admin.edit');
Route::PUT('/izin_admin/update/{id}', [PerizinanController::class, 'update'])->name('izin_admin.update');

// Route::get('/table',[AuthController::class, 'table']);
// Route::post('/welcome', [AuthController::class, 'welcome']);
Route::get('/data-table', function () {
    return view('halaman.datatable');
});;

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/postregister', [RegisterController::class, 'store'])->name('postregister');
Route::post('/postjurusan', [RegisterController::class, 'jurusan'])->name('postjurusan');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/pembimbing/{id}', [PembimbingController::class, 'getNama'])->name('getNama')->middleware('only.ajax');;
Route::post('/sekolah/storenew', [SekolahController::class, 'storenew'])->middleware('only.ajax');

//admin
Route::group(['middleware' => ['auth:admin,akun']], function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/profile_admin', [ProfileAdminController::class, 'index'])->name('profile_admin');
    //peserta
    Route::get('/peserta', [PesertaController::class, 'index'])->name('peserta.index');
    Route::get('/peserta/create', [PesertaController::class, 'create'])->name('peserta.create');
    Route::PUT('/peserta/store', [PesertaController::class, 'store'])->name('peserta.store');
    Route::get('/peserta/edit/{id}', [PesertaController::class, 'edit'])->name('peserta.edit');
    Route::put('/peserta/update/{id}', [PesertaController::class, 'update'])->name('peserta.update');
    Route::get('/peserta/hapus/{id}', [PesertaController::class, 'destroy'])->name('peserta.hapus');
    Route::get('/peserta/show/{id}', [PesertaController::class, 'show'])->name('peserta.show');
    Route::get('/peserta/izin/{id}', [PesertaController::class, 'izin'])->name('peserta.izin');

    //pembimbing
    Route::get('/pembimbing', [PembimbingController::class, 'index'])->name('pembimbing.index');
    Route::get('/pembimbing/create', [PembimbingController::class, 'create'])->name('pembimbing.create');
    Route::PUT('/pembimbing/store', [PembimbingController::class, 'store'])->name('pembimbing.store');
    Route::get('/pembimbing/edit/{id}', [PembimbingController::class, 'edit'])->name('pembimbing.edit');
    Route::PUT('/pembimbing/update/{id}', [PembimbingController::class, 'update'])->name('pembimbing.update');
    Route::get('/pembimbing/hapus/{id}', [PembimbingController::class, 'destroy'])->name('pembimbing.hapus');
    Route::get('/test', [PembimbingController::class, 'test'])->name('test');


    //sekolah
    Route::get('/sekolah', [SekolahController::class, 'index'])->name('sekolah.index');
    Route::get('/sekolah/create', [SekolahController::class, 'create'])->name('sekolah.create');
    Route::PUT('/sekolah/store', [SekolahController::class, 'store'])->name('sekolah.store');
    Route::get('/sekolah/edit/{id}', [SekolahController::class, 'edit'])->name('sekolah.edit');
    Route::PUT('/sekolah/update/{id}', [SekolahController::class, 'update'])->name('sekolah.update');
    Route::get('/sekolah/hapus/{id}', [SekolahController::class, 'destroy'])->name('sekolah.hapus');
    //bidang
    Route::get('/bidang', [DataBidangController::class, 'index'])->name('bidang.index');
    Route::get('/bidang/create', [DataBidangController::class, 'create'])->name('bidang.create');
    Route::post('/bidang/store', [DataBidangController::class, 'store'])->name('bidang.store');
    Route::get('/bidang/edit/{id}', [DataBidangController::class, 'edit'])->name('bidang.edit');
    Route::PUT('/bidang/update/{id}', [DataBidangController::class, 'update'])->name('bidang.update');
    Route::get('/bidang/hapus/{id}', [DataBidangController::class, 'destroy'])->name('bidang.hapus');

    //CRUD Halaman Setting Magang
    //Create
    //Form Tambah Setting Magang;

    //Read
    //Tampil Semua Data
    Route::get('/settingmagang', [SettingmagangController::class, 'index']);
    //Detail Setting Magang berdasarkan id
    Route::get('/settingmagang/{settingmagang_id}', [SettingmagangController::class, 'show']);

    //Update
    //Form Update Setting Magang
    Route::get('/settingmagang/{settingmagang_id}/edit', [SettingmagangController::class, 'edit']);
    //Update data ke database berdasarkan id
    Route::put('/settingmagang/{settingmagang_id}', [SettingmagangController::class, 'update']);

    //CRUD Halaman Komponen Penilaian
    //Create
    //Form Komponen Penilaian;
    Route::get('/komponenpenilaian/create', [komponenpenilaianController::class, 'create']);
    //Untuk kirim data ke database atau tambah data ke database
    Route::post('/komponenpenilaian', [komponenpenilaianController::class, 'store']);

    //Read
    //Tampil Semua Data
    Route::get('/komponenpenilaian', [komponenpenilaianController::class, 'index']);
    //Detail Komponen Penilaian berdasarkan id
    Route::get('/komponenpenilaian/{komponenpenilaian_id}', [komponenpenilaianController::class, 'show']);

    //Update
    //Form Update Komponen Penilaian
    Route::get('/komponenpenilaian/{komponenpenilaian_id}/edit', [komponenpenilaianController::class, 'edit']);
    //Update data ke database berdasarkan id
    Route::put('/komponenpenilaian/{komponenpenilaian_id}', [komponenpenilaianController::class, 'update']);

    //Delete
    //Delete berdasarkan id
    Route::delete('/komponenpenilaian/{komponenpenilaian_id}', [komponenpenilaianController::class, 'destroy']);

    //CRUD Halaman Penilaian

    //Read
    //Tampil Semua Data
    Route::get('/penilaian', [PenilaianController::class, 'index']);

    //Update
    //Form Update Penilaian
    Route::get('/penilaian/{penilaian_id}/edit', [PenilaianController::class, 'edit']);
    //Update data ke database berdasarkan id
    Route::put('/penilaian/update/{penilaian_id}', [PenilaianController::class, 'update']);
});

//siswa
// Route::group(['middleware'=>['auth','CekLevel:akun']], function(){

Route::get('/reportnsertifikat', [ReportController::class, 'index'])->name('reportnsertifikat');

Route::post('/upload', [UploadController::class, 'store'])->name('upload.file');


Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

Route::get('/changePassword', 'LoginController@showChangePasswordForm');
// Route::post('/changepassword','LoginController@changePassword')->name('changePassword');
Route::post('/changepassword', [LoginController::class, 'changePassword']);
//perizinan
Route::get('/perizinan', [PerizinanController::class, 'index'])->name('perizinan.index');
Route::get('/perizinan/create', [PerizinanController::class, 'create'])->name('perizinan.create');
Route::PUT('/perizinan/store', [PerizinanController::class, 'store'])->name('perizinan.store');
Route::get('/perizinan/edit/{id}', [PerizinanController::class, 'edit'])->name('perizinan.edit');
Route::PUT('/perizinan/update/{id}', [PerizinanController::class, 'update'])->name('perizinan.update');
Route::post('/postperizinan', [PerizinanController::class, 'postperizinan'])->name('postperizinan');
Route::get('/perizinan/hapus/{id}', [PerizinanController::class, 'destroy'])->name('perizinan.hapus');

//CRUD Logbook
// Route::resource('logbook', LogbookController::class);
//Create
//Form Tambah Logbook
Route::get('/logbook/create', [LogbookController::class, 'create']);
//Untuk kirim data ke database atau tambah data ke database
Route::post('/logbook', [LogbookController::class, 'store']);

//Read
//Tampil Semua Data
Route::get('/logbook', [LogbookController::class, 'index']);
//Detail Logbook berdasarkan id
Route::get('/logbook/{logbook_id}', [LogbookController::class, 'show']);

Route::get('/logbook/detail/{nisn}', [LogbookController::class, 'detail']);


//Update
//Form Update Logbook
Route::get('/logbook/{logbook_id}/edit', [LogbookController::class, 'edit']);
//Update data ke database berdasarkan id
Route::put('/logbook/{logbook_id}', [LogbookController::class, 'update']);

//Delete
//Delete berdasarkan id
Route::delete('/logbook/{logbook_id}', [LogbookController::class, 'destroy']);

// // CRUD Absen
// Route::group(['prefix' => 'absen'], function () {
//     Route::post('/masuk', [AbsenController::class, 'scanMasuk'])->name('absen.masuk');
//     Route::post('/keluar', [AbsenController::class, 'scanKeluar'])->name('absen.keluar');
// });

//CRUD Report-DataTable
// DataTable
Route::get('/datatable', [DataTableController::class, 'datatable']);

//CRUD Report-grafik
Route::get('/show-map', [GraphController::class, 'showMap']);
Route::post('/show-chart', [GraphController::class, 'Chart']);

//Route untuk Scan QR Code
Route::get('/', [DashController::class, 'utama'])->middleware('auth:admin,akun');
Route::get('/scan', [DashController::class, 'scan']);
// });

// qr-code
Route::get('/qr-code', [QrController::class, 'generateQrCode']);


//pembayaran

//admin
// Route::get('/admin/dashboard', function () {
//     // Only users with the "admin" role can access this route
// })->middleware('auth', 'role:admin');
// Route::get('/register', [RegisterController::class, 'index']);
// Route::post('/register', [RegisterController::class, 'store']);
//Route::get('/logbook',[LogbookController::class, 'index'])->name('logbook');
Route::get('/report', [ReportController::class, 'index'])->name('report');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');

Route::get('send', [MailController::class, 'index']);

//CRUD Halaman Bayar
//Menampilkan no va dari untuk halaman bayar
// Route::get('/bayar', [BayarController::class, 'bayar'])->name('bayar');

//Berhasil
//Create
// //Form Bayar;
Route::get('/bayar/create', [BayarController::class, 'create']);
//Untuk kirim data ke database atau tambah data ke database
Route::post('/bayar', [BayarController::class, 'store']);

//Read
//Tampil Semua Data
Route::get('/bayar', [BayarController::class, 'bayar']);

// CRUD Absen
// Route::group(['prefix' => 'absen'], function () {
//     Route::post('/masuk', [AbsenController::class, 'scanMasuk'])->name('absen.masuk');
//     Route::post('/keluar', [AbsenController::class, 'scanKeluar'])->name('absen.keluar');
// });
Route::resource('absen', AbsenController::class)->only(['create', 'store'])->names([
    'create' => 'absen.create',
    'store' => 'absen.store'
]);

// Data Tabel Absensi
Route::get('/absensi', [DataAbsensiController::class, 'absensi']);

//Dashboard Menampilkan Jumlah peserta yang hadir hari ini dan bulan ini
Route::get('/jumlah-peserta', [JumlahPesertaController::class, 'jumlahPeserta']);

//pembimbing
Route::get('/profile_pembimbing', [ProfilePembimbingController::class, 'index'])->name('profile_pembimbing');
Route::get('/pembimbing/show', [PesertaController::class, 'showpembimbing'])->name('pembimbing.show');
Route::post('/postpembimbing/{id}', [PembimbingController::class, 'store'])->name('postpembimbing');
Route::post('/postdatamagang/{id}', [DataMagangController::class, 'store'])->name('postdatamagang');



// Report dan Sertifikat
Route::get('/ReportdanSertifikat/{nisn}', [ReportdanSertifikatController::class, 'showImage']);
Route::get('/tampilan', [ReportdanSertifikatController::class, 'tampilan'])->name('tampilan');
// Route::get('/tampilan', [ReportdanSertifikatController::class, 'tampilan']);
Route::post('/store/{nisn}', [ReportdanSertifikatController::class, 'store']);

// Route::get('/tampilan/lihat/{nisn}', [ReportdanSertifikatController::class, 'lihat']);
Route::get('/tampilan/lihat/{nisn}', [ReportdanSertifikatController::class, 'lihat'])->name('reports');
