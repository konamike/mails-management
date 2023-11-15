<?php

namespace App\Filament\Engr\Resources\LetterResource\Pages;

use App\Filament\Engr\Resources\LetterResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewLetter extends ViewRecord
{
    protected static string $resource = LetterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
