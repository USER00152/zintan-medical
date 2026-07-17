<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorProfile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'specialty_id', 'bio', 'photo', 'years_experience'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }

    public function clinics()
    {
        return $this->belongsToMany(Clinic::class, 'doctor_clinic');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function appointments()
    {
        return $this->hasMany(AppointmentModel::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
