<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StudentController;

// Route::get('/', function () {

// $data = [
//     'title' => 'This is a blog title',
//     'excerpt' => 'this is a blog excerpt',
//     'body' => 'this is a blog body',
// ];

//     return view('home', ['data' => $data]);
// });

// Route::get('/contact', function () {
//     return view('contact');
// });

Route::get('/', [HomeController::class, 'home']);
Route::get('/contact', [HomeController::class, 'contact']);


Route::get('/create', [StudentController::class, 'create']);
Route::get('/read', [StudentController::class, 'read']);
Route::get('/update', [StudentController::class, 'update']);
Route::get('/delete', [StudentController::class, 'delete']);


Route::get('/mcreate', [StudentController::class, 'mcreate']);
Route::get('/mread', [StudentController::class, 'mread']);
Route::get('/mupdate', [StudentController::class, 'mupdate']);
Route::get('/mdelete', [StudentController::class, 'mdelete']);


Route::get('/posts', [PostController::class, 'read'])->name('post.read');
Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
Route::post('/posts/create', [PostController::class, 'store'])->name('post.store');
Route::delete('/posts/{id}/destroy', [PostController::class, 'destroy'])->name('post.destroy');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::put('/posts/{id}/update', [PostController::class, 'update'])->name('post.update');
