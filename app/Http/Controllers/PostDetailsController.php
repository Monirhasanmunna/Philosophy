<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostDetailsController extends Controller
{
    public function index($slug)
    {

        $post = Post::where('slug',$slug)->status()->approve()->first();
        $comments = $post->comments()->get();
        return view('frontend.postdetails',compact('post','comments'));
    }

    public function categoryPost($slug)
    {
        $posts = Category::where('slug',$slug)->first();
        return view('frontend.categoryPost',compact('posts'));
    }

    public function tagPost($slug)
    {
        $posts = Tag::where('slug',$slug)->first();
        return view('frontend.tagPost',compact('posts'));
    }

}
