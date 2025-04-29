@extends('layouts.app')

@section('content')
<div class="container">
    <h2>All Campaigns</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('campaigns.create') }}" class="btn btn-primary mb-3">Create Campaign</a>

    <div class="row">
        @foreach($campaigns as $campaign)
        <div class="col-md-6">
            <div class="card mb-3">
                <div class="card-body">
                    <h5>{{ $campaign->title }}</h5>
                    <p>{{ $campaign->description }}</p>
                    <a href="{{ route('campaigns.show', $campaign->id) }}" class="btn btn-info">View & Share</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
