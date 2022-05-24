<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboard extends Controller
{
    public function index()
    {
        $user = User::FindorFail(Auth::id());
        return view('admin.dashboard',compact('user'));
    }
}
