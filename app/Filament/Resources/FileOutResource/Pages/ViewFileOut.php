<?php

namespace App\Filament\Resources\FileOutResource\Pages;

use App\Filament\Resources\FileOutResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFileOut extends ViewRecord
{
    protected static string $resource = FileOutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
