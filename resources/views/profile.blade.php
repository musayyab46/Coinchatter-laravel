@extends('layouts.app')

@section('content')
<style>
    .badge {
        font-size: 1.2rem; /* Make text larger */
        padding: 0.7em 1.2em; /* More padding inside badge */
        border-radius: 1rem; /* Make badge more rounded */
    }
</style>
<div class="container py-5">
    <div class="card mx-auto shadow" style="max-width: 600px;">
        <div class="card-body text-center">
            <h2 class="card-title mb-4">My Profile</h2>

            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>User ID:</strong> {{ $user->id }}</p>

            <p><strong>Campaigns Created:</strong> {{ $campaignCount }}</p>

            <div class="mt-3">
                <span class="badge 
                    @if($campaignCount == 0) bg-secondary
                    @elseif($campaignCount <= 5) bg-primary
                    @elseif($campaignCount <= 15) bg-success
                    @else bg-warning text-dark
                    @endif
                ">
                    {{ $badge }}
                </span>
            </div>

        </div>
    </div>
</div>
@endsection
