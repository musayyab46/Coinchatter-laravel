<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Campaign; // Import your Campaign model

class ProfileController extends Controller
{
    public function show()
{
    $user = Auth::user();
    $campaignCount = Campaign::where('user_id', $user->id)->count();

    // Assign badge based on campaign count
    if ($campaignCount == 0) {
        $badge = 'No Campaigns Yet';
    } elseif ($campaignCount <= 5) {
        $badge = 'Newbie Creator';
    } elseif ($campaignCount <= 15) {
        $badge = 'Active Creator';
    } else {
        $badge = 'Campaign Master';
    }

    return view('profile', compact('user', 'campaignCount', 'badge'));
}

}
