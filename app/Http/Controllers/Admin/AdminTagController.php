<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class AdminTagController extends Controller
{
    public function index()
    {
        $user = User::FindorFail(Auth::id());
        $tags  = Tag::latest()->paginate();
        return view('admin.tag.index',compact('tags','user'));    }

    public function create()
    {
        $user = User::FindorFail(Auth::id());
        return view('admin.tag.create',compact('user'));
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
        $user = User::FindorFail(Auth::id());
        $tag = Tag::FindorFail($id);
        return view('admin.tag.edit',compact('tag','user'));
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
