<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'doctor_id',
        'patient_id',
        'rating',
        'comment',
    ];

    //
}
