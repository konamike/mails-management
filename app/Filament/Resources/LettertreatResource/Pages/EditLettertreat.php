<?php

namespace App\Filament\Resources\LettertreatResource\Pages;

use App\Filament\Resources\LettertreatResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLettertreat extends EditRecord
{
    protected static string $resource = LettertreatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    
    protected function mutateFormDataBeforeSave($data): array
    {
        $data['treated_by'] = auth()->id();
    
        return $data;
    }

    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
