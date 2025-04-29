<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShareController extends Controller
{
    public function myReferrals()
    {
         $shares = Auth::user()->sharesSent()->with('receiver', 'campaign')->latest()->get();

        return view('shares.my_referrals', compact('shares'));
        
    }
}
