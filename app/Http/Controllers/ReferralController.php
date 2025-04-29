<?php

/*namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function index()
{
    return view('referrals.index', [
        'referrals' => auth()->user()->referrals()->with('referee')->get(),
       'referralLink' => auth()->user()->referral_url
    ]);
}

public function process(Request $request)
{
    // Logic to award points/credits when referee completes an action
}
public function referralPage()
{
    $user = auth()->user(); // get the logged-in user

    // Assuming 'referral_count' field is in your 'referrals' table
    $totalReferrals = \App\Models\Referral::where('user_id', $user->id)
                        ->sum('referral_count');

    $totalPoints = $totalReferrals * 10; // Each referral = 10 points

    return view('referral.page', compact('totalPoints'));
}


}*/

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function index()
    {
        $user = auth()->user(); // Logged-in user

        // 1. Get list of referrals from referrals table
        $referrals = $user->referrals()->with('referee')->get();

        // 2. Get referral link from user
        $referralLink = $user->referral_url;

        // 3. Get referral_count from users table
        $referralCount = $user->referral_count ?? 0;

        // 4. Calculate total points
        $totalPoints = $referralCount * 10;

        // 5. Pass everything to the view
        return view('referrals.index', compact('referrals', 'referralLink', 'totalPoints'));
    }

    public function process(Request $request)
    {
        // Logic to award points/credits when referee completes an action
    }
}
