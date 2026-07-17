<?php

namespace App\Filament\Resources\AppointmentModels\Pages;

use App\Filament\Resources\AppointmentModels\AppointmentModelResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAppointmentModel extends EditRecord
{
    protected static string $resource = AppointmentModelResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
