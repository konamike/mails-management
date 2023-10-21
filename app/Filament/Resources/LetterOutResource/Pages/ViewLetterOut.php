<?php

namespace App\Filament\Resources\LetterOutResource\Pages;

use App\Filament\Resources\LetterOutResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewLetterOut extends ViewRecord
{
    protected static string $resource = LetterOutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
