<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function home()
    {
        $blogs = Blog::all();
        return view('home', ['blogs' => $blogs]);
    }

    public function all_blog_posts()
    {
        $blogs = Blog::all();
        return view('admin.blogs.all', ['blogs' => $blogs]);
    }

    public function blog($id)
    {
        $blog = Blog::where('id', $id)->get();
        return view('blogs.blog', ['blog' => $blog]);
    }

    public function create_blog()
    {
        return view('admin.blogs.create');
    }

    public function create_blog_post(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:blogs',
            'excerpt' => 'required',
            'body' => 'required',
            'thumbnail' => 'required|mimes:jpeg,jpg,png|max:10000',
        ]);


        $image = $request->file('thumbnail');

        $image_name = Str::random(20) . '.' . $image->getClientOriginalExtension();

        $image->storeAs('public/uploads', $image_name);

        $result = Blog::create([
            'title' => $request->input('title'),
            'excerpt' => $request->input('excerpt'),
            'body' => $request->input('body'),
            'thumbnail' => $image_name,
        ]);

        if ($result) {
            return redirect('/')->with('success', 'Blog Added Successfully');
        }
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('admin.blogs.edit', ['blog' => $blog]);
    }

    public function update(Request $request, $id)
    {

        $blog = Blog::find($id);

        $request->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
        ]);

        $image = $request->file('thumbnail');

        if ($image) {
            $result = Storage::delete('public/uploads/' . $blog->thumbnail);

            $image_name = Str::random(20) . '.' . $image->getClientOriginalExtension();

            $image->storeAs('public/uploads', $image_name);

            if ($result) {
                Blog::where('id', $id)->update([
                    'title' => $request->input('title'),
                    'excerpt' => $request->input('excerpt'),
                    'body' => $request->input('body'),
                    'thumbnail' => $image_name,
                ]);

                return redirect('/')->with('success', 'Blog Updated Successfully');
            }
        } else {
            Blog::where('id', $id)->update([
                'title' => $request->input('title'),
                'excerpt' => $request->input('excerpt'),
                'body' => $request->input('body')
            ]);

            return redirect('/')->with('success', 'Blog Updated Successfully');
        }
    }

    public function delete($id)
    {
        $result = Blog::destroy($id);
        if ($result) {
            return redirect('/')->with('success', 'Blog Deleted Successfully');
        }
    }
}
