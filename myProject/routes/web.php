<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
