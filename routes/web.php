<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', [\App\Http\Controllers\UsersController::class, 'index'])->name('index');

Route::resource('book', \App\Http\Controllers\BookController::class);
Route::resource('author', \App\Http\Controllers\AuthorController::class);
