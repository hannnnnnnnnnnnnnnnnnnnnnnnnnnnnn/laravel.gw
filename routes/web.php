<?php

use App\Http\Controllers\JurusanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini adalah tempat dimana Anda dapat mendaftarkan rute web untuk aplikasi Anda.
| Rute-rute ini dimuat oleh RouteServiceProvider dalam sebuah grup yang berisi
| middleware "web". Sekarang, buat sesuatu yang hebat!
|
*/

// Rute default untuk halaman utama
Route::get('/', function () {
    return view('welcome'); // Rute ini mengembalikan tampilan 'welcome' ketika URL root diakses.
});


// Grup untuk rute yang memerlukan autentikasi
Route::middleware(['login'])->group(function (){
        Route::resource('jurusan', JurusanController::class);
        Route::resource('siswa', SiswaController::class);
        Route::post('/login/logout', [LoginController::class, 'logout'])->name('logout');
    });

// Grup untuk rute yang hanya bisa diakses oleh tamu (belum login)
Route::middleware(['guest'])->group(function () { 
        Route::get('/login', [LoginController::class, 'index'])->name('login');
        Route::get('/register', [LoginController::class, 'register']);
    });

Route::post('/login', [LoginController::class, 'login']);
Route::post('/create', [LoginController::class, 'create']);
