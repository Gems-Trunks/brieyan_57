<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Clogin;
use App\Http\Controllers\Canggota;
use App\Http\Controllers\Cbuku;
use App\Http\Controllers\Ckategori;

// Route::get('/', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [Clogin::class, 'index'])->name('login');
    Route::post('/login', [Clogin::class, 'login_proses'])->name('login_proses');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        $judul = "DASHBOARD";
        return view('dashboard', compact('judul'));
    })->name('dashboard');

    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    })->name('logout');


    Route::middleware(['level:admin'])->group(function () {
        Route::controller(Canggota::class)->group(function () {
            Route::get('/anggota', [Canggota::class, 'index'])->name('anggota.index');
            Route::get('/anggota/create', [Canggota::class, 'create'])->name('anggota.create');
            Route::post('/anggota/save', [Canggota::class, 'save'])->name('anggota.save');
            Route::get('/anggota/{id}/edit', [Canggota::class, 'edit'])->name('anggota.edit');
            Route::put('/anggota/{id}/update', [Canggota::class, 'update'])->name('anggota.update');
            Route::get('/anggota/{id}/show', [Canggota::class, 'show'])->name('anggota.show');
            Route::delete('/anggota/{id}/delete', [Canggota::class, 'delete'])->name('anggota.delete');
        });
        Route::resource('buku', Cbuku::class);
        Route::controller(Ckategori::class)->group(function () {
            Route::get('buku/kategori', [Ckategori::class, "index"])->name('kategori.index');
            Route::post('buku/kategori', [Ckategori::class, "store"])->name('kategori.store');
            Route::get('buku/kategori/{Mkategori}', [Ckategori::class, "edit"])->name('kategori.edit');
            Route::put('buku/kategori/{Mkategori}', [Ckategori::class, "update"])->name('kategori.update');
            Route::delete('buku/kategori/{Mkategori}', [Ckategori::class, "destroy"])->name('kategori.destroy');
        });
    });
});
