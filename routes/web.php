<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\PostController;



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

Route::get('/',[HomeController::class, 'utama']);
Route::get('/table',[AuthController::class, 'table']);
// Route::post('/welcome', [AuthController::class, 'welcome']);
Route::get('/data-table', function(){
    return view('halaman.datatable');
});
;

// Route::get('/cast', [CastController::class, 'index']);

//CRUD Kategori

//Create
//Form Tambah Kategori
Route::get('/cast/create', [CastController::class, 'create']);
//Untuk kirim data ke database
Route::post('/cast',[CastController::class, 'store']);
//Read
Route::get('/cast', [CastController::class, 'index']);
//Detail Cast
Route::get('/cast/{cast_id}', [CastController::class, 'show']);
//Update
Route::get('/cast/{cast_id}/edit', [CastController::class, 'edit']);
//Update data ke database
Route::put('/cast/update/{cast_id}', [CastController::class, 'update']);
//Delete
Route::delete('/cast/{cast_id}', [CastController::class, 'destroy']);
//CRUD Post
Route::resource('post', PostController::class);
