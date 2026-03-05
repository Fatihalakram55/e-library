<?php

use App\Http\Controllers\HallController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/', [HomeController::class, 'index']);

Route::get('/hall', [HallController::class, 'index']);
Route::get('/hall/book/{book:slug}', [HallController::class, 'singleBook']);

Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');

Route::get('/registration', [LoginController::class, 'registration'])->middleware('guest');
Route::post('/registration', [LoginController::class, 'store'])->middleware('guest');

Route::post('logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard.dashboard', ['title' => 'Dashboard']);
})->middleware(['auth', 'isAdmin']);

Route::prefix('dashboard')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/', function () {
        return view('dashboard.dashboard', ['title' => 'Dashboard']);
    });
});