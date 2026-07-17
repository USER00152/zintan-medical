<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'مدير المنصة',
            'email' => 'admin@zintanmed.ly',
            'phone' => '0910000001',
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);

        $doctors = [
            ['name' => 'د. أحمد الزنتاني', 'email' => 'doctor1@zintanmed.ly', 'phone' => '0920000001'],
            ['name' => 'د. فاطمة المبروك', 'email' => 'doctor2@zintanmed.ly', 'phone' => '0920000002'],
            ['name' => 'د. خالد الورفلي', 'email' => 'doctor3@zintanmed.ly', 'phone' => '0920000003'],
            ['name' => 'د. مريم السنوسي', 'email' => 'doctor4@zintanmed.ly', 'phone' => '0920000004'],
        ];

        foreach ($doctors as $doctor) {
            User::create([
                'name' => $doctor['name'],
                'email' => $doctor['email'],
                'phone' => $doctor['phone'],
                'role' => 'doctor',
                'password' => Hash::make('password'),
            ]);
        }

        $patients = [
            ['name' => 'محمد علي', 'email' => 'patient1@zintanmed.ly', 'phone' => '0940000001'],
            ['name' => 'سارة إبراهيم', 'email' => 'patient2@zintanmed.ly', 'phone' => '0940000002'],
            ['name' => 'يوسف عبدالله', 'email' => 'patient3@zintanmed.ly', 'phone' => '0940000003'],
        ];

        foreach ($patients as $patient) {
            User::create([
                'name' => $patient['name'],
                'email' => $patient['email'],
                'phone' => $patient['phone'],
                'role' => 'patient',
                'password' => Hash::make('password'),
            ]);
        }
    }
}
