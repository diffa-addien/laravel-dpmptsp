<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DetailPerizinanController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\SdmController;
use App\Http\Controllers\BeritaController; 
use App\Http\Controllers\HalamanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [BerandaController::class, 'index']);

// Rute untuk halaman Syarat Perizinan
Route::get('/syarat-perizinan', function () {
    return view('pages.syarat-perizinan');
})->name('syarat-perizinan');
// RUTE BARU untuk halaman Cara Mendaftar
Route::get('/cara-mendaftar', function () {
    return view('pages.cara-mendaftar');
})->name('cara-mendaftar');

Route::get('/faq', [FaqController::class, 'index'])->name('faq');

Route::get('/struktur-organisasi', [SdmController::class, 'index'])->name('sdm');
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/halaman/{slug}', [HalamanController::class, 'show'])->name('halaman.show');
