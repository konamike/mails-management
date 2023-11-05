<?php

namespace App\Filament\Resources\LetteroutResource\Pages;

use App\Filament\Resources\LetteroutResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewLetterout extends ViewRecord
{
    protected static string $resource = LetteroutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
