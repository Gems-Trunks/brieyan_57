<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Clogin;
use App\Http\Controllers\Canggota;
use App\Http\Controllers\Cbuku;
use App\Http\Controllers\Ckategori;
use App\Http\Controllers\Cpinjam;
use App\Http\Controllers\Crak;

// Route untuk guest (belum login)
Route::middleware(['guest'])->group(function () {
   Route::get('/login', [Clogin::class, 'index'])->name('login');
   Route::post('/login', [Clogin::class, 'login_proses'])->name('login_proses');
});

// Route untuk user yang sudah login
Route::middleware(['auth'])->group(function () {
   Route::get('/', function () {
      $judul = "DASHBOARD";
      $jumlahAnggota = DB::table('anggota')->count();
      $jumlahBuku    = DB::table('buku')->count();

      // Hitung buku yang sedang dipinjam (status = 'Dipinjam')
      $bukuDipinjam  = DB::table('pinjam')
         ->where('status', 'Dipinjam')
         ->count();

      // Buku tersedia = total buku - yang sedang dipinjam
      $bukuTersedia  = $jumlahBuku - $bukuDipinjam;

      return view('dashboard', compact('jumlahAnggota', 'jumlahBuku', 'bukuDipinjam', 'bukuTersedia', 'judul'));
   })->name('dashboard');

   Route::post('/logout', function () {
      Auth::logout();
      request()->session()->invalidate();
      request()->session()->regenerateToken();
      return redirect('/login');
   })->name('logout');

   // Hanya untuk admin
   Route::middleware(['level:admin'])->group(function () {
      Route::controller(Canggota::class)->group(function () {
         Route::get('/anggota', 'index')->name('anggota.index');
         Route::get('/anggota/create', 'create')->name('anggota.create');
         Route::post('/anggota/save', 'save')->name('anggota.save');
         Route::get('/anggota/cetak', 'cetak')->name('anggota.cetak');
         Route::get('/anggota/export', 'export')->name('anggota.export');
         Route::get('/anggota/{id}/edit', 'edit')->name('anggota.edit');
         Route::put('/anggota/{id}/update', 'update')->name('anggota.update');
         Route::get('/anggota/{id}/show', 'show')->name('anggota.show');
         Route::delete('/anggota/{id}/delete', 'delete')->name('anggota.delete');
         Route::get('/anggota/{id}/kartu', 'kartu')->name('anggota.kartu');
      });

      // Buku
      Route::resource('buku', Cbuku::class);



      // Kategori Buku
      Route::controller(Ckategori::class)->group(function () {
         Route::get('kategori', 'index')->name('kategori.index');
         Route::post('kategori', 'store')->name('kategori.store');
         Route::put('kategori/{$id}', 'update')->name('kategori.update');
         Route::delete('kategori/{$id}', 'destroy')->name('kategori.destroy');
      });

      // rak
      Route::controller(Crak::class)->group(function () {
         Route::get('rak', 'index')->name('rak.index');
         Route::post('rak', 'store')->name('rak.store');
         Route::put('rak/{id}', 'update')->name('rak.update');
         Route::delete('rak/{id}', 'destroy')->name('rak.destroy');
      });

      // pinjam
      Route::controller(Cpinjam::class)->group(function () {
         Route::get('/pinjam/', [Cpinjam::class, 'index'])->name('pinjam.index');
         Route::get('/pinjam/create', [Cpinjam::class, 'create'])->name('pinjam.create');
         Route::post('/pinjam/store', [Cpinjam::class, 'store'])->name('pinjam.store');
         Route::get('/pinjam/view/{id}', [Cpinjam::class, 'view'])->name('pinjam.view');
         Route::get('/pinjam/kembali/{id_pinjam}/{id_buku}', [Cpinjam::class, 'kembali'])->name('pinjam.kembali');
      });
   });
});
