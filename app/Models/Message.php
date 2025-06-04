<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
       protected $fillable = [
        'conversation_id',
        'sender_id',
        'receiver_id',
        'read_at',
        'body',
        'sender_deleted_at',
        'receiver_deleted_at',
    ];

    protected $dates=['read_at','sender_deleted_at','sender_deleted_at'];
  public function conversation(): BelongsTo
    {
        return $this->belongsTo(Conversation::class);
    }


      public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function isRead():bool{
      return $this->read_at!=null;
    }

}
