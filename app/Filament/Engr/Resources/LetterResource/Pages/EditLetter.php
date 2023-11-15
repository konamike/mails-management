<?php

namespace App\Filament\Engr\Resources\LetterResource\Pages;

use App\Filament\Engr\Resources\LetterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLetter extends EditRecord
{
    protected static string $resource = LetterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
