<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $fillable = [
        // other fields you might have
        'referrer_id',
        'referee_id',
        'status',
        'reward_status',// Add this line to allow mass assignment
    ];
    public function referrer()
{
    return $this->belongsTo(User::class, 'referrer_id');
}

public function referee()
{
    return $this->belongsTo(User::class, 'referee_id');
}
}
