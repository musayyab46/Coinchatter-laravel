@extends('layouts.app')

@section('content')
<div class="container">
    <h2>My Referral Shares</h2>

    @if($shares->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Campaign</th>
                    <th>Receiver</th>
                    <th>Date Shared</th>
                </tr>
            </thead>
            <tbody>
                @foreach($shares as $share)
                    <tr>
                        <td>{{ $share->campaign->title ?? 'N/A' }}</td>
                        <td>{{ $share->receiver->name ?? 'N/A' }} ({{ $share->receiver->email ?? 'N/A' }})</td>
                        <td>{{ $share->created_at->format('d M Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>You haven’t shared any campaigns yet.</p>
    @endif
</div>
@endsection
