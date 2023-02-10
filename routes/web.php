<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/kategori', [HomeController::class,'kategori']);
Route::get('/kategori/tambah', [HomeController::class,'kategori_tambah']);
Route::post('/kategori/aksi', [HomeController::class,'kategori_aksi']);
Route::get('/kategori/edit/{id}',[HomeController::class,'kategori_edit']);
Route::put('/kategori/update/{id}',[HomeController::class,'kategori_update']);
Route::get('/kategori/hapus/{id}',[HomeController::class, 'kategori_hapus']);

Route::get('/transaksi', [HomeController::class, 'transaksi']);