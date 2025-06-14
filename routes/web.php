<?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers;

// // Route::get('/', function () {
// //     return view('welcome');
// // });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// // Route::get('/dataPasien', [App\Http\Controllers\DataPasienController::class, 'index'])->name('dataPasien');
// // Route::get('/dataPasien/{id}/edit', [App\Http\Controllers\DataPasienController::class, 'edit'])->name('dataPasien.edit');
// // Route::delete('/dataPasien/{id}', [App\Http\Controllers\DataPasienController::class, 'destroy'])->name('dataPasien.destroy');
// Route::resource('dataPasien', [App\Http\Controllers\DataPasienController::class]);

// Route::get('/', [App\Http\Controllers\DataPasienController::class, 'index'])->name('dataPasien');

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataPasienController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PemeriksaanController;
use Illuminate\Support\Facades\Auth;

// Auth routes
Auth::routes();

// Home route
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Resource routes untuk DataPasien (CRUD lengkap)
Route::resource('dataPasien', DataPasienController::class)->parameters([
    'dataPasien' => 'uuid'
]);

Route::get('/pemeriksaan/create', [PemeriksaanController::class, 'create'])->name('pemeriksaan.create');
Route::post('/pemeriksaan/store', [PemeriksaanController::class, 'store'])->name('pemeriksaan.store');
Route::get('/pemeriksaan/{uuid}', [PemeriksaanController::class, 'show'])->name('pemeriksaan.show');




// Route '/' arahkan ke index DataPasien
Route::get('/', [DataPasienController::class, 'index'])->name('dataPasien');



