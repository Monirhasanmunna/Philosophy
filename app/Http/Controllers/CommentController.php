<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request,$post)
    {

        $request->validate([

            'name' => 'required|max:50',
            'email' => 'required|email',
            'text' => 'required|max:1000',

        ]);

        $comment = new Comment;
        $comment->post_id = $post;
        $comment->user_id = Auth::id();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->website = $request->website;
        $comment->text = $request->text;
        $comment->save();
        toastr()->success('Comments Added Succesfully :)');
        return redirect()->back();

    }

    public function index($post)
    {
        $comments = Comment::where('post_id',$post)->get();
        return view('frontend.postdetails',compact('comments'));
    }
}
