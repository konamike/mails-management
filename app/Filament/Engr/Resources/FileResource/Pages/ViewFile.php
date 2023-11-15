<?php

namespace App\Filament\Engr\Resources\FileResource\Pages;

use App\Filament\Engr\Resources\FileResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewFile extends ViewRecord
{
    protected static string $resource = FileResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\EditAction::make(),
        ];
    }
}
