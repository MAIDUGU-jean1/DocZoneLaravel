<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
      protected $fillable = [
        'doctor_id',
        'patient_name',
        'appointment_date',
        'appointment_time',
        'status',
        'profile_picture',
        'type'
    ];
}
