<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class adminUserController extends Controller
{
    public function index()
    {   
        $user = User::FindorFail(Auth::id());
        return view('admin.user.index',compact('user'));
    }

    public function update(Request $request,$id)
    {
        //return $request;
       
        $request->validate([

            'username' => 'required|max:50',
            'name'  =>  'required|max:50',
            'image'  => 'sometimes|mimes:jpg,jpeg,webp,png,svg,gif|max:2024',
            'about'  => 'sometimes|max:1000',
            'gender' => 'sometimes',
            'age'  => 'sometimes',
            'address' => 'sometimes',
            'education' => 'sometimes',
            'email' => 'sometimes|email',

        ]);

        $user = User::FindorFail($id);
        $image = $request->file('image');
        $slug = Str::slug($request->name);

        if(isset($image))
        {
            //make unique name
            $imageName = $slug.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            //check derectory
            if(!Storage::disk('public')->exists('user'))
            {
                Storage::disk('public')->makeDirectory('user');
            }
            //delete old pic
            if(Storage::disk('public')->exists('user/'.$user->image))
            {
                Storage::disk('public')->delete('user/'.$user->image);
            }

            $userImage = Image::make($image)->resize(960,960)->stream();
            Storage::disk('public')->put('user/'.$imageName,$userImage);
        }else{

            $imageName = $user->image;
        }

        $user->roles_id = Auth::id();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->image = $imageName;
        $user->age = $request->age;
        $user->about = $request->about;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->education = $request->education;
        $user->email = $request->email;
        $user->save();
        toastr()->success('User Information Updated Succesfully :)');
        return redirect()->back();

    }
}
