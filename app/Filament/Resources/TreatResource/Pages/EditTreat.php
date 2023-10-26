<?php

namespace App\Filament\Resources\TreatResource\Pages;

use App\Filament\Resources\TreatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTreat extends EditRecord
{
    protected static string $resource = TreatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
