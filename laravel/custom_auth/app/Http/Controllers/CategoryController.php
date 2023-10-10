<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.categories.create');
    }

    public function all()
    {
        $categories = Category::all();
        return view('admin.categories.all', ['categories' => $categories]);
    }

    public function create_post(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories'
        ]);

        $result = Category::create($validatedData);

        if ($result) {
            return redirect('categories')->with('success', 'category added successfully');
        }
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.categories.edit', ['category' => $category, 'id' => $id]);
    }

    public function edit_post(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);

        $result = Category::where('id', $id)->update($validatedData);

        if ($result) {
            return redirect('categories')->with('success', 'category updated successfully');
        }
    }

    public function delete($id)
    {
        $result = Category::destroy($id);

        if ($result) {
            return redirect('categories')->with('success', 'category deleted successfully');
        }
    }
}
