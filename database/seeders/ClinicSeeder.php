<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClinicSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('clinics')->insert([
            [
                'name' => 'عيادة الزنتان المركزية',
                'address' => 'شارع الجمهورية، الزنتان',
                'phone' => '091-111-2222',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'عيادة النور التخصصية',
                'address' => 'حي المطار، الزنتان',
                'phone' => '091-333-4444',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'عيادة الشفاء',
                'address' => 'وسط المدينة، الزنتان',
                'phone' => '091-555-6666',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}