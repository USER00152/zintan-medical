<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model
{
    protected $fillable = ['name', 'name_ar'];

    public function doctorProfiles()
    {
        return $this->hasMany(DoctorProfile::class);
    }
}
