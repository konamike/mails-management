<?php

namespace App\Filament\Resources\FiletreatmentResource\Pages;

use App\Filament\Resources\FiletreatmentResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFiletreatment extends EditRecord
{
    protected static string $resource = FiletreatmentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
