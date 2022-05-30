<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboard extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        $comments = Comment::latest()->paginate(10);
        $subscribers = Subscription::latest()->paginate(10);
        $user = User::FindorFail(Auth::id());
        $posts = Post::all();
        $pendingPost = Post::where('is_approve', 0)->get();
        return view('admin.dashboard',compact('user','comments','subscribers','users','posts','pendingPost'));
    }
}
