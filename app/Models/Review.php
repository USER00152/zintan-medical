<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id', 'user_id', 'doctor_profile_id', 'rating', 'comment',
    ];

    public function appointment()
    {
        return $this->belongsTo(AppointmentModel::class, 'appointment_id');
    }

    public function patient()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function doctorProfile()
    {
        return $this->belongsTo(DoctorProfile::class);
    }
}