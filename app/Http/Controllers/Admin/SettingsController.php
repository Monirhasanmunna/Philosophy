<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Logo;
use App\Models\Social;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SettingsController extends Controller
{
    public function index()
    {
        $user = User::FindorFail(Auth::id());
        $logo = Logo::where('id',1)->first();
        return view('admin.settings.index',compact('user','logo'));
    }

    public function logoUpdate(Request $request , $id)
    {
        $request->validate([

            'logo' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg,xml',
            
        ]);

        $logo = Logo::FindorFail($id);
        $image = $request->file('logo');
        $logos = 'logo';

        if($image){

            //unique name create
            $imageName = $logos.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            //storage check
            if(!Storage::disk('public')->exists('logo'))
            {
                Storage::disk('public')->makeDirectory('logo');
            }

            //delete old pic
            if(Storage::disk('public')->exists('logo/'.$logo->logo))
            {
                Storage::disk('public')->delete('logo/'.$logo->logo);
            }

            $postImage = Image::make($image)->resize(478,86)->stream();
            Storage::disk('public')->put('logo/'.$imageName,$postImage);
        }else{

            $imageName = $logo->logo;
        }

        $logo->logo = $imageName;
        $logo->save();
        toastr()->success('Logo Updated Succesfully :)');
        return redirect()->back();
    }

    public function socialUpdate(Request $request , $id)
    {
        $request->validate([

            'facebook' => 'required',
            'instagram' => 'required',
            'twitter'   => 'required',
            'pinterest' => 'required',
            'google_plus' => 'required',
            'linkdin' => 'required',

        ]);

        $social = Social::FindorFail($id);

        $social->facebook = $request->facebook;
        $social->instagram = $request->instagram;
        $social->twitter = $request->twitter;
        $social->pinterest = $request->pinterest;
        $social->google_plus = $request->google_plus;
        $social->linkdin = $request->linkdin;
        $social->save();
        toastr()->success('Social Link Updated Succesfully :)');
        return redirect()->back();

    }

    public function aboutUpdate(Request $request, $id)
    {
        $request->validate([

            'about' => 'required',

        ]);

        $about = About::FindorFail($id);
        $about->about = $request->about;
        $about->save();
        toastr()->success('Social Link Updated Succesfully :)');
        return redirect()->back();

    }
}
