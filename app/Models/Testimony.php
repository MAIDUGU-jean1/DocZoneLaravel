<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    protected $fillable=[
        'name',
        'testimony',
        'profile_picture',
        'date',
        'rating'
    ];
}
