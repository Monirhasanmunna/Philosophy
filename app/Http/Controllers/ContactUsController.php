<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([

            'cName' => 'required|max:50',
            'cEmail' => 'required|email',
            'cMessage' => 'required|max:2000',
        ]);

        $con = new ContactUs();
        $con->name = $request->cName;
        $con->email = $request->cEmail;
        $con->website = $request->cWebsite;
        $con->message = $request->cMessage;
        $con->save();
        toastr()->success('Message Added Succesfully :)');
        return redirect()->back();

    }
}
