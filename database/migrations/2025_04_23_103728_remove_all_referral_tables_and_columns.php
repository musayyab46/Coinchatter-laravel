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
        //
        Schema::dropIfExists('referrals');
        
        // Remove referral columns from users table
        Schema::table('users', function (Blueprint $table) {
            // Check if columns exist before trying to drop them
            if (Schema::hasColumn('users', 'referral_code')) {
                $table->dropColumn('referral_code');
            }
            if (Schema::hasColumn('users', 'referred_by')) {
                $table->dropForeign(['referred_by']); // Remove foreign key first
                $table->dropColumn('referred_by');
            }
            if (Schema::hasColumn('users', 'referral_count')) {
                $table->dropColumn('referral_count');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('referrals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('referrer_id')->constrained('users');
            $table->foreignId('referee_id')->constrained('users');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->string('referral_code')->unique()->nullable();
            $table->foreignId('referred_by')->nullable()->constrained('users');
            $table->unsignedInteger('referral_count')->default(0);
        });
    }
};
