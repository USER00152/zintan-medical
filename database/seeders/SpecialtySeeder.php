<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Seeder;

class SpecialtySeeder extends Seeder
{
    public function run(): void
    {
        $specialties = [
            ['name' => 'Internal Medicine', 'name_ar' => 'باطنة'],
            ['name' => 'Dentistry', 'name_ar' => 'أسنان'],
            ['name' => 'Pediatrics', 'name_ar' => 'أطفال'],
            ['name' => 'Dermatology', 'name_ar' => 'جلدية'],
            ['name' => 'Ophthalmology', 'name_ar' => 'عيون'],
            ['name' => 'Orthopedics', 'name_ar' => 'عظام'],
            ['name' => 'Gynecology', 'name_ar' => 'نساء وتوليد'],
            ['name' => 'ENT', 'name_ar' => 'أنف وأذن وحنجرة'],
        ];

        foreach ($specialties as $specialty) {
            Specialty::create($specialty);
        }
    }
}
