@extends('layouts.app') <!-- Assuming you use Laravel Breeze -->
@section('content')
    <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-xl font-bold mb-4">Your Referral Dashboard</h2>
        
        <!-- Referral Link -->
        <div class="mb-6">
            <label class="block text-sm font-medium mb-2">Your Referral Link</label>
            <div class="flex">
                <input 
                    type="text" 
                    id="referralLink"
                    value="{{ url('/register?ref=' . auth()->user()->referral_code) }}" 
                    class="border p-2 rounded-l w-full"
                    readonly
                >
                <button 
                    onclick="copyToClipboard()"
                    class="bg-blue-500 text-white px-4 rounded-r hover:bg-blue-600"
                >
                    Copy
                </button>
            </div>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-3 gap-4">
            <div class="bg-gray-100 p-4 rounded">
                <p class="text-sm text-gray-600">Total Referrals</p>
                <p class="text-2xl font-bold">{{ auth()->user()->referral_count }}</p>
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard() {
            const link = document.getElementById('referralLink');
            link.select();
            document.execCommand('copy');
            alert('Copied to clipboard!');
        }
    </script>
@endsection