<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
       protected $fillable = [
        'conversation_id',
        'sender_id',
        'receiver_id',
        'read',
        'type',
    ];
  public function conversation(): BelongsTo
    {
        return $this->belongsTo(Conversation::class);
    }


      public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
