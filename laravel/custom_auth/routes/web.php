<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'home'])->name('home');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');


Route::post('/login', [AuthController::class, 'login_post'])->name('login_post');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::put('/register', [AuthController::class, 'register_post'])->name('register_post');

Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard')->middleware('auth');



// Blog Routes
Route::middleware('auth')->group(function () {
    Route::get('/blog/create', [BlogController::class, 'create_blog'])->name('create_blog');
    Route::post('/blog/create', [BlogController::class, 'create_blog_post'])->name('create_blog_post');
    Route::get('/blogs', [BlogController::class, 'all_blog_posts'])->name('all_blog_posts');
    Route::get('/blog/{id}/edit', [BlogController::class, 'edit'])->name('edit_blog_posts');
    Route::put('/blog/{id}/edit', [BlogController::class, 'update'])->name('update_blog_posts');
    Route::delete('/blog/{id}/delete', [BlogController::class, 'delete'])->name('delete_blog_post');
});
Route::get('/blog/{id}', [BlogController::class, 'blog'])->name('blog');


// categories
Route::middleware('auth')->group(function () {
    Route::get('/category/create', [CategoryController::class, 'create'])->name('create_category');
    Route::post('/category/create', [CategoryController::class, 'create_post'])->name('create_post');
    Route::get('/categories', [CategoryController::class, 'all'])->name('all_categories');
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('edit_category');
    Route::put('/category/{id}/edit', [CategoryController::class, 'edit_post'])->name('edit_category_post');
    Route::delete('/category/{id}/delete', [CategoryController::class, 'delete'])->name('delete_category');
});
