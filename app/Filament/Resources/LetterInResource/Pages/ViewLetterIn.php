<?php

namespace App\Filament\Resources\LetterInResource\Pages;

use App\Filament\Resources\LetterInResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewLetterIn extends ViewRecord
{
    protected static string $resource = LetterInResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
