<?php

namespace App\Filament\Resources\FileoutResource\Pages;

use App\Filament\Resources\FileoutResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFileout extends ViewRecord
{
    protected static string $resource = FileoutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
