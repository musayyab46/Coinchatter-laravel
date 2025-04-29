@extends('layouts.app')

@section('content')
              <!-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div><div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
            <h1>Welcome to Your Home Page!</h1> -->
            <!-- Feature Cards Section -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <style>
    .card {
        height: 300px; /* fixed height */
        border: 2px solid #4A90E2;
        border-radius: 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background: linear-gradient(145deg, #ffffff, #f0f0f0);
        display: flex;
        flex-direction: column;
        justify-content: center; /* center content vertically */
        align-items: center; /* center content horizontally */
        padding: 20px;
    }

    .card:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        border-color: #007bff;
    }

    .card-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: #007bff;
        margin-bottom: 15px;
    }

    .card-text {
        font-size: 1rem;
        color: #555;
    }

    .row.g-4 {
        justify-content: center;
    }
    .card-img-top {
        height: 100px;
        object-fit: cover;
        border-radius: 100%;
    }
    .about-section {
        background: linear-gradient(to right, #f0f2f5, #e0e7ff);
        padding: 60px 20px;
    }

    .about-heading {
        text-align: center;
        font-weight: bold;
        font-size: 2.5rem;
        color: #333;
        margin-bottom: 20px;
    }
    .about-paragraph {
        max-width: 800px;
        margin: 0 auto;
        font-size: 1.2rem;
        color: #555;
        text-align: center;
        line-height: 1.8;
    }
    
</style>
<div class="text-center my-5">
    <h1 class="fw-bold" style="font-size: 2.5rem;">Do You Want To...?</h1>
</div>


<div class="container my-5">
  <div class="row g-4">
    <div class="col-md-3">
      <div class="card text-center shadow-sm">
        <img src="{{ asset('images/connect with peers (2).jpg') }}" class="card-img-top" alt="Connect with Peers">
        <div class="card-body">
          <h5 class="card-title">Connect with Peers</h5>
          <p class="card-text">Find like-minded people and build your own communication network.</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-center shadow-sm">
      <img src="{{ asset('images/engage in conversation.jpg') }}" class="card-img-top" alt="Connect with Peers">
        <div class="card-body">
          <h5 class="card-title">Engage in Conversations</h5>
          <p class="card-text">Join meaningful discussions and exchange ideas in real-time.</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-center shadow-sm">
      <img src="{{ asset('images/earn rewards.jpg') }}" class="card-img-top" alt="Connect with Peers">
        <div class="card-body">
          <h5 class="card-title">Earn Points</h5>
          <p class="card-text">Get rewarded for being active and helpful in the community.</p>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card text-center shadow-sm">
      <img src="{{ asset('images/Redeem rewards.jpg') }}" class="card-img-top" alt="Connect with Peers">
        <div class="card-body">
          <h5 class="card-title">Redeem Rewards</h5>
          <p class="card-text">Use your points to unlock exclusive perks and real-world benefits.</p>
        </div>
      </div>
    </div>
  </div>
</div>

</style>
<div class="text-center my-5">
    <h1 class="fw-bold" style="font-size: 2.5rem;">Then You are at Right Place..</h1>
</div>
<section class="py-5" style="background-color: #f8f9fa;">
    <div class="about-section">
        <h2 class="about-heading">About CoinChatter</h2>
        <p class="about-paragraph">
            CoinChatter is a vibrant community platform where offer seekers connect, share ideas, 
            and grow together. Whether you're a beginner or an expert, you can engage in real-time conversations, 
            earn rewards through participation, and discover exciting new projects. 
            Our mission is to empower individuals by providing a space for collaboration, learning, and innovation 
            in the world of Referrals.
        </p>
    </div>
</section>


      
@endsection
