<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctorprofile extends Model
{
    protected $fillable = [
        'user_id',
        'bio',
        'specialty_id',
        'experience',
        'qualification',
    ];

    //
}
