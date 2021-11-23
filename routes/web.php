<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipController;

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



Route::get('/',[ArsipController::class, 'index']); //Route ke halaman Arsip
Route::get('/unggah',[ArsipController::class, 'create']); //Route ke halaman form Unggah data Arsip
Route::post('/add',[ArsipController::class, 'store']); //Route Unggah data Arsip
Route::get('/edit/{id}',[ArsipController::class, 'edit']); //Route ke halaman form Update data Arsip
Route::post('/update/{id}',[ArsipController::class, 'update']); //Route Update data Arsip
Route::delete('/delete/{id}',[ArsipController::class, 'delete']); //Route Hapus data Arsip
Route::get('/search',[ArsipController::class, 'search']); //Route Mencari data Arsip
Route::get('/unduh/{file}',[ArsipController::class, 'unduh']); //Route Mengunduh data Arsip
Route::get('/arsip/{no}',[ArsipController::class, 'detail']); //Route Melihat detail data Arsip

Route::get('/tentang', function () { //Route ke halaman About
    return view('lsp.tentang');
});