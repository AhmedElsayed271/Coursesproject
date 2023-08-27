<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {

        $categories = Category::paginate(10);

        return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => "required|min:3|unique:categories,name",
            'status' => "required|in:active,inactive",
        ]);

        Category::create([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        return redirect()->route('categories.index')->with(['success' => "Added Successfuly"]);
    }

    public function edit($id)
    {
        $category = Category::find($id);

        if(!$category){
            return redirect()->route('categories.index')->with(['error' => 'This Category Dson\' Exist']);
        }

        return view('dashboard.categories.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => "required|min:3|unique:categories,name,$id",
            'status' => "required|in:active,inactive",
        ]);


        $category = Category::find($id);

        if(!$category){
            return redirect()->route('categories.index')->with(['error' => 'This Category Dson\' Exist']);
        }

        $category->update($request->all());

        return redirect()->route('categories.index')->with(['success' => "Updated Successfuly"]);

    }
    public function destroy($id)
    {
        $category = Category::find($id);

        if(!$category){
            return redirect()->route('categories.index')->with(['error' => 'This Category Dson\' Exist']);
        }

        $category->delete();

        return redirect()->route('categories.index')->with(['success' => "Updated Successfuly"]);

    }
}
