<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('web.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('posts/create', 'PostController@create')->name('posts.create');
    Route::post('posts/store', 'PostController@store')->name('posts.store');
});

require __DIR__ . '/auth.php';
