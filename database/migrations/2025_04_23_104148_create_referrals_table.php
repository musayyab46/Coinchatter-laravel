<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('referrals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('referrer_id')->constrained('users'); // Who shared the link
            $table->foreignId('referee_id')->constrained('users');  // Who used the link
            $table->string('status')->default('pending'); // pending/completed
            $table->string('reward_status')->default('unpaid'); // unpaid/paid
            $table->timestamps();
            
            // Optional: Indexes for better performance
            $table->index('referrer_id');
            $table->index('referee_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referrals');
    }
};
