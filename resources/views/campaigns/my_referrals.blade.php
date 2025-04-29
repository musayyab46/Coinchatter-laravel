@extends('layouts.app')

@section('content')
<div class="container">
    <h2>My Referrals</h2>

    @if($shares->count())
        <table class="table">
            <thead>
                <tr>
                    <th>Campaign</th>
                    <th>Referred User</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($shares as $share)
                <tr>
                    <td>{{ $share->campaign->title }}</td>
                    <td>{{ $share->receiver->name ?? 'Unknown' }}</td>
                    <td>{{ $share->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>You haven't referred anyone yet.</p>
    @endif
</div>
@endsection
