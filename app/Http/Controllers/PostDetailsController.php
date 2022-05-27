<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostDetailsController extends Controller
{
    public function index($slug)
    {
        $post = Post::where('slug',$slug)->first();
        return view('frontend.postdetails',compact('post'));
    }
}