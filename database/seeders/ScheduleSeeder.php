<?php

namespace Database\Seeders;

use App\Models\DoctorProfile;
use App\Models\Schedule;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    public function run(): void
    {
        $doctorProfiles = DoctorProfile::with('clinics')->get();

        foreach ($doctorProfiles as $profile) {
            foreach ($profile->clinics as $clinic) {
                foreach ([0, 1, 2, 3, 6] as $day) {
                    Schedule::create([
                        'doctor_profile_id' => $profile->id,
                        'clinic_id' => $clinic->id,
                        'day_of_week' => $day,
                        'start_time' => '09:00:00',
                        'end_time' => '14:00:00',
                    ]);
                }
            }
        }
    }
}
