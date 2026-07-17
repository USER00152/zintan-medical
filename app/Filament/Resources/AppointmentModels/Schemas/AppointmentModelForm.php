<?php

namespace App\Filament\Resources\AppointmentModels\Schemas;

use App\Models\Clinic;
use App\Models\DoctorProfile;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TimePicker;
use Filament\Schemas\Schema;

class AppointmentModelForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label('المريض')
                    ->options(User::where('role', 'patient')->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                Select::make('doctor_profile_id')
                    ->label('الطبيب')
                    ->options(
                        DoctorProfile::with('user')
                            ->get()
                            ->pluck('user.name', 'id')
                    )
                    ->searchable()
                    ->required(),
                Select::make('clinic_id')
                    ->label('العيادة')
                    ->options(Clinic::pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                DatePicker::make('appointment_date')
                    ->label('تاريخ الموعد')
                    ->required(),
                TimePicker::make('appointment_time')
                    ->label('وقت الموعد')
                    ->required(),
                Select::make('status')
                    ->label('حالة الموعد')
                    ->options([
                        'pending'   => 'قيد الانتظار',
                        'confirmed' => 'مؤكد',
                        'cancelled' => 'ملغي',
                        'completed' => 'مكتمل',
                    ])
                    ->default('pending')
                    ->required(),
                Textarea::make('notes')
                    ->label('ملاحظات')
                    ->default(null)
                    ->columnSpanFull(),
            ]);
    }
}
