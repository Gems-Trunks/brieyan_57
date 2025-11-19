<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cbuku;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/buku', [Cbuku::class, 'api1'])->middleware('api_token');
Route::get('/buku_nested', [Cbuku::class, 'api2']);
