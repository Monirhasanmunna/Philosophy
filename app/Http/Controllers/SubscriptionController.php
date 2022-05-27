<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscriptions,email',
        ]);

        $subscription = new Subscription();
        $subscription->email = $request->email;
        $subscription->save();
        toastr()->success('Subscription Succesfully :)');
        return redirect()->back();
    }
}
