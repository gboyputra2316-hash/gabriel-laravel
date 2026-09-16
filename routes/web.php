<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/buku', [BookController::class, 'index']);
Route::get('/buku/{id}', [BookController::class, 'show']);
