<?php

namespace Database\Seeders;

use App\Models\Clinic;
use App\Models\DoctorProfile;
use App\Models\Specialty;
use App\Models\User;
use Illuminate\Database\Seeder;

class DoctorProfileSeeder extends Seeder
{
    public function run(): void
    {
        $doctorUsers = User::where('role', 'doctor')->get();
        $specialties = Specialty::all();
        $clinics = Clinic::all();

        $bios = [
            'استشاري بخبرة أكثر من 10 سنوات في المجال.',
            'طبيب متخصص، حاصل على شهادات معتمدة دولياً.',
            'يهتم بمتابعة الحالات المزمنة والوقاية.',
            'خبرة واسعة في التعامل مع الحالات الحرجة.',
        ];

        foreach ($doctorUsers as $index => $doctorUser) {
            $profile = DoctorProfile::create([
                'user_id' => $doctorUser->id,
                'specialty_id' => $specialties[$index % $specialties->count()]->id,
                'bio' => $bios[$index % count($bios)],
                'years_experience' => rand(3, 20),
            ]);

            $profile->clinics()->attach(
                $clinics->random(rand(1, 2))->pluck('id')->toArray()
            );
        }
    }
}