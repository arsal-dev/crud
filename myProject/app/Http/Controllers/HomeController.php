<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $data = [
            'title' => 'This is a blog title',
            'excerpt' => 'this is a blog excerpt',
            'body' => 'this is a blog body',
        ];
        return view('home', ['data' => $data]);
    }

    public function contact()
    {
        return view('contact');
    }
}
