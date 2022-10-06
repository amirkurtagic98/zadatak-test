<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('profile', [ProfileController::class, 'index']);
});

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('books', [BookController::class, 'index']);
    Route::get('add-books', [BookController::class, 'add']);
    Route::post('insert-books', [BookController::class, 'insert']);
    Route::get('edit-books/{id}', [BookController::class, 'edit']);
    Route::put('update-books/{id}', [BookController::class, 'update']);
    Route::get('delete-books/{id}', [BookController::class, 'destroy']);

    Route::get('users', [UserController::class, 'users']);
});
