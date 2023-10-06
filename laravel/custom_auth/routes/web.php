<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'home'])->name('home');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');


Route::post('/login', [AuthController::class, 'login_post'])->name('login_post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::put('/register', [AuthController::class, 'register_post'])->name('register_post');

Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard')->middleware('auth');
