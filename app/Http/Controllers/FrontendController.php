<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use CyrildeWit\EloquentViewable\Support\Period;

class FrontendController extends Controller
{
    public function home()
    {
        $posts = Post::latest()->paginate(8);
        $frontendPost = Post::orderBy('created_at','Desc')->take(3)->get();
        $firstItem = $frontendPost->splice(0,1);
        $secondItem = $frontendPost->splice(0,2);

        
        return view('frontend.homepage',compact('posts','firstItem','secondItem'));
    }

}
