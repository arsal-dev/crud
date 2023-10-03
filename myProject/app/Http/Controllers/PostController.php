<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function read()
    {
        return view('posts.all', ['posts' => Post::all()]);
    }

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

    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit', ['post' => $post]);
    }

     public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $validated_fields = $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
        ]);

        if ($request->title == $post->title) {
            $result = Post::where('id', $id)->update($validated_fields);

            if ($result) {
                return redirect('posts')->with('success', 'post deleted successfully');
            }
        } else {
            $titleCheck = Post::where('title', $request->title)->get();

            if (empty($titleCheck[0])) {
                $result = Post::where('id', $id)->update($validated_fields);

                if ($result) {
                    return redirect('posts')->with('success', 'post deleted successfully');
                }
            } else {
                return redirect()->back()->with('success', 'bhai jan title change karo');
            }
        }
    }

    public function destroy($id)
    {
        $result = Post::destroy($id);

        if ($result) {
            return redirect()->back()->with('success', 'data deleted successfully');
        }
    }
}
