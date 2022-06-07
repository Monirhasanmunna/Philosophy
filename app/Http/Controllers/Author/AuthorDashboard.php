<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorDashboard extends Controller
{

    public function index()
    {
        
        $users = User::all();
        $comments = Comment::latest()->paginate(10);
        $subscribers = Subscription::latest()->paginate(10);
        $user = User::FindorFail(Auth::id());
        $authorPost = Post::where('user_id',Auth::id());
        $posts = Post::all();
        $pendingPost = $authorPost->where('is_approve', 0)->get();
        return view('author.dashboard',compact('user','comments','subscribers','users','posts','pendingPost'));
    
    }
}
