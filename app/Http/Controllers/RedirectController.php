<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function redirectToReferrals()
{
    return redirect('/referrals');
    // OR if you have named route:
    // return redirect()->route('referrals.index');
}
}
