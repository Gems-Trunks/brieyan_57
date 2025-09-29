<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Clogin;
use App\Http\Controllers\Canggota;
// use App\Http\Controllers\Csiswa;

// Route::get('/', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [Clogin::class, 'index'])->name('login');
    Route::post('/login', [Clogin::class, 'login_proses'])->name('login_proses');
});

Route::middleware(['auth'])->group(function () {
	Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route::get('/logout', [Clogin::class, 'logout'])->name('logout');
    Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
    })->name('logout');

    Route::get('anggota', [Canggota::class, 'index'])->name('anggota.index');

    // Route::resource('/siswa', Csiswa::class);
});