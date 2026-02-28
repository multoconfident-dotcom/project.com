<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\HomeController;

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

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Resource routes
Route::resource('pasien', PasienController::class);
Route::resource('dokter', DokterController::class);

// Route tambahan untuk melihat pasien berdasarkan dokter
Route::get('dokter/{id}/pasiens', [DokterController::class, 'showPasiens'])->name('dokter.showPasiens');
