<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{
    public function index()
    {   
        $categories = Category::latest()->paginate();
        return view('admin.category.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|unique:categories,name|max:50',
        ]);

        $category = new Category;
        $category->name = $request->category;
        $category->slug = Str::slug($request->category);
        $category->save();
        toastr()->success('Category added successfully :)');
        return redirect()->back();

    }

    public function edit($id)
    {
        $category = Category::FindorFail($id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required|max:50',
        ]);

        $category = Category::FindorFail($id);
        $category->name = $request->category;
        $category->slug = Str::slug($request->category);
        $category->save();
        toastr()->success('Category update successfully :)');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $category = Category::FindorFail($id);
        $category->delete();
        
        Session::flash('success','Category Deleted succesfully');
        return redirect()->back();
    }
}
