<?php

namespace App\Filament\Resources\AppointmentModels\Pages;

use App\Filament\Resources\AppointmentModels\AppointmentModelResource;
use Filament\Resources\Pages\CreateRecord;

class CreateAppointmentModel extends CreateRecord
{
    protected static string $resource = AppointmentModelResource::class;
}
