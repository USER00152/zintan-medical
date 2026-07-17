<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['doctor_profile_id', 'clinic_id', 'day_of_week', 'start_time', 'end_time'];

    public function doctorProfile()
    {
        return $this->belongsTo(DoctorProfile::class);
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}
