<?php

namespace App\Filament\Resources\AppointmentModels;

use App\Filament\Resources\AppointmentModels\Pages\CreateAppointmentModel;
use App\Filament\Resources\AppointmentModels\Pages\EditAppointmentModel;
use App\Filament\Resources\AppointmentModels\Pages\ListAppointmentModels;
use App\Filament\Resources\AppointmentModels\Schemas\AppointmentModelForm;
use App\Filament\Resources\AppointmentModels\Tables\AppointmentModelsTable;
use App\Models\AppointmentModel;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AppointmentModelResource extends Resource
{
    protected static ?string $model = AppointmentModel::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCalendarDays;

    protected static ?string $navigationLabel = 'المواعيد';

    protected static ?string $modelLabel = 'موعد';

    protected static ?string $pluralModelLabel = 'المواعيد';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return AppointmentModelForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AppointmentModelsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListAppointmentModels::route('/'),
            'create' => CreateAppointmentModel::route('/create'),
            'edit'   => EditAppointmentModel::route('/{record}/edit'),
        ];
    }
}