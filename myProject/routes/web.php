<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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



Route::resource('user', UserController::class);
