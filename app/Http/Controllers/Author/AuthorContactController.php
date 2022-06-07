<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;
use App\Models\User;

class AuthorContactController extends Controller
{
    public function contact()
    {
        $user = User::FindorFail(Auth::id());
        $contact = Contact::where('id', 1)->first();
        return view('author.contact.contact',compact('user','contact'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([

            'phone' => 'required|min:11|max:13',
            'email' => 'required|email',
            'address' => 'required',
            'city'    => 'required',
            'area_code' => 'required',
            'description' => 'required|max:2000',

        ]);

        $contact = Contact::FindorFail($id);
        $contact->phone = $request->phone;
        $contact->email = $request->email;
        $contact->address = $request->address;
        $contact->city = $request->city;
        $contact->area_code = $request->area_code;
        $contact->description = $request->description;
        $contact->save();
        toastr()->success('Contact updated successfully :)');
        return redirect()->back();
    }
}
