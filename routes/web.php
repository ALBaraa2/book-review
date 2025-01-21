<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthorController;

Route::get('/', function () {
    return redirect()->route('books.index');
});

Route::resource('books', BookController::class);

Route::resource('books.reviews', ReviewController::class)
    ->scoped(['review' => 'id'])
    ->only(['create', 'store', 'destroy']);

Route::resource('authors', AuthorController::class)->only(['show']);

Route::fallback(function () {
    return 'This Route dose no exist';
});
