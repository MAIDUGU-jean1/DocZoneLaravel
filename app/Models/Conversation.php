<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
       protected $fillable = [
        'sender_id',
        'receiver_id',
        'last_time_message',
    ];

     public function message()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

        public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

}
