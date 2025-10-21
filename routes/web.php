<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('home', ['title' => 'Beranda']);
})->name('home');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth.check')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard.index', ['title' => 'Dashboard Admin']);
    })->name('dashboard');
});
