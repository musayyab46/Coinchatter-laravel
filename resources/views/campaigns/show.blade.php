@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $campaign->title }}</h2>
    <p>{{ $campaign->description }}</p>
    <p><strong>Dates:</strong> {{ $campaign->start_date }} to {{ $campaign->end_date }}</p>

    <hr>

    <h4>Share This Campaign</h4>
    @php
        $shareUrl = route('campaigns.show', $campaign->id) . '?ref=' . auth()->id();
    @endphp

    <a class="btn btn-success" target="_blank" href="https://wa.me/?text={{ urlencode($shareUrl) }}">Share on WhatsApp</a>
    <a class="btn btn-primary" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($shareUrl) }}">Share on Facebook</a>
</div>
@endsection
