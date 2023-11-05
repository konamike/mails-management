<?php

namespace App\Filament\Resources\LetterResource\Pages;

use App\Filament\Resources\LetterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLetter extends EditRecord
{
    protected static string $resource = LetterResource::class;

    protected static ?string $title = 'Edit File';

    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}


    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
