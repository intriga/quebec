<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\PostController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/post/create', [PostController::class, 'create']);
Route::get('/post/{slug}', [PostController::class, 'show']);