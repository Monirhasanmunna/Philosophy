<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorDashboard extends Controller
{
    public function index()
    {
        $user = User::FindorFail(Auth::id());
        return view('author.dashboard',compact('user'));
    }
}
