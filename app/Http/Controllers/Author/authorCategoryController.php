<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Session;

class authorCategoryController extends Controller
{
    public function index()
    {   
        $user = User::FindorFail(Auth::id());
        $categories = Category::latest()->paginate();
        return view('author.category.index',compact('categories','user'));
    }

    public function create()
    {
        $user = User::FindorFail(Auth::id());
        return view('author.category.create',compact('user'));
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
        $user = User::FindorFail(Auth::id());
        $category = Category::FindorFail($id);
        return view('author.category.edit',compact('category','user'));
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
