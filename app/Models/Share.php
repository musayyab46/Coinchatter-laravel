protected $fillable = ['campaign_id', 'sender_id', 'receiver_id', 'channel'];
public function sender()
{
    return $this->belongsTo(\App\Models\User::class, 'sender_id');
}

public function receiver()
{
    return $this->belongsTo(\App\Models\User::class, 'receiver_id');
}

public function campaign()
{
    return $this->belongsTo(\App\Models\Campaign::class);
}
