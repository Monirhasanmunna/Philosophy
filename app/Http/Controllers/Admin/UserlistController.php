<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserlistController extends Controller
{
    public function index()
    {
        $users = User::where('roles_id', 2)->get();
        return view('admin.authorList.index',compact('users'));
    }

    public function show($id)
    {
        $user = User::FindorFail($id);
        return view('admin.authorList.show',compact('user'));
    }

    public function destroy($id)
    {
        $user = User::FindorFail($id);

        if(Storage::disk('public')->exists('user/'.$user->image))
        {
            Storage::disk('public')->delete('user/'.$user->image);
        }
        $user->delete();
        toastr()->success('User Deleted Succesfully :)');
        return redirect()->back();
       

    }
}
