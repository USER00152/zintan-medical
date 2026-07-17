<?php

namespace App\Filament\Resources\DoctorProfiles\Schemas;

use App\Models\Clinic;
use App\Models\Specialty;
use App\Models\User;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class DoctorProfileForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label('الطبيب')
                    ->options(User::where('role', 'doctor')->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                Select::make('specialty_id')
                    ->label('التخصص')
                    ->options(Specialty::pluck('name_ar', 'id'))
                    ->searchable()
                    ->required(),
                CheckboxList::make('clinics')
                    ->label('العيادات اللي يشتغل فيها')
                    ->relationship('clinics', 'name')
                    ->columns(2),
                Textarea::make('bio')
                    ->label('نبذة عن الطبيب')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('photo')
                    ->label('رابط الصورة')
                    ->default(null),
                TextInput::make('years_experience')
                    ->label('سنين الخبرة')
                    ->numeric()
                    ->default(null),
            ]);
    }
}