<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublisherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/buku', [BookController::class, 'index']);
Route::get('/buku/{id}', [BookController::class, 'show']);

// Satu baris ini menghasilkan enam route CRUD kategori sekaligus
// (index, create, store, edit, update, destroy). Halaman detail (show)
// dikecualikan karena kategori tidak butuh halaman detail sendiri.
// Lihat daftarnya dengan: php artisan route:list
Route::resource('kategori', CategoryController::class)->except('show');

// Latihan transfer: pola yang sama persis untuk penerbit.
Route::resource('penerbit', PublisherController::class)->except('show');
