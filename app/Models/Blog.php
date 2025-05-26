<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable=[
        'title',
        'content',
        'image',
        'speciality',
        'name',
        'profile_picture'
    ];
}
