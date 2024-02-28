<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can logout web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard', [
        'blogs' => Blog::latest()->take(6)->get()
    ]);
})->name('dashboard')->middleware('auth');

Route::resource('/blogs', BlogController::class)->middleware('auth');
Route::get('/myblogs', [BlogController::class, 'myblogs'])->name('blogs.myblogs')->middleware('auth');
Route::resource('/users', UserController::class)->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::get('/register', [AuthController::class, 'register'])->name('register')->middleware('guest');

Route::post('/login', [AuthController::class, 'login_p'])->name('login_p')->middleware('guest');
Route::post('/register', [AuthController::class, 'register_p'])->name('register_p')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
