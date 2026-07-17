<?php

namespace App\Filament\Resources\AppointmentModels\Pages;

use App\Filament\Resources\AppointmentModels\AppointmentModelResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAppointmentModels extends ListRecords
{
    protected static string $resource = AppointmentModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
