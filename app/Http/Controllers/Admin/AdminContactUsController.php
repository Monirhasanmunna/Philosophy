<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactUs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminContactUsController extends Controller
{
    public function index()
    {
        $user = User::FindorFail(Auth::id());
        $contacts = ContactUs::orderBy('created_at','Desc')->paginate(10);
        return view('admin.contactus.index',compact('user','contacts'));
    }

    public function show($id)
    {
        $user = User::FindorFail(Auth::id());
        $contact = ContactUs::FindorFail($id);
        return view('admin.contactus.show',compact('contact','user'));
    }

    public function destroy($id)
    {
        $contact = ContactUs::FindorFail($id);
        $contact->delete();
        toastr()->success('Message Deleted Successfully :)');
        return redirect()->back();
    }
}
