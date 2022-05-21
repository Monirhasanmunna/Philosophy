<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class AdminTagController extends Controller
{
    public function index()
    {
        $tags  = Tag::latest()->paginate();
        return view('admin.tag.index',compact('tags'));    }

    public function create()
    {
        return view('admin.tag.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tag' => 'required|unique:tags,name|max:50',
        ]);

        $tag = new Tag;

        $tag->name = $request->tag;
        $tag->slug = Str::slug($request->tag);
        $tag->save();
        toastr()->success('Tag added successfully :)');
        return redirect()->back();
    }

    public function edit($id)
    {
        $tag = Tag::FindorFail($id);
        return view('admin.tag.edit',compact('tag'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'tag' => 'required|unique:tags,name|max:50',
        ]);

        $tag = Tag::FindorFail($id);
        $tag->name = $request->tag;
        $tag->slug = Str::slug($request->tag);
        $tag->save();
        toastr()->success('Tag Updated Succesfully :)');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $tag = Tag::FindorFail($id);
        $tag->delete();
        toastr()->success('Tag Deleted Succesfully :)');
        return redirect()->back();
    }
}
