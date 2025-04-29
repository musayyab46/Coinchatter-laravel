<?php

 use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CampaignController;
 use App\Http\Controllers\ShareController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReferralController;
use App\Models\Campaign;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\ProfileController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication Routes
Auth::routes();

// Authenticated User Routes

Route::middleware(['auth'])->group(function () {
    // Campaign Routes
    Route::resource('campaigns', CampaignController::class);
    
    // Referral Routes
    Route::get('/my-referrals', [RedirectController::class, 'redirectToReferrals'])->name('referrals');
    //Route::get('/my-referrals', [RedirectController::class, 'redirectToReferrals']);
    
    // Consolidated Referral Routes (using ReferralController)
    Route::prefix('referrals')->group(function () {
        Route::get('/', [ReferralController::class, 'index'])->name('referrals.index');
        Route::post('/process', [ReferralController::class, 'process'])->name('referrals.process');
    });
    
    // User Profile Route
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    
    // Dashboard Route
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    // Profile Route
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
});


