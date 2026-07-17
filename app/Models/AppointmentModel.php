<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentModel extends Model
{
    use HasFactory;

    protected $table = 'appointment_models';

    protected $fillable = [
        'user_id', 'doctor_profile_id', 'clinic_id',
        'appointment_date', 'appointment_time', 'status', 'notes',
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function doctorProfile()
    {
        return $this->belongsTo(DoctorProfile::class);
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class, 'appointment_id');
    }

    public function review()
    {
        return $this->hasOne(Review::class, 'appointment_id');
    }
}
