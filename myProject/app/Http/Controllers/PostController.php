<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $validated_data = $request->validate([
            'title' => 'required|unique:posts',
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        $result = Post::create($validated_data);

        if ($result) {
            return redirect()->back()->with('success', 'data inserted successfully');
        }
    }
}
