<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthorDashboard extends Controller
{
    public function index()
    {
        return view('author.dashboard');
    }
}
