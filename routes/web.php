<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\ReviewController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [FrontendController::class, 'index']);
Route::get('books/{slug}', [FrontendController::class, 'bookview']);

Auth::routes();

Route::post('add-to-profile', [ProfileController::class, 'addBook']);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('profile', [ProfileController::class, 'index']);

    Route::post('add-rating', [RatingController::class, 'add']);

    Route::get('add-review/{book_slug}/userreview', [ReviewController::class, 'add']);
    Route::post('add-review', [ReviewController::class, 'create']);
    Route::get('edit-review/{book_slug}/userreview', [ReviewController::class, 'edit']);
    Route::put('update-review', [ReviewController::class, 'update']);

    Route::get('profile', [ProfileController::class, 'viewprofile']);
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
