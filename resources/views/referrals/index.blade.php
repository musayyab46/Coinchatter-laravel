@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Your Referral Program</h2>
    
    <div class="card mb-4">
        <div class="card-body">
            <h5>Your Referral Link</h5>
            <div class="input-group">
                <input type="text" class="form-control" id="referralLink" 
                       value="{{ $referralLink}}" readonly>
                <button class="btn btn-primary" onclick="copyLink()">Copy</button>
            </div>
        </div>
    </div>

    <div class="card">
    <div class="referral-points">
    <h2>Total Referral Points: {{ $totalPoints }}</h2>
</div>

        <div class="card-header">Your Referrals ({{ $referrals->count() }})</div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Signup Date</th>
                    <th>Status</th>
                </tr>
                @foreach($referrals as $referral)
                <tr>
                    <td>{{ $referral->referee->name }}</td>
                    <td>{{ $referral->created_at->format('M d, Y') }}</td>
                    <td>
                        @if($referral->is_completed)
                            <span class="badge bg-success">Completed</span>
                        @else
                            <span class="badge bg-success">Success</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

<script>
function copyLink() {
    const link = document.getElementById('referralLink');
    link.select();
    document.execCommand('copy');
    alert('Link copied!');
}
</script>
@endsection