<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'phone', 'latitude', 'longitude'];

    public function doctorProfiles()
    {
        return $this->belongsToMany(DoctorProfile::class, 'doctor_clinic');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function appointments()
    {
        return $this->hasMany(AppointmentModel::class);
    }
}
