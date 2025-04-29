<?php

namespace App\Http\Controllers;

use App\Models\Campaign; 
use App\Models\Share; // if you are using Share model for tracking referrals
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // ✅ IMPORTANT

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::latest()->get();
        return view('campaigns.index', compact('campaigns'));
    }

    public function create()
    {
        return view('campaigns.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        Campaign::create([
            'title' => $request->title,
            'description' => $request->description,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'user_id' => Auth::id(), // ✅
        ]);

        return redirect()->route('campaigns.index')->with('success', 'Campaign created!');
    }

    public function show(string $id)
    {
        $campaign = Campaign::findOrFail($id); // ✅ fetch the campaign
        $ref = request('ref');

        if ($ref && Auth::check() && $ref != Auth::id()) {
            Share::create([
                'campaign_id' => $campaign->id,
                'sender_id' => $ref,
                'receiver_id' => Auth::id(),
                'channel' => 'referral_link',
            ]);
        }

        return view('campaigns.show', compact('campaign', 'ref'));
    }

    public function edit(string $id)
    {
        $campaign = Campaign::findOrFail($id); // ✅
        return view('campaigns.edit', compact('campaign'));
    }

    public function update(Request $request, string $id)
    {
        $campaign = Campaign::findOrFail($id); // ✅

        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $campaign->update($request->all());

        return redirect()->route('campaigns.index')->with('success', 'Campaign updated!');
    }

    public function destroy(string $id)
    {
        $campaign = Campaign::findOrFail($id); // ✅
        $campaign->delete();

        return redirect()->route('campaigns.index')->with('success', 'Campaign deleted!');
    }
}
