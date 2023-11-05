<?php

namespace App\Filament\Resources\LetteroutResource\Pages;

use App\Filament\Resources\LetteroutResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLetterout extends EditRecord
{
    protected static string $resource = LetteroutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
