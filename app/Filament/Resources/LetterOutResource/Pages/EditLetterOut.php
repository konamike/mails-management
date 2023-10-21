<?php

namespace App\Filament\Resources\LetterOutResource\Pages;

use App\Filament\Resources\LetterOutResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLetterOut extends EditRecord
{
    protected static string $resource = LetterOutResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
